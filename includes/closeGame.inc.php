<?php

    require "dh.inc.php";
    if(!isset($_SESSION["newGame"])) {
        session_start();
        unset($_SESSION['newGame']);

        header("Location: ../amongus.php");
        exit();
    }
?>