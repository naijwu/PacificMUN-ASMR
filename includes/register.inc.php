<?php

    if (isset($_POST['register-submit'])) {

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
        require_once 'sendmail.inc.php';

        date_default_timezone_set('America/Vancouver');

        // form variables:
        $name = $_POST['name']; // registrant's name
        $name = mysqli_real_escape_string($conn, $name);

        $email = $_POST['email']; // registrant's email
        $email = mysqli_real_escape_string($conn, $email);
        
        $school = $_POST['school']; // registrant's school
        $school = mysqli_real_escape_string($conn, $school);
        
        $grade = $_POST['grade']; // registrant's grade
        $grade = mysqli_real_escape_string($conn, $grade);
        

        $dob = $_POST['dob']; // date of birth
        $dob = mysqli_real_escape_string($conn, $dob);
        
        $sex = $_POST['sex']; // gender
        $sex = mysqli_real_escape_string($conn, $sex);
        
        $address = $_POST['address'] . " " . $_POST['city'] . " " . $_POST['state']; // address
        $address = mysqli_real_escape_string($conn, $address);
        
        $cell = $_POST['cell']; // registrant's cellphone number
        $cell = mysqli_real_escape_string($conn, $cell);
        
        $home = $_POST['home']; // registrant's homephone number (op.)
        $home = mysqli_real_escape_string($conn, $home);
        
        $ec = $_POST['emergency']; // registrant's emergency contact name
        $ec = mysqli_real_escape_string($conn, $ec);
        
        $ecrelationship = $_POST['emergencyrelationship']; // registrant's emergency contact's relationship to delegate
        $ecrelationship = mysqli_real_escape_string($conn, $ecrelationship);
        
        $ecphone = $_POST['emergencyphone']; // registrant's emergency contact's cell
        $ecphone = mysqli_real_escape_string($conn, $ecphone);
        

        $pastexp = $_POST['pastexp']; // registrant's past delegating experience
        

        $skillcap = 0.0;
        if(strlen($pastexp) > 6) {
            $text = trim($pastexp);
            $textAr = explode("\n", $text);
            $textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind

            // if has attended at least one conference
            if (count($textAr) == 1) {
                $skillcap = 0.5;
            } else {
                foreach ($textAr as $line) {
                    $lineAr = explode(",", $line);
                    $skillcap = $skillcap + 0.5;

                    if(count($lineAr) == 2) {
                        // if has been secretariat, each time
                        if( (stripos(strtoupper($lineAr[1]), "USG") == true) || (strtoupper(trim($lineAr[1])) === "DELEGATE AFFAIRS") || (strtoupper(trim($lineAr[1])) === "DA") || (strtoupper(trim($lineAr[1])) === "DIRECTOR GENERAL") || (strtoupper(trim($lineAr[1])) === "DIRECTOR-GENERAL") || (strtoupper(trim($lineAr[1])) === "DG") || (strtoupper(trim($lineAr[1])) === "SECRETARY-GENERAL") || (strtoupper(trim($lineAr[1])) === "SG") || (strtoupper(trim($lineAr[1])) === "SECRETARY GENERAL") ) {
                            $skillcap = $skillcap + 2;
                        }
                    }
                    
                    if(count($lineAr) == 3) {
                        // if has been staff
                        if ( (strtoupper(trim($lineAr[2])) === "CHAIR") || (strtoupper(trim($lineAr[2])) === "AD") || (strtoupper(trim($lineAr[2])) === "ASSISTANT DIRECTOR") || (strtoupper(trim($lineAr[2])) === "DIRECTOR") ) {
                            $skillcap = $skillcap + 1;
                        }
                    }

                    if(count($lineAr) == 4 ) {

                        // if user has been best del
                        if ( (strtoupper(trim($lineAr[3])) === "BEST DELEGATE") || (strtoupper(trim($lineAr[3])) === "BEST DEL") ) {
                            $skillcap = $skillcap + 1.5;
                        }

                        // if user has gotten any award
                        if ( (strtoupper(trim($lineAr[3])) === "HONOURABLE MENTION") || (strtoupper(trim($lineAr[3])) === "HONORABLE MENTION") || (strtoupper(trim($lineAr[3])) === "BEST POSITION PAPER") || (strtoupper(trim($lineAr[3])) === "BEST RESEARCHED") || (strtoupper(trim($lineAr[3])) === "OUTSTANDING") || (strtoupper(trim($lineAr[3])) === "HONORABLE") || (strtoupper(trim($lineAr[3])) === "OUTSTANDING DELEGATE") || (strtoupper(trim($lineAr[3])) === "OUTSTANDING DEL") || (strtoupper(trim($lineAr[3])) ==="HONOURABLE") ) {
                            $skillcap = $skillcap + 1;
                        }
                    }
                } 
            }
        } else {
            $skillcap = 0;
        }

        $delskillcap = (int)$skillcap;
        $pastexp = mysqli_real_escape_string($conn, $pastexp);

        $comm1 = $_POST['committee1']; // registrant's first committee preference
        $comm1 = mysqli_real_escape_string($conn, $comm1);
        
        $country1 = $_POST['country1']; // registrant's first country preference
        $country1 = mysqli_real_escape_string($conn, $country1);
        
        $comm2 = $_POST['committee2']; // registrant's second committee preference
        $comm2 = mysqli_real_escape_string($conn, $comm2);
        
        $country2 = $_POST['country2']; // registrant's second country preference
        $country2 = mysqli_real_escape_string($conn, $country2);
        
        $comm3 = $_POST['committee3']; // registrant's third committee preference
        $comm3 = mysqli_real_escape_string($conn, $comm3);
        
        $country3 = $_POST['country3']; // registrant's third country preference
        $country3 = mysqli_real_escape_string($conn, $country3);
        
    
        $deltype = $_POST['deltype']; // day or hotel delegate
        $isDayDel = 0;

        if ($deltype === "day") {
            $isDayDel = 1;
        } else {
            $isDayDel = 0;
        }

        $haspaid = 0;
        $isassigned = 0;
        $ispaybycheque = $_POST['cheque'];

        $assignedcountry = "";
        $assignedcommittee = "";

        $timestamp = date("Y-m-d h:i:s A");

        $referredby = $_POST['referredby'];
        $referredby = mysqli_real_escape_string($conn, $referredby);



        if (empty($name) || empty($email) || empty($school) || empty($grade) || empty($dob) || empty($sex) || empty($address) || empty($cell) || empty($ec) || empty($ecrelationship) || empty($ecphone) || empty($comm1) || empty($country1) || empty($comm2) || empty($country2) || empty($comm3) || empty($country3) || empty($deltype) ) {
            // TODO: Change belows link from index to the registration
            $headerReturn = "Location: ../index.php?error=emptyfields";

            if(empty($name)) {
                $headerReturn = $headerReturn . "&name";
            }
            if(empty($email)) {
                $headerReturn = $headerReturn . "&email";
            }
            if(empty($grade)) {
                $headerReturn = $headerReturn . "&grade";
            }
            if(empty($dob)) {
                $headerReturn = $headerReturn . "&dob";
            }
            if(empty($sex)) {
                $headerReturn = $headerReturn . "&sex";
            }
            if(empty($address)) {
                $headerReturn = $headerReturn . "&address";
            }
            if(empty($_POST['city'])) {
                $headerReturn = $headerReturn . "&city";
            }
            if(empty($_POST['state'])) {
                $headerReturn = $headerReturn . "&state";
            }
            if(empty($cell)) {
                $headerReturn = $headerReturn . "&cell";
            }
            if(empty($ec)) {
                $headerReturn = $headerReturn . "&ec";
            }
            if(empty($ecrelationship)) {
                $headerReturn = $headerReturn . "&ecrelationship";
            }
            if(empty($ecphone)) {
                $headerReturn = $headerReturn . "&ecphone";
            }
            if(empty($comm1)) {
                $headerReturn = $headerReturn . "&comm1";
            }
            if(empty($country1)) {
                $headerReturn = $headerReturn . "&country1";
            }
            if(empty($comm2)) {
                $headerReturn = $headerReturn . "&comm2";
            }
            if(empty($country2)) {
                $headerReturn = $headerReturn . "&country2";
            }
            if(empty($comm3)) {
                $headerReturn = $headerReturn . "&comm3";
            }
            if(empty($country3)) {
                $headerReturn = $headerReturn . "&country3";
            }

            header($headerReturn);
            exit();
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../index.php?error=invalidemail&pastexp=".$pastexp);
            exit();
        } else if($school == "null") {
            header("Location: ../index.php?status=nullSchool");
            exit();
        } else {

            /*
            $sql = "SELECT fullname, email FROM DelReg WHERE fullname='" . $name . "'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                header("Location: ../index.php?status=alreadyRegistered");
                exit();
            } else { */

                $sql2 = "INSERT INTO DelReg (fullname, email, school, grade, dob, gender, address, cellphone, homephone, ecname, ecrelationship, ecphone, pastexp, skillcap, commp1, countryp1, commp2, countryp2, commp3, countryp3, isdaydel, ispaid, isassigned, ispaybycheque, confirmedcomm, confirmedcountry, timestamp, referredby)
                VALUES ('" . $name . "','" . $email . "','" . $school . "','" . $grade . "','" . $dob . "','" . $sex . "','" . $address . "','" . $cell . "','" . $home . "','" . $ec . "','" . $ecrelationship . "','" . $ecphone . "','" . $pastexp . "','" . $delskillcap . "','" . $comm1 . "','" . $country1 . "','".$comm2 . "','" . $country2 . "','" . $comm3 . "','" . $country3 . "',".$isDayDel . ",".$haspaid .",".$isassigned.",". $ispaybycheque .",'".$assignedcommittee."','".$assignedcountry."','" . $timestamp . "','" . $referredby . "');";
                
                if(mysqli_query($conn, $sql2)) {

                    /* Make email trigger after payment is confirmed; payment will be confirmed via GET method user=[id]?status=paid */

                    if ($ispaybycheque) {

                        $to = $email;
                        $subject = "Confirmation of Delegate Registration: " . $name;
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
                                Please note that if you have chosen to pay by cheque, your spot will not be secured until we have received your payment.  
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
                            header("Location: ../index.php?status=success");
                        }

                    } else if (!($ispaybycheque)) {
                        if ($isDayDel) {
                            
                            $sql = "SELECT id FROM DelReg WHERE fullname='" . $name . "'";
                            $result = mysqli_query($conn, $sql);
                            $row = $result-> fetch_assoc();

                            if ($row['id'] != '') {
                                header("Location: ../regpay.php?RegType=Day&Id=" . $row['id']);
                            } else {
                                header("Location: ../index.php?status=dberror=" . $row['id']);
                            }

                        } else if (!($isDayDel)) {
                            
                            $sql = "SELECT id FROM DelReg WHERE fullname='" . $name . "'";
                            $result = mysqli_query($conn, $sql);
                            $row = $result-> fetch_assoc();
 
                            if ($row['id'] != '') {
                                header("Location: ../regpay.php?RegType=Hotel&Id=" . $row['id']);
                            } else {
                                header("Location: ../index.php?status=dberror=" . $row['id']);
                            }
                        } else {
                            exit();
                        }
                    }
                } else {
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    exit();
                }
          //  }
          //  'From: PacificMUN 2020 Delegate Affairs <delegateaffairs@pacificmun.org>' . "\r\n" .
        } 
        mysqli_close($conn);
    }
