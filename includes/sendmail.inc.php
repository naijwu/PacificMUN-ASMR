<?php


    if (isset($_POST['send-mail-test'])) {

        sendMail('Test Wu', 'confirm');
        header("Location: ../dacpanel.php?mailSentSuccessfully"); // TODO: Change this to the user
    }

    function sendMail($del, $type) {
        include_once 'dbh.inc.php';

        $sql = "SELECT email, confirmedcomm, confirmedcountry FROM DelReg WHERE fullname='" . trim($del) . "'";
        $result = mysqli_query($conn, $sql);
        $row = $result-> fetch_assoc();

        if ($type == 'confirm') {
            $to = $row['email'];
            $subject = "PacificMUN 2020 Delegate Assignment";
            $message = '
            <html> 
            <head> 
                <title>PacificMUN 2020 Delegate Assignment</title>
            </head> 
            <body> 
                <div class="letter-container">
                    Dear ' . $del . ',
                    <br><br>
                    Thank you for registering for PacificMUN 2020.
                    <br><br>
                    We appreciate your patience in waiting for your country and committee assignment.
                    <br><br>
                    I am pleased to inform you that you will be representing <strong>' . $row['confirmedcountry'] . '</strong> in <strong>' . $row['confirmedcomm'] . '</strong>.
                    <br><br>
                    Please note that along with preferences and conference availability, delegate experience is also taken into account when registrants are being assigned to a country and committee. Unfortunately, due to the high volume of delegates, assignment changes may not always be possible.
                    <br><br>
                    If you have any questions or concerns, please do not hesitate to contact me. 
                    <br><br>
                    We look forward to welcoming you this coming January!
                    <br><br>
                    Andrew Wang<br>
                    USG of Delegate Affairs<br>
                    Pacific Model United Nations 2020<br>
                    delegateaffairs@pacificmun.org<br>
                    www.pacificmun.org
                </div>
            </body> 
            </html>
            ';

            $headers = 'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'From: Delegate Affairs <it@pacificmun.org>' . "\r\n" .
            'Reply-To: it@pacificmun.org' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            $checkmail = mail($to, $subject, $message, $headers);
            if (!$checkmail) {
                $errorMessage = error_get_last()['message'];
            }

            return;
        } else if ($type == 'newbiedel') {
            $to = 'jaewuchun@gmail.com';
            $subject = "Newbie (Unreserved) Delegate: " . $del;
            $message = '
            <html> 
            <head> 
                <title>PacificMUN 2020 Newbie Delegate Detected</title>
            </head> 
            <body> 
                <div class="letter-container">
                    Delegate ' . $del . ' is unreserved. Please confirm him a country.
                </div>
            </body> 
            </html>
            ';

            $headers = 'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'From: IT <it@pacificmun.org>' . "\r\n" .
            'Reply-To: it@pacificmun.org' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            $checkmail = mail($to, $subject, $message, $headers);
            if (!$checkmail) {
                $errorMessage = error_get_last()['message'];
            }

            return;

        } else if ($type == 'regconfirm') {
            $to = $row['email'];
            $subject = "Confirmation of Delegate Registration: " . $del;
            $message = '
            <html> 
            <head> 
                <title>PacificMUN 2020 Delegate Registration Confirmation</title>
            </head> 
            <body> 
                <div class="letter-container">
                    Dear Delegate,
                    <br><br>
                    Thank you for registering for PacificMUN 2020.
                    <br><br>
                    Please note that if you have chosen to pay by cheque, your spot will not be secured until we have received your payment. However, if you have paid through Paypal, please expect your country assignment within the next 72 hours. 
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
            </html>
            ';

            $headers = 'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'From: Delegate Affairs <it@pacificmun.org>' . "\r\n" .
            'Reply-To: it@pacificmun.org' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            $checkmail = mail($to, $subject, $message, $headers);
            if (!$checkmail) {
                $errorMessage = error_get_last()['message'];
            }

            return;
        }
        return;
    }