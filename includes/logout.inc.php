<?php
    if(isset($_POST['id'])) {
        if(!isset($_SESSION["userid"])) {
            session_start();
            session_unset();
            session_destroy();
    
            echo "Logged Out successfully";
            exit();
        }
    }

?>