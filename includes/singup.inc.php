<?php

    if(isset($_POST['singup-form'])) {

        require 'dh.inc.php';

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pawd = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if($user) {
            header("Location: ../signup.php?error=usernameTaken");
            exit();
        }else {
            $hashPwd = password_hash($pawd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(name,email,password) VALUES('$name', '$email', '$hashPwd');";
            mysqli_query($conn, $sql);
            header("Location: ../login.php?success=accountCreated&email=$email");
            exit();
        }
    }else {
        header('Location: ../signup.php?error=unauthorizedEnter');
    }

?>