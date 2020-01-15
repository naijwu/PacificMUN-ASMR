<?php

    if (isset($_POST['reservation-submit'])) {

        include_once 'dbh.inc.php';
        include_once 'functions.inc.php';
        
        $comm = trim($_POST['commts']);
        $comm = mysqli_real_escape_string($conn, $comm);
        
        $country = trim($_POST['countryts']);
        $country = mysqli_real_escape_string($conn, $country);

        $del = trim($_POST['delts']);
        $del = mysqli_real_escape_string($conn, $del);

        $sql = "UPDATE " . $comm . " SET reservedby='" . $del . "' WHERE delegation='" . $country . "';";

        if(mysqli_query($conn, $sql)) {
            
            header("Location: ../dacpanel.php?ReservedSuccessfully");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            exit();
        }

    } else {
        header('Location: ../dacpanel.php?wack');
        exit();
    }

?>