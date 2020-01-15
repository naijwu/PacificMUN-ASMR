<?php

    if(isset($_POST['dacpanel-login'])) {

        if($_POST['dacuser'] === "DELEGATEAFFAIRUSERNAME") {
            if($_POST['dacpass'] === "DELEGATEAFFAIRPASSWORD") {
                session_start();
                $_SESSION['token'] = true;
                header('Location: ../dacpanel.php?loginSuccess');
                exit();
            } else {
                header('Location: ../dacpanel.php?invalidPass');
                exit();
            }
        } else {
            header('Location: ../dacpanel.php?invalidUser');
            exit();
        }

    } else {
        header('Location: ../dacpanel.php?whatyoutrynadolol');
        exit();
    }

?>