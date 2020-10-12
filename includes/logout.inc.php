<?php
    if(!isset($_SESSION["userid"])) {
        session_start();
        session_unset();
        session_destroy();

        header("Location: ../login.php?success=logoutSuccess");
        exit();
    }
?>