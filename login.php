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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Sign In | bloom</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php
    if(isset($_GET['success'])) {
        if($_GET['success'] == 'logoutSuccess') {
            echo '<p class="logout-message"><i class="fas fa-check-circle"></i> Logged out successfully.</p>';
        }
    }
    if(isset($_GET['error'])) {
        if($_GET['error'] == 'invalidToken') {
            echo '<p class="warning-message"><i class="fas fa-exclamation-triangle pdspace"></i> That token is invalid or expired.</p>';
        }
    }

    ?>

    <div class="top-menu-bar">
        <img src="images/logo.svg" alt="logo" class="logo-img">
        
        <div style="display: flex;column-gap: 8px;">
            <a href="login.php" class="menus active">Login</a>
            <a href="signup.php" class="menus">Signup</a>
        </div>
    </div>

    <div class="log-container">
            <form action="includes/login.inc.php" method="POST" class="login-main-box">
                <h2 class="main-heading">Sign in to bloom</h3>
                <h5 class="sub-heading">Welcome back to bloo, the place we know who am i.</h5>
                <div class="sub-login-box">
                    <label for="email" class="input-label">Email</label>
                    <?php
                        if(isset($_GET['email'])) {
                            $eid = $_GET['email'];
                            echo '<input type="email" class="input-box" required id="email" value="'.$eid.'" name="email">';        
                        }else {
                            echo '<input type="email" class="input-box" required id="email" name="email">';
                        }
                    ?>
                </div>
                <div class="sub-login-box">
                    <label for="password" class="input-label">Password</label>
                    <input type="password" class="input-box" required id="password" name="password">
                </div>
                <div class="sub-login-box">
                    <a class="forgot-password-link" href="forgotpassword.php">i forgot my password!</a>
                </div>
                <label style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 0 0 10px 0;">Your are accepting to our Policies and Conditions</label>
                <button type="submit" name="login-form" class="log-button">Sign In</button>
                <label style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 10px 0 0 0;">&copy; 2020 bloom</label>
            </form>
            <?php
                if(isset($_GET['success'])) {
                    if($_GET['success'] == 'accountCreated') {
                        echo '<p class="success-message"><i class="fas fa-check-circle"></i> Account created successfully.</p>';
                    }
                }else if(isset($_GET['error'])) {
                    if($_GET['error'] == 'invalidUser') {
                        echo '<p class="error-message">Wrong Email/Password combination.</p>';
                    }
                }
            ?>
    </div>
</body>
</html>