<?php

    require 'dh.inc.php';

    if(isset($_POST['forgotPassword-form'])) {
        $to = $_POST['email'];
        $subject = "Forgot Password of bloom";
        $ff = "pp";
        $from = "From: kamalej1234@gmail.com";

        if(mail($to,$subject,$ff,$from)) {
            echo "email send successfully";
            exit();
        }else {
            echo "something went wrong";  
            exit();
        }

    }
?>