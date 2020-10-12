<?php
    include_once('includes/dh.inc.php');
    session_start();
    if(isset($_SESSION['userid'])) {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon" />
    <title>Sign Up | bloom</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background: url('images/page2_top.jpg');
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="top-menu-bar">
        <img src="images/logo.svg" alt="logo" class="logo-img">
        
        <div>
            <a href="login.php" class="menus">Login</a>
            <a href="signup.php" class="menus active">Signup</a>
        </div>
    </div>

    <div class="log-container">
            <form action="includes/singup.inc.php" method="post" class="login-main-box">
                <h2 class="main-heading">Sign up to bloom</h3>
                <h5 class="sub-heading">The best decision that you ever made</h5>

                <div class="sub-login-box">
                    <label for="name" class="input-label">Name</label>
                    <input type="text" class="input-box" required id="name" name="name">
                </div>

                <div class="sub-login-box">
                    <label for="email" class="input-label">Email</label>
                    <input type="email" class="input-box" required id="email" name="email">
                </div>

                <div class="sub-login-box">
                    <label for="password" class="input-label">Password</label>
                    <input type="password" class="input-box" required id="password" name="password">
                </div>
                
                <label style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 0 0 10px 0;">&#10003; Your are accepting to our Policies and Conditions</label>
                <button class="log-button" name="singup-form">Create Account</button>
                <label style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 10px 0 0 0;">&copy; 2020 bloom</label>
            </form>
            <?php
                if(isset($_GET['error'])) {
                    if($_GET['error'] == 'usernameTaken') {
                        echo '<p class="error-message">Sorry Email already registred</p>';
                    }
                }
            ?>
    </div>
</body>
</html>