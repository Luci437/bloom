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
    <script src="ajax/jquery-3.5.1.min.js"></script>
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
        
        <div style="display: flex;column-gap: 8px;">
            <a href="login.php" class="menus">Login</a>
            <a href="signup.php" class="menus">Signup</a>
        </div>
    </div>

    <div class="log-container">
            <form method="POST" class="login-main-box">
                <h2 class="main-heading">Forgot password!</h3>
                <h5 class="sub-heading">It's normal we all are humans ;)</h5>
                <div class="sub-login-box">
                    <label for="email" class="input-label">Email</label>
                    <input type="email" class="input-box" required id="email" name="email">
                </div>
                <label class="mail-error" style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 0 0 10px 0;">Your are accepting to our Policies and Conditions</label>
                <button type="submit" name="forgotPassword-form" class="log-button">Send Varification <img src="images/ld.svg" class="lod-anim"></button>
                <label style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 10px 0 0 0;">&copy; 2020 bloom</label>
            </form>

    </div>

    <script>
        $('form').on('submit', function(e) {
            e.preventDefault();
            $('.lod-anim').css({"visibility":"visible","z-index": "3"});
            $('.log-button').attr('disabled','disabled').css("opacity","0.3");
            let email = $('.input-box').val();
            $.ajax({
                url: 'includes/forgotPassword.inc.php',
                type: 'POST',
                data: {
                    email: email
                },
                success: function(dR) {
                    let dataResults = JSON.parse(dR);

                    console.log(dataResults.result);

                    if(dataResults.result == 1) {
                        $('.mail-error').html("&#10007; This email is not registred in bloom").css("color","red");
                        $('.lod-anim').css("visibility","hidden");
                        $('.log-button').removeAttr('disabled').css("opacity","1");
                    }else if(dataResults.result == 2) {
                        $('.mail-error').html("&#10007; Mail already sended to this email").css("color","#d8d834");
                        $('.lod-anim').css("visibility","hidden");
                        $('.log-button').removeAttr('disabled').css("opacity","1");
                    }else if(dataResults.result == 3) {
                        $('.lod-anim').css("visibility","hidden");
                        $('.log-button').removeAttr('disabled').css("opacity","1");
                        $('.mail-error').html("&#9993; Check your email").css("color","#7dff60");
                    }else {
                        $('.lod-anim').css("visibility","hidden");
                        $('.log-button').removeAttr('disabled').css("opacity","1");
                        $('.mail-error').html("&#10007; Something went wrong, please check you email id").css("color","red");
                    }
                }
            });
        });
    </script>

</body>
</html>