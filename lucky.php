<?php
    include "includes/dh.inc.php";
    session_start();
    if(!isset($_SESSION['newGame'])) {
        header("Login.php");
        exit();
    }   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon" />
    <title>Make it spicy</title>
    <link rel="stylesheet" href="css/lucky.css">
    <script scr="ajax/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="main-container">
        <h4 class="game-title">AMONG US</h4>
        <div class="box1">
            <h4 class="box1-title">PLAYERS</h4>
            <button class="box1-start-button" onclick="findLucky();">START</button>
            <?php
                $gameId = $_SESSION['newGame'];
                $sql = "SELECT ap.player_name,ap.scores,ap.id FROM available_players ap, addedgame ag WHERE ag.game_id='$gameId' AND ag.player_id=ap.id ORDER BY ap.scores DESC;";
                $result = mysqli_query($conn, $sql);
                $firstPlayer = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    if($firstPlayer > 0) {
                        echo '
                        <div class="box1-player-box">
                            <h4 class="box1-player-name"><i class="fas fa-user-astronaut pdspace"></i><span class="available-playerName">'.$row['player_name'].'<span></h4>
                            <input type="hidden" class="player-id" value="'.$row["id"].'">
                        </div>    
                        ';
                    }
                    $firstPlayer++;

                }
            ?>
            <div class="waiting-box">
                <h4 class="waiting-text"><img src="images/ld.svg" class="lod-anim">Finding our lucky player..</h4>
            </div>
        </div>

        <div class="box2">
            <h4 class="confirmation-text"><span class="selected-player-name"></span> <span
                    class="confirmation-answer">do you want to continue?</span></h4>
            <div class="box2-button-box">
                <button class="confirmation-button confirm-yes" onclick="getCard()">Yes</button>
                <!-- <button class="confirmation-button" onclick="(function(){ window.location = 'amongus.php'; })">Nah</button> -->
                <a href="amongus.php" style="font-size: 12px;" class="confirmation-button">Nah</a>
            </div>
        </div>

        <div class="box3">
            <div class="card-box">
                <div class="card frontface">
                    <div class="cover-bg"></div>
                    <h3 class="countdown">10</h3>
                </div>
                <div class="card backface">
                    <h3 class="header-title">Heading</h3>
                    <h4 class="header-text">You exchange your score with him</h4>
                </div>
            </div>
        </div>
    </div>


    <script src="ajax/jquery-3.5.1.min.js"></script>
    <script src="javascript/lucky.js"></script>
</body>

</html>