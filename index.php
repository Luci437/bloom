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
            echo '<p class="logout-message"><i class="fas fa-check-circle"></i> Group Created Successfully.</p>';
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
        
        <div class="no-group-container">
            <!-- <img src="images/no-group.png" alt="no-group" class="no-group-img"> -->
            <div class="black-cover"></div>
            <h1 class="welcome-note">Welcome to bloom</h1>
            <h3 class="welcome-sub-note">You might know everything in this world, but do you know yourself?</h3>

            <?php 

                if(isset($_GET['link'])) {
                    if($_GET['link'] == 'showJoinBox') {
                        echo '
                            <form action="includes/cancelGroup.inc.php" method="post" class="join-group-form">
                            <table cellspacing="10" style="width: 400px;">
                                <tr>
                                    <td>
                                        <label for="group-id" class="group-label">Group code</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="text" name="group-id" required maxlength="5" class="group-input">
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td>
                                        <button name="find-group-form" class="join-button"> Join group</button>
                                        <a href="index.php" class="cancel-button"> Cancel</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    ';
                    exit();
                    }elseif($_GET['link'] == 'showCreateBox') {
                        echo '
                        <form action="includes/createGroup.inc.php" method="post" class="join-group-form">
                        <table cellspacing="10" style="width: 400px;">
                            <tr>
                                <td>
                                    <label for="group-id" class="group-label">Group name</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <input type="text" name="group-name" required maxlength="20" class="group-input-create">
                                </td>
                            </tr>
                            <tr align="left">
                                <td>
                                    <button name="create-group-form" class="join-button"> Create group</button>
                                    <a href="index.php" class="cancel-button"> Cancel</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                        ';
                    }
                }else {
                    echo '
                        <div class="group-button-box">
                            <a href="index.php?link=showCreateBox" class="group-button"><i class="fas fa-folder-plus pdspace"></i> Create group</a>
                            <a href="index.php?link=showJoinBox" class="group-button join-group"><i class="fas fa-plus-square pdspace"></i> Join group</a>
                        </div>
                    ';
                }

            ?>

        </div>
    </div>
</div>
</body>
</html>