<?php
    ini_set("default_socket_timeout", 10);

    /*
        Technical Debt --

        This functions.inc.php file will include three main functions:
        1. Automatic Reservation
        2. Email send on Confirmation
        3. Confirm reservations on a set date (e.g. Dec 3)
        4. Email sent for Confirmation Revoke (please don't invoke this) 
    */

    function assignDelegate($delName, $trypref) {
        $host_name = "localhost";
        $user_name = "sickomode";
        $password = "islu32pqdblt";
        $asmrdb = "ASMR";

        $conn = mysqli_connect($host_name, $user_name, $password, $asmrdb);

        if (!$conn) {
            die("Connection to PacificMUN ASMR Database failed with error message: " . mysqli_connect_error());
        }
        
        /*
            Flow of function:
             1. First finds out all the preferences of committees and countries
             2. Loop through Preferences 1, 2, 3
                a. If all are unavailable to reserve for any, find country in comm pref 1 w/ power ranking closest to skillcap
        */

        $sqlz = "SELECT id, skillcap, commp1, countryp1, commp2, countryp2, commp3, countryp3, isdaydel FROM DelReg WHERE fullname='" . trim($delName) . "';";
        $resultz = mysqli_query($conn, $sqlz);
        $rowz = $resultz-> fetch_assoc();

        if($rowz['commp1'] != '') {
            // echo '<br> >>> assignDelegate: '. $delName . ', Try Preference: ' . $trypref . '<br>';

            $comm1 = $rowz['commp1'];
            $country1 = $rowz['countryp1'];
            $comm2 = $rowz['commp2'];
            $country2 = $rowz['countryp2'];
            $comm3 = $rowz['commp3'];
            $country3 = $rowz['countryp3'];

            $sql1 = "SELECT powerranking, confirmedby FROM " . $comm1 . " WHERE delegation='" . $country1 . "';";
            $result1 = mysqli_query($conn, $sql1);
            if ($result1 === FALSE) {
                
                if($rowz['isdaydel'] == 1) {
                    header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                } else {
                    header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                }
                exit();
            } else {
                $row1 = mysqli_fetch_assoc($result1);

                if( ($row1['powerranking'] <= $rowz['skillcap']) && ($row1['confirmedby'] == "") && ($trypref == 1) ) {
                    // echo 'enters first pref';
    
                    // satisfies first pref, and is not confirmed
                    /*
                        Now has to check if country is already reserved
                         - If already reserved, check if current reservee is lower skillcap than new user
                         - If not reserved, reserve
                    */
    
                    $sql1a = "SELECT reservedby FROM " . $comm1 . " WHERE delegation='" . $country1 . "';";
                    $result1a = mysqli_query($conn, $sql1a);
                    $row1a = mysqli_fetch_assoc($result1a);
    
                    if ( $row1a['reservedby'] == "" ) {
                        // if is not reserved
                        $sqlreserve = "UPDATE " . $comm1 . " SET reservedby='" . $delName . "' WHERE delegation='" . $country1 . "';";
    
                        if (mysqli_query($conn, $sqlreserve)) {
                            // successfully reserved
                            return;
                        } else {
                            if($rowz['isdaydel'] == 1) {
                                header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                            } else {
                                header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                            }
                            exit();
                        }
                    } else {
                        // is reserved
    
                        // get skillcap of the current reservee
                        $sql1b = "SELECT skillcap FROM DelReg WHERE fullname='" . $row1a['reservedby'] . "';";
                        $result1b = mysqli_query($conn, $sql1b);
                        $row1b = mysqli_fetch_assoc($result1b);
    
                        if ($row1b['skillcap'] < $rowz['skillcap']) {
                            // current reservee has less skillcap than new (replace, and run program for current)
                            $sqlreserve = "UPDATE " . $comm1 . " SET reservedby='" . $delName . "' WHERE delegation='" . $country1 . "';";
    
                            if (mysqli_query($conn, $sqlreserve)) {
                                // successfully reserved
    
                                assignDelegate($row1a['reservedby'], 1);
                                return;
                            } else {
                                if($rowz['isdaydel'] == 1) {
                                    header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                                } else {
                                    header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                                }
                                exit();
                            } 
                        } else {
                            // skill cap isn't higher, retry for second pref
                            assignDelegate($delName, 2);
                            return;
                        }
                    }
                } else if ($trypref == 1) {
                    // already confirmed, retry for second pref
                    assignDelegate($delName, 2);
                    return;
                }
            }
            
            
            $sql2 = "SELECT powerranking, confirmedby FROM " . $comm2 . " WHERE delegation='" . $country2 . "';";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 === FALSE) {
                if($rowz['isdaydel'] == 1) {
                    header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                } else {
                    header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                }
                exit();
            } else {
                $row2 = mysqli_fetch_assoc($result2);
                
                if (($row2['powerranking'] <= $rowz['skillcap']) && ($row2['confirmedby'] == "") && ($trypref == 2)) {
                    // echo ' pref 2 ';
                    

                    $sql1a = "SELECT reservedby FROM " . $comm2 . " WHERE delegation='" . $country2 . "';";
                    $result1a = mysqli_query($conn, $sql1a);
                    $row1a = mysqli_fetch_assoc($result1a);

                    if ( $row1a['reservedby'] == "" ) {
                        // if is not reserved
                        $sqlreserve = "UPDATE " . $comm2 . " SET reservedby='" . $delName . "' WHERE delegation='" . $country2 . "';";

                        if (mysqli_query($conn, $sqlreserve)) {
                            // successfully reserved

                            return;
                        } else {
                            if($rowz['isdaydel'] == 1) {
                                header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                            } else {
                                header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                            }
                            exit();
                        }

                    } else {
                        // is reserved

                        // get skillcap of the current reservee
                        $sql1b = "SELECT skillcap FROM DelReg WHERE fullname='" . $row1a['reservedby'] . "';";
                        $result1b = mysqli_query($conn, $sql1b);
                        $row1b = mysqli_fetch_assoc($result1b);

                        if ($row1b['skillcap'] < $rowz['skillcap']) {
                            // current reservee has less skillcap than new (replace, and run program for current)
                            $sqlreserve = "UPDATE " . $comm2 . " SET reservedby='" . $delName . "' WHERE delegation='" . $country2 . "';";

                            if (mysqli_query($conn, $sqlreserve)) {
                                // successfully reserved

                                assignDelegate($row1a['reservedby'], 1);
                                return;
                            } else {
                                if($rowz['isdaydel'] == 1) {
                                    header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                                } else {
                                    header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                                }
                                exit();
                            }
                        } else {
                            // skill cap isn't higher, retry for second pref
                            assignDelegate($delName, 3);
                            return;
                        }
                    }
                } else if ($trypref == 2) {
                    // already confirmed, retry for third pref
                    assignDelegate($delName, 3);
                    return;
                }
            }
            
            $sql3 = "SELECT powerranking, confirmedby FROM " . $comm3 . " WHERE delegation='" . $country3 . "';";
            $result3 = mysqli_query($conn, $sql3);
            if($result3 === FALSE) {
                if($rowz['isdaydel'] == 1) {
                    header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                } else {
                    header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                }
                exit();
            } else {
                $row3 = mysqli_fetch_assoc($result3);

                if (($row3['powerranking'] <= $rowz['skillcap']) && ($row3['confirmedby'] == "") && ($trypref == 3)) {
                    // echo ' pref 3 ';
    
                    $sql1a = "SELECT reservedby FROM " . $comm3 . " WHERE delegation='" . $country3 . "';";
                    $result1a = mysqli_query($conn, $sql1a);
                    $row1a = mysqli_fetch_assoc($result1a);
    
                    if ( $row1a['reservedby'] == "" ) {
                        // if is not reserved
                        $sqlreserve = "UPDATE " . $comm3 . " SET reservedby='" . $delName . "' WHERE delegation='" . $country3 . "';";
    
                        if (mysqli_query($conn, $sqlreserve)) {
                            // successfully reserved
                            return;
                        } else {
                            if($rowz['isdaydel'] == 1) {
                                header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                            } else {
                                header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                            }
                            exit();
                        }
    
                    } else {
                        // is already reserved
    
                        // get skillcap of the current reservee
                        $sql1b = "SELECT skillcap FROM DelReg WHERE fullname='" . $row1a['reservedby'] . "';";
                        $result1b = mysqli_query($conn, $sql1b);
                        $row1b = mysqli_fetch_assoc($result1b);
    
                        if ($row1b['skillcap'] < $rowz['skillcap']) {
                            // current reservee has less skillcap than new (replace, and run program for current)
                            $sqlreserve = "UPDATE " . $comm3 . " SET reservedby='" . $delName . "' WHERE delegation='" . $country3 . "';";
    
                            if (mysqli_query($conn, $sqlreserve)) {
                                // successfully reserved
    
                                assignDelegate($row1a['reservedby'], 1);
                                return;
                            } else {
                                if($rowz['isdaydel'] == 1) {
                                    header("Location: ../regpay.php?RegType=Day&Id=" . $rowz['id']);
                                } else {
                                    header("Location: ../regpay.php?RegType=Hotel&Id=" . $rowz['id']);
                                }
                                exit();
                            }
                        } else {
                            // TODO: send email to DA, Unassigned del
                            return;
                        }
                    }
                } else if ($trypref == 3) {
                    // TODO: send email to DA, Unassigned del
    
                    $sqlm = "SELECT email, confirmedcomm, confirmedcountry FROM DelReg WHERE fullname='" . trim($delName) . "'";
                    $resultm = mysqli_query($conn, $sqlm);
                    $rowm = mysqli_fetch_assoc($resultm);
                    
                    $to = 'delegateaffairs@pacificmun.org';
                    $subject = "Newbie (Unreserved) Delegate: " . $delName;
                    $message = '
                    <html> 
                    <head> 
                        <title>PacificMUN 2020 Newbie Delegate Detected</title>
                    </head> 
                    <body> 
                        <div class="letter-container">
                            Delegate ' . $delName . ' is unreserved. Please confirm him a country.
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
                }
            }

            return;

            /*

            $try1 = true;
            $try2 = true;
            $try3 = true;

            while( ($try1 == true) || ($try2 == true) || ($try3 == true) ) {

            }
            */
        } else {
            header('Location: ../dacpanel.php?ASMRAutoAssignError=NoCommitteePreference');
            exit();
        }
    }