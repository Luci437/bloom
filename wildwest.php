<?php
    include('includes/dh.inc.php');
    session_start();
    if(!isset($_SESSION['newGame'])){
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild West | Among Us</title>
    <link rel="stylesheet" href="css/wildwest.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body onload="setAll()">

    <?php
        $gameId = $_SESSION['newGame'];
        $luckyPlayerId = $_GET['luckyPlayer'];
        $sql = "SELECT ap.player_name,ap.id FROM newgame ng, available_players ap, addedgame ag WHERE ag.game_id = ng.id AND ng.id='$gameId' AND ag.player_id=ap.id ORDER BY ap.scores DESC;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            if($luckyPlayerId != $row['id']) {
                echo '
                <input type="hidden" value="'.$row["id"].'" data-player="'.$row["player_name"].'" class="allPlayerDetails">
                ';
            }            
        }
    ?>

    <div class="cardMainBox">

        <div class="mainCardBox">
            <h2 class="playerName">9Kumar</h2>
            <div class="frontFace" onclick="revealCard(this)" data-userId="">
                <div class="devilFace"></div>
                <div class="hud"></div>
            </div>
            <div class="cardBorder"></div>
        </div>

        <div class="mainCardBox">
            <h2 class="playerName">9Kumar</h2>
            <div class="frontFace" onclick="revealCard(this)" data-userId="">
                <div class="devilFace"></div>
                <div class="hud"></div>
            </div>
            <div class="cardBorder"></div>
        </div>

        <div class="mainCardBox">
            <h2 class="playerName">9Kumar</h2>
            <div class="frontFace" onclick="revealCard(this)" data-userId="">
                <div class="devilFace"></div>
                <div class="hud"></div>
            </div>
            <div class="cardBorder"></div>
        </div>

        <div class="mainCardBox">
            <h2 class="playerName">9Kumar</h2>
            <div class="frontFace" onclick="revealCard(this)" data-userId="">
                <div class="devilFace"></div>
                <div class="hud"></div>
            </div>
            <div class="cardBorder"></div>
        </div>

        <div class="mainCardBox">
            <h2 class="playerName">9Kumar</h2>
            <div class="frontFace" onclick="revealCard(this)" data-userId="">
                <div class="devilFace"></div>
                <div class="hud"></div>
            </div>
            <div class="cardBorder"></div>
        </div>

    </div>

    <div class="endScreen">
        <h1 class="endTitle">YOU HAVE BEEN OOKED</h1>
        <a href="amongus.php" class="backButton"><i class="fas fa-angle-left"></i></a>
    </div>
</body>
<script src="ajax/jquery-3.5.1.min.js"></script>
<script src="javascript/wild.js"></script>
</html>