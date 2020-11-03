<?php
    include_once('includes/dh.inc.php');
    session_start();
    if(isset($_SESSION['userid'])) {
        header("Location: index.php");
        exit();
    }else {
        if(isset($_GET['token'])) {
            $token = $_GET['token'];
            $sql = "SELECT email FROM forgotpassword WHERE token='$token';";
            if((mysqli_num_rows(mysqli_query($conn, $sql))) == 0) {
                header("Location: login.php?error=invalidToken");
                exit();
            }
            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $email = $result['email'];
            $sql2 = "SELECT id FROM users WHERE email='$email';";
            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
            $uid = $result['id'];
            $_SESSION['temp_userid'] = $uid;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Change Password | bloom</title>
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
        
        <div>
            <a href="login.php" class="menus">Login</a>
            <a href="signup.php" class="menus">Signup</a>
        </div>
    </div>

    <div class="log-container">
            <form method="POST" class="login-main-box">
                <h2 class="main-heading">Change password!</h3>
                <h5 class="sub-heading">This time try to set a good password ;)</h5>
                <div class="sub-login-box">
                    <label for="newPassword" class="input-label">New Password</label>
                    <input type="newPassword" class="input-box" required id="newPassword" name="newPassword">
                </div>
                <div class="sub-login-box">
                    <label for="repeatPassword" class="input-label">Repeat Password</label>
                    <input type="repeatPassword" class="input-box" required id="repeatPassword" name="repeatPassword">
                </div>
                <label class="mail-error" style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 0 0 10px 0;">Your are accepting to our Policies and Conditions</label>
                <button type="submit" name="forgotPassword-form" class="log-button">Change Password <img src="images/ld.svg" class="lod-anim"></button>
                <label style="color: rgba(255,255,255,0.1);font-size: 12px;padding: 10px 0 0 0;">&copy; 2020 bloom</label>
            </form>

    </div>

    <script>
        $('form').on('submit', function(e) {
            e.preventDefault();
            $newPassword = $('#newPassword').val();
            $repeatPassword = $('#repeatPassword').val();
            if($newPassword == $repeatPassword) {
                $('.mail-error').html("");
                $('.lod-anim').css({"visibility":"visible","z-index": "3"});
                $('.log-button').attr('disabled','disabled').css("opacity","0.3");
                $.ajax({
                    url: "includes/changePassword.inc.php",
                    type: "POST",
                    data: {
                        password:$newPassword
                    },
                    success: function(dataRes23) {
                        let dataRes2 = JSON.parse(dataRes23);
                        console.log(dataRes2.result);
                        setTimeout(() => {
                            if(dataRes2.result == 1) {
                            $('.lod-anim').css("visibility","hidden");
                            $('.log-button').removeAttr('disabled').css("opacity","1");
                            $('.mail-error').html("Password changed successfully").css("color","green");
                            setTimeout(() => {
                                window.location = "login.php";
                            }, 2000);
                            }else {
                                window.location = "login.php";
                            }
                        }, 1000);
                    }
                });
            }else {
                $('.mail-error').html("Password don't match").css("color","red");
            }
        });
    </script>

</body>
</html>