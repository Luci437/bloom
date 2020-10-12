<?php

if(isset($_POST['login-form'])) {

    require 'dh.inc.php';

    $email = $_POST['email'];
    $pawd = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email';";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)) {
        if(password_verify($pawd, $row['password'])) {
            session_start();
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];

            header("Location: ../index.php");

        }else {
            header("Location: ../login.php?error=invalidUser");
            exit();
        }
    }else {
        header("Location: ../login.php?error=invalidUser");
        exit();
    }

}else {
    echo "not working";
    header("Location: ../login.php?erro=failedtosubmit");
    exit();
}


?>