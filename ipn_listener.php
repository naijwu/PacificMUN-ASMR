<?php
    // STEP 1: read POST data
    // Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
    // Instead, read raw POST data from the input stream.
    $raw_post_data = file_get_contents('php://input');
    $raw_post_array = explode('&', $raw_post_data);
    $myPost = array();

    foreach ($raw_post_array as $keyval) {
    $keyval = explode ('=', $keyval);
    if (count($keyval) == 2)
        $myPost[$keyval[0]] = urldecode($keyval[1]);
    }
    
    // read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
    $req = 'cmd=_notify-validate';
    if (function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
    }

    foreach ($myPost as $key => $value) {
        if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
            $value = urlencode(stripslashes($value));
        } else {
            $value = urlencode($value);
        }
        $req .= "&$key=$value";
    }
    // Step 2: POST IPN data back to PayPal to validate
    $ch = curl_init('https://ipnpb.paypal.com/cgi-bin/webscr');
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    // In wamp-like environments that do not come bundled with root authority certificates,
    // please download 'cacert.pem' from "https://curl.haxx.se/docs/caextract.html" and set
    // the directory path of the certificate as shown below:
    // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
    if ( !($res = curl_exec($ch)) ) {
        // error_log("Got " . curl_error($ch) . " when processing IPN data");
        curl_close($ch);
        exit;
    }
    curl_close($ch);
    // inspect IPN validation result and act accordingly
    if (strcmp ($res, "VERIFIED") == 0) {
    
        // The IPN is verified, process it:
        // check whether the payment_status is Completed
        // check that txn_id has not been previously processed
        // check that receiver_email is your Primary PayPal email
        // check that payment_amount/payment_currency are correct
        // process the notification
        // assign posted variables to local variables
        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $payment_status = $_POST['payment_status'];
        $payment_amount = $_POST['mc_gross'];
        $payment_currency = $_POST['mc_currency'];
        $txn_id = $_POST['txn_id'];
        $receiver_email = $_POST['receiver_email'];
        $payer_email = $_POST['payer_email'];
        $userID = $_POST['custom'];
        // IPN message values depend upon the type of notification sent.
        
        $host_name = "localhost";
        $user_name = "sickomode";
        $password = "islu32pqdblt";
        $asmrdb = "ASMR";

        $conn = mysqli_connect($host_name, $user_name, $password, $asmrdb);

        if (!$conn) {
            die("Connection to PacificMUN ASMR Database failed with error message: " . mysqli_connect_error());
        }

        $sqlreserve = "UPDATE DelReg SET ispaid=1 WHERE id='" . $userID . "';";

        if (mysqli_query($conn, $sqlreserve)) {
            $sql = "SELECT fullname, email FROM DelReg WHERE id='" . $userID . "';";
            $result = mysqli_query($conn, $sql);
            $row = $result-> fetch_assoc();

            $email = $row['email'];
            $name = $row['fullname'];

            $to = $email;
            $subject = "Confirmation of Delegate Registration: " . $name;
            $message = '<html> 
            <head> 
                <title>PacificMUN 2020 Delegate Registration Confirmation</title>
            </head> 
            <body> 
                <div class="letter-container">
                    Dear Delegate,
                    <br><br>
                    Thank you for registering for PacificMUN 2020.
                    <br><br>
                    Please expect your country assignment within the next 72 hours. 
                    <br><br>
                    If you require any additional assistance or accommodation, please do not hesitate to contact us.
                    <br><br>
                    We look forward to welcoming you this January!
                    <br><br>
                    Andrew Wang<br>
                    USG of Delegate Affairs<br>
                    Pacific Model United Nations 2020<br>
                    delegateaffairs@pacificmun.org<br>
                    www.pacificmun.org
                </div> 
            </body> 
            </html>';

            $headers = 'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'From: PacificMUN 2020 Delegate Affairs <delegateaffairs@pacificmun.org>' . "\r\n" .
            'Reply-To: delegateaffairs@pacificmun.org' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
                
            $checkmail = mail($to, $subject, $message, $headers);
            if (!$checkmail) { 
                $errorMessage = error_get_last()['message'];
            } else {
                exit();
            }
        } else {
            header("Location: index.php?status=dberror");
            exit();
        }
        
    }
?>