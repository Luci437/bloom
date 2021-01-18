<?php
    include "includes/dh.inc.php";
    session_start();
    if(!isset($_SESSION['newGame'])) {
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheel It</title>
    <link rel="stylesheet" href="css/wheel.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="glassCover"></div>
    <div class="allPlayersMainBox">
    <?php
        $game_id = $_SESSION['newGame'];
        $sql = "SELECT ap.player_name,ap.id,ap.scores FROM available_players ap, wheel w,newgame ng WHERE ap.id=w.player_id AND w.game_id=ng.id AND ng.id='$game_id' AND ap.scores > 0;";
        $results = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($results)) {
            echo '  <input type="radio" class="playerInputField selectedUser" data-score="'.$row['scores'].'" data-uid="'.$row['id'].'" value="'.$row['player_name'].'" name="selectedPlayer" id="player'.$row['id'].'">
                    <label for="player'.$row['id'].'" class="playerLabel"><i class="fas fa-user-astronaut pdspace"></i> '.$row['player_name'].'</label>';
        }
    ?>



    </div>
    <div class="allPlayersMainBox">
        
        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="kattoor" value="kattoor">
        <label for="kattoor" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> kattoor</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="winModel" value="winModel">
        <label for="winModel" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> Win Model</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="critical" value="critical">
        <label for="critical" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> Critical</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="vayaren" value="vayaren">
        <label for="vayaren" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> Vayaren</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="thomthom" value="thomthom">
        <label for="thomthom" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> Thom Thom</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="mendos" value="mendos">
        <label for="mendos" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> Mendos</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="9kumar" value="9kumar">
        <label for="9kumar" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> 9kumar</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="makkan" value="makkan">
        <label for="makkan" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> Makkan</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="robo" value="robo">
        <label for="robo" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> robo</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="renizvazha" value="renizvazha">
        <label for="renizvazha" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> Mendos</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="abinvanna" value="abinvanna">
        <label for="abinvanna" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> abin vannam</label>

        <input type="radio" class="playerInputField userSelectedMode" name="selectedMode" id="thambi" value="thambi">
        <label for="thambi" class="playerLabel"><i class="fas fa-dot-circle pdspace"></i> thambi</label>

    </div>

    <div class="allPlayersMainBox">
        <h1 class="betVal">0</h1>
        <input type="range" min="0" max="0" name="totalValue" value="0" oninput="getUserBetValue(this)" id="totalVal">
        <button class="startWheel" onclick="showWheel()">START WHEEL</button>
    </div>

    <div class="wheelMainBox">
        <div class="marker"></div>
        <div class="wheel">
        </div>
        <button class="start" onclick="spin()">START</button>
        <button class="result" onclick="showResult()">RESULT</button>
    </div>

    <div class="resultBox">
        <h1 class="winnerName"></h1>
        <h1 class="newValue"></h1>
        <h1 class="newScore"></h1>
        <h3 class="designText">POINTS</h3>
        <button class="continueButton" onclick="reload()">CONTINUE <i class="fas fa-angle-double-right lpdspace"></i></button>
    </div>
</body>
<script src="ajax/jquery-3.5.1.min.js"></script>
<script src="javascript/wheel.js"></script>
</html>