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
    <title>Forgot Password | bloom</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php
    if(isset($_GET['success'])) {
        if($_GET['success'] == 'logoutSuccess') {
            echo '<p class="logout-message"><i class="fas fa-check-circle"></i> Logged out successfully.</p>';
        }
    }
    ?>

    <div class="top-menu-bar">
        <img src="images/logo.svg" alt="logo" class="logo-img">
        
        <div>
            <a href="login.php" class="menus">Login</a>
            <a href="signup.php" class="menus">Signup</a>
        </div>
    </div>

    <div class="log-container">
            <form action="includes/forgotPassword.inc.php" method="POST" class="login-main-box">
                <h2 class="main-heading">Forgot password!</h3>
                <h5 class="sub-heading">It's normal we all are humans ;)</h5>
                <div class="sub-login-box">
                    <label for="email" class="input-label">Email</label>
                    <input type="email" class="input-box" required id="email" name="email">
                </div>
                <label style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 0 0 10px 0;">Your are accepting to our Policies and Conditions</label>
                <button type="submit" name="forgotPassword-form" class="log-button">Send Varification</button>
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