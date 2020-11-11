<?php
    session_start();
    include_once("includes/dh.inc.php");
    if(isset($_SESSION['userid'])) {
        // echo $_SESSION['username']." you have all the rights to enter here.";
    }else {
        header("Location: login.php");
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
    <title>bloom | Welcome</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="logout-anim-box">
        <h3 class="logout-heading">Logging out <span><img src="images/ld.svg" class="logout-anim"></span></h3>
        <h5 class="logout-log">/junk/caches</h5>
    </div>

    <h4 class="copy-message"><i class="fas fa-clipboard pdspace"></i> Code copied</h4>

<?php
    include_once("headpart.php");
?>

<?php
    if(isset($_GET['success'])) {
        if($_GET['success'] == 'groupCreated') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Group Created Successfully.</p>';
        }
        if($_GET['success'] == 'reviewPosted') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Your review has been posted.</p>';
        }
        if($_GET['success'] == 'PermissionChanged') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Group Permission changed.</p>';
        }
        if($_GET['success'] == 'exitedGroup') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Leaved group successfully.</p>';
        }
        if($_GET['success'] == 'groupSmashed') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Group erased successfully.</p>';
        }
        if($_GET['success'] == 'kicked') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Member has been kicked.</p>';
        }
        if($_GET['success'] == 'gpDeleted') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Group Deleted successfully.</p>';
        }
    }
    if(isset($_GET['error'])) {
        if($_GET['error'] == 'privateGroup') {
            echo '<p class="warning-message"><i class="fas fa-exclamation-triangle pdspace"></i> Group is closed, try again later.</p>';
        }
        if($_GET['error'] == 'group404') {
            echo '<p class="red-message"><i class="fas fa-times-circle pdspace"></i> Can\'t find that Group.</p>';
        }
        if($_GET['error'] == 'notAdmin') {
            echo '<p class="warning-message"><i class="fas fa-exclamation-triangle pdspace"></i> Only group admin can kick anyone.</p>';
        }
    }
    ?>

<div class="main-container">
    <div class="left-container">
        <a href="account.php" style="position: absolute;top: 5px;right: 5px;z-index: 10;padding: 16px;" title="Edit Profile"><i class="fas fa-cog account-settings-icon"></i></a>
        <div class="user-info-box">
            <div class="image-black-cover"></div>
            <div class="user-infos">
            <?php

            require 'includes/dh.inc.php';

            $userid = $_SESSION['userid'];
            $sql = "SELECT * FROM users WHERE id='$userid';";
            $result = mysqli_query($conn, $sql);

            if($row = mysqli_fetch_assoc($result)) {
                echo '<h2>'.$row['name'].'</h2>';
                echo '<h4>'.$row['email'].'</h4>';
            }
            ?>
            </div>
        </div>

        <div class="user-menus">
            <a href="myGroup.php" class="user-menu-buttons active-menus-groups"><i class="fas fa-users uicons"></i> My groups</a>
            <a href="showMyReviews.php" class="user-menu-buttons active-menus-reviews"><i class="fas fa-pencil-alt uicons"></i> My Reviews 
            <div class="total-review-box">
                <p id="review-text">0</p>
            </div>
             </a>
        </div>

        <script src="ajax/jquery-3.5.1.min.js"></script>
        <script>
            $('.total-review-box').hide();
            setInterval(() => {
                $.ajax({
            url: 'ajax/countReviews.ajax.php',
            type: 'POST',
            data: {
                val : '1'
            },
            cache: false,
            success: function(dataResult) {
                $('.total-review-box').hide();
                var dataResult = JSON.parse(dataResult);
                if(dataResult.reviews > 0) {
                    $('.total-review-box').show();
                    $("#review-text").html(dataResult.reviews);
                }else {
                    $('.total-review-box').hide();
                }
            }
        });
            }, 1000);
        </script>

    </div>
    <div class="right-container">

