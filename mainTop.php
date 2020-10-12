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
<?php
    include_once("headpart.php");
?>

<?php
    if(isset($_GET['success'])) {
        if($_GET['success'] == 'groupCreated') {
            echo '<p class="logout-message"><i class="fas fa-check-circle pdspace"></i> Group Created Successfully.</p>';
        }
    }
    if(isset($_GET['error'])) {
        if($_GET['error'] == 'privateGroup') {
            echo '<p class="warning-message"><i class="fas fa-exclamation-triangle pdspace"></i> Group is closed, try again later.</p>';
        }elseif($_GET['error'] == 'group404') {
            echo '<p class="red-message"><i class="fas fa-times-circle pdspace"></i> Can\'t find the Group.</p>';
        }
    }
    ?>

<div class="main-container">
    <div class="left-container">
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
            <a href="#" class="user-menu-buttons"><i class="fas fa-users uicons"></i> My groups</a>
        </div>

    </div>
    <div class="right-container">

