<?php

    require 'dh.inc.php';
    session_start();

    if(isset($_SESSION['temp_userid'])) {
        if(isset($_POST['password'])) {

            $password = $_POST['password'];
            $uid = $_SESSION['temp_userid'];
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password='$password' WHERE id='$uid';";
            mysqli_query($conn, $sql);

            $sql2 = "SELECT email FROM users WHERE id='$uid';";
            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
            $email = $result['email'];

            $sql = "DELETE FROM forgotpassword WHERE email='$email';";
            mysqli_query($conn, $sql);

            echo json_encode(array("result"=>1));
            exit();
        }

    }else {
        echo json_encode(array("result"=>2));
        exit();
    }

?>