<?php

    if (isset($_POST['assignment-submit'])) {

        include_once 'dbh.inc.php';
        include_once 'functions.inc.php';

        $comm = trim($_POST['commts']);
        $comm = mysqli_real_escape_string($conn, $comm);

        $country = trim($_POST['countryts']);
        $country = mysqli_real_escape_string($conn, $country);

        $del = trim($_POST['delts']);
        $del = mysqli_real_escape_string($conn, $del);

        /*
         Initial asssessment: check if the country already has confirmed assignment. 
         
         If yes: 
          - get previous confirmed/reserved user
          - start automatic search for them
          - update their info (isassigned = false, if confirmed, remove confirmed comm & country)
          
         If no, 
          - confirm spot 
          - update newly confirmed user's records (isassigned = true, add the committee and country they're confirmed)
          - initiate email
        */

        $sqll = "SELECT confirmedcountry FROM DelReg WHERE fullname='" . $del . "'";
        $resultt = mysqli_query($conn, $sqll);
        $roww = $resultt-> fetch_assoc();

        if ($roww['confirmedcountry'] == '') {

            $sql = "SELECT reservedby FROM " . $comm . " WHERE delegation='" . $country . "'";
            $result = mysqli_query($conn, $sql);
            $row = $result-> fetch_assoc();

            if($row['reservedby'] != '') {
                // At this point, the country is reserved. Previous user will have to commence search again
                
                    
                    // Update records on user -- remove confirmed and isassigned values
                    $sql2 = "UPDATE DelReg SET isassigned=0 WHERE fullname='" . $row['reservedby'] . "';";
                    if(mysqli_query($conn, $sql2)) {

                        // Update records on database -- new delegate,
                        $sql3 = "UPDATE " . $comm . " SET confirmedby='" . $del . "' WHERE delegation='" . $country . "';";
                        if(mysqli_query($conn, $sql3)) {
                            
                            // Change User record to reflect the change
                            $sql2 = "UPDATE DelReg SET confirmedcomm='" . $comm . "', confirmedcountry='" . $country . "', isassigned=1 WHERE fullname='" . $del . "';";

                            if(mysqli_query($conn, $sql2)) {
                                // Change User record to reflect the change
                                $sql4 = "UPDATE " . $comm . " SET reservedby='' WHERE delegation='" . $country . "';";

                                if(mysqli_query($conn, $sql4)) {

                                    $sqlm = "SELECT email, confirmedcomm, confirmedcountry FROM DelReg WHERE fullname='" . $del . "'";
                                    $resultm = mysqli_query($conn, $sqlm);
                                    $rowm = $resultm-> fetch_assoc();

                                    $to = $rowm['email'];
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
                                            I am pleased to inform you that you will be representing <strong>' . $rowm['confirmedcountry'] . '</strong> in <strong>' . $rowm['confirmedcomm'] . '</strong>.
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
                                    'From: Delegate Affairs <delegateaffairs@pacificmun.org>' . "\r\n" .
                                    'Reply-To: delegateaffairs@pacificmun.org' . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();
                                    
                                    $checkmail = mail($to, $subject, $message, $headers);
                                    if (!$checkmail) {
                                        $errorMessage = error_get_last()['message'];
                                    }
                                    
                                    assignDelegate($row['reservedby'], 2);
                                    header('Location: ../dacpanel.php?assignmentSuccess');
                                    exit();
                                } else {
                                    echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
                                    exit();
                                }
                            } else {
                                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                                exit();
                            }
                            exit();
                        } else {
                            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                            exit();
                        }
                            
                        exit();
                    } else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                        exit();
                    }


                    /*

                $sql2 = "UPDATE DelReg SET isassigned=0 WHERE fullname='" . $row['reservedby'] . "';";

                if(mysqli_query($conn, $sql2)) {

                    $sql3 = "UPDATE DelReg SET confirmedcomm='" . $comm . "', confirmedcountry='" . $country . "', isassigned=1 WHERE fullname='" . $del . "';";

                    if(mysqli_query($conn, $sql3)) {

                        $sql4 = "UPDATE " . $comm . " SET confirmedby='" . $del . "' WHERE delegation='" . $country . "';";
                        if(mysqli_query($conn, $sql4)) {

                            $sql4 = "UPDATE " . $comm . " SET reservedby='' WHERE delegation='" . $country . "';";
                            if(mysqli_query($conn, $sql4)) {
                                assignDelegate($row['reservedby'], 2);
                                sendMail($del, 'confirm');
                                header('Location: ../dacpanel.php?assignmentSuccess');
                                return;
                            } else {
                                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                                exit();
                            }

                        } else {
                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                            exit();
                        }

                    } else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                        exit();
                    }
                } else {
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    exit();
                }
*/




                
            } else {
                // At this point, there is no reservation on the country. Either it's already confirmed or it's barren

                // Check if it's confirmed
                $sql = "SELECT reservedby, confirmedby FROM " . $comm . " WHERE delegation='" . $country . "';";
                $result = mysqli_query($conn, $sql);
                $row = $result-> fetch_assoc();

                if($row['confirmedby'] != '') {
                    // At this point, the country was confirmed by another person already
                    
                    // Update records on user -- remove confirmed and isassigned values
                    $sql2 = "UPDATE DelReg SET confirmedcomm='', confirmedcountry='', isassigned=0 WHERE fullname='" . $row['confirmedby'] . "';";
                    if(mysqli_query($conn, $sql2)) {

                        // Update records on database -- new delegate,
                        $sql3 = "UPDATE " . $comm . " SET confirmedby='" . $del . "' WHERE delegation='" . $country . "';";
                        if(mysqli_query($conn, $sql3)) {
                            
                            // Change User record to reflect the change
                            $sql2 = "UPDATE DelReg SET confirmedcomm='" . $comm . "', confirmedcountry='" . $country . "', isassigned=1 WHERE fullname='" . $del . "';";

                            if(mysqli_query($conn, $sql2)) {

                                $sqlm = "SELECT email, confirmedcomm, confirmedcountry FROM DelReg WHERE fullname='" . $del . "'";
                                $resultm = mysqli_query($conn, $sqlm);
                                $rowm = $resultm-> fetch_assoc();

                                $to = $rowm['email'];
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
                                        I am pleased to inform you that you will be representing <strong>' . $rowm['confirmedcountry'] . '</strong> in <strong>' . $rowm['confirmedcomm'] . '</strong>.
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
                                'From: Delegate Affairs <delegateaffairs@pacificmun.org>' . "\r\n" .
                                'Reply-To: delegateaffairs@pacificmun.org' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                                
                                $checkmail = mail($to, $subject, $message, $headers);
                                if (!$checkmail) {
                                    $errorMessage = error_get_last()['message'];
                                }
                                
                                assignDelegate($row['confirmedby'], 2);
                                header('Location: ../dacpanel.php?assignmentSuccess');
                                exit();
                            } else {
                                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                                exit();
                            }
                            exit();
                        } else {
                            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                            exit();
                        }
                            
                        exit();
                    } else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                        exit();
                    }

                    
                } else {
                    //At this point, the country is barren so the user can be confirmed. Once confirmed, the user will have to have their columns updated

                    $sql = "UPDATE " . $comm . " SET confirmedby='" . $del . "' WHERE delegation='" . $country . "';";

                    if(mysqli_query($conn, $sql)) {
                        // Change User record to reflect the change

                        $sql2 = "UPDATE DelReg SET confirmedcomm='" . $comm . "', confirmedcountry='" . $country . "', isassigned=1 WHERE fullname='" . $del . "';";

                        if(mysqli_query($conn, $sql2)) {
                            

                            $sqlm = "SELECT email, confirmedcomm, confirmedcountry FROM DelReg WHERE fullname='" . $del . "'";
                            $resultm = mysqli_query($conn, $sqlm);
                            $rowm = $resultm-> fetch_assoc();

                            $to = $rowm['email'];
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
                                    I am pleased to inform you that you will be representing <strong>' . $rowm['confirmedcountry'] . '</strong> in <strong>' . $rowm['confirmedcomm'] . '</strong>.
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
                            'From: Delegate Affairs <delegateaffairs@pacificmun.org>' . "\r\n" .
                            'Reply-To: delegateaffairs@pacificmun.org' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                            
                            $checkmail = mail($to, $subject, $message, $headers);
                            if (!$checkmail) {
                                $errorMessage = error_get_last()['message'];
                            }

                            header('Location: ../dacpanel.php?assignmentSuccess');
                            exit();
                        } else {
                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                            exit();
                        }

                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        exit();
                    }
                }
            }
        } else {
            header('Location: ../dacpanel.php?error=DelAlreadyAssigned');
            exit();
        }

    } else {
        header('Location: ../dacpanel.php?wack');
        exit();
    }

?>