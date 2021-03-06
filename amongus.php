<?php
    include "maintop.php";
?>
<div id="snow-box"></div>
<div class="among-us-container">
    <style>
        .shrink-in-amongus {
            width: 0%;
        }
        .expand-in-amongus {
            width: 95%;
            margin: 0 auto;
        }
    </style>
    <?php
    if(!isset($_SESSION['newGame'])) {
        echo '
        <div class="new-game-box">
            <h1 class="game-main-title">Among Us</h1>
            <a href="includes/startNewGame.inc.php" class="new-game-button"> <i class="fas fa-play pdspace"></i> Start Game</a>
        </div>   
        '; 
    }
    ?>
    <div class="game-main-container" id="addedPlayer">
        <img src="images/snow1.png" class="snows snow1">
        <img src="images/snow3.png" class="snows snow3">
        <a href="turnWheel.php" class="try-button2"> TURN WHEEL</a>
        <div class="side-button-box">
            <div onclick="showScore()" class="side-show-button"></div>
        </div>
        <?php
            if(isset($_SESSION['newGame'])) {
                $gameId = $_SESSION['newGame'];
                $sql = "SELECT ap.player_name,ap.scores,ap.id,ap.player_color FROM available_players ap, addedgame ag WHERE ag.game_id = '$gameId' and ag.player_id = ap.id;";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <a href="includes/endgame.inc.php" class="endgame-button"><img src="images/snow4.png" class="snows snow4"> END GAME</a>
                    ';
                    $nomSql = "SELECT nom FROM newgame WHERE id='$gameId';";
                    $nomResult = mysqli_fetch_assoc(mysqli_query($conn, $nomSql));
                    $totalNom = $nomResult['nom'];
                    if($totalNom > 0) {
                        echo '<a href="lucky.php" class="try-button"> FIND MVP</a>';
                    }
                    echo '
                    <div class="reveal-scores" onclick="showScore()"></div>
                    <div class="pb1">
                    <div class="pb11">
                        <img src="images/'.$row['player_color'].'.png" class="selected-player-image" alt="">
                    </div>
                    <div class="pb12">
                        <p class="player-score">'.$row['scores'].'</p>
                    </div>
                    <p class="selected-player-name">'.$row['player_name'].'</p>
                    <div class="all-settings-box">
                        <div class="color-box">
                        ';
                            $playerId = $row['id'];
                            $sqlColor = "SELECT color FROM available_color WHERE COLOR NOT IN (SELECT ap.player_color FROM addedgame ag, available_players ap WHERE ag.player_id = ap.id AND ag.game_id ='$gameId')";
                            $colorResult = mysqli_query($conn, $sqlColor);
                            $totalColor = 0;
                            while($colorRow = mysqli_fetch_assoc($colorResult)) {
                                echo '<div class="color-cir '.$colorRow['color'].'Color" data-color="'.$colorRow['color'].'" data-player-id="'.$playerId.'" onclick="changeColor(this);"></div>';
                                if($totalColor == 8) {
                                    break;
                                }
                                $totalColor++;
                            }
                        echo '
                        </div>
                        <div class="score-set-box">
                            <button class="set-score-button" onclick="setScore(this);" data-score="1" data-player-id="'.$playerId.'">1</button>
                            <button class="set-score-button" onclick="setScore(this);" data-score="5" data-player-id="'.$playerId.'">5</button>
                            <button class="set-score-button" onclick="setScore(this);" data-score="10" data-player-id="'.$playerId.'">10</button>
                            <button class="set-score-button" onclick="setScore(this);" data-score="-1" data-player-id="'.$playerId.'"><i class="fas fa-minus-circle"></i></button>
                        </div>
                    </div>
                    </div>
                    ';
                }
                if(mysqli_num_rows($result) == 0) {
                    echo '
                    <div class="empty-player">
                    <video playsinline muted loop autoplay>
                        <source src="images/noamongus.mp4" type="video/mp4">
                    </video>
                    <h1 class="game-main-title" style="z-index: 20;position: absolute;left: 50%;top: 50%;transform: translateX(-50%);">Among Us</h1>
                    </div>
                    ';
                }
            }
        ?>
    </div>
    <div class="all-player-box" id="all-player-panel">
        <?php
        require "includes/dh.inc.php";
        $sql = "SELECT * FROM available_players;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="each-player-box">
            <input value="'.$row["player_name"].'" type="text" data-user-id="'.$row["id"].'" onchange="changePlayerName(this);" class="player-name">
            <span style="position: absolute;right: 8px;">
            ';
            $player_id = $row['id'];
            $game_id = $_SESSION['newGame'];
            $sql2 = "SELECT * FROM addedgame WHERE game_id='$gameId' AND player_id='$player_id';";
            $results = mysqli_query($conn, $sql2);
            if(mysqli_num_rows($results) > 0) {
                echo '<a href="#" data-player-id='.$row["id"].' onclick="addPlayer(this);" title="Imposter" class="player-button"><i class="fas fa-minus" style="padding-right: 4px;"></i>KICK</a>';
            }else {
                echo '<a href="#" data-player-id='.$row["id"].' onclick="addPlayer(this);" title="Imposter" class="player-button"><i class="fas fa-plus" style="padding-right: 4px;"></i>ADD</a>';
            }
                
            echo '
            </span>
        </div>';
        }
        ?>
    </div>
<?php
    if(isset($_GET['gamerName'])) {
        $gamerName = $_GET['gamerName'];
        $winnerName = $_GET['winner'];
        $wid = $_GET['id'];
        echo '
        <div class="endgame-screen" id="winnerScreenshot">
            <div class="mvp-box">
            <h1 class="game-winner-name">'.$winnerName.'</h1>
            </div>
            <div class="winner-box">
            <input type="hidden" id="mvpid" value="'.$wid.'">
            <a href="includes/closeGame.inc.php" style="color: #fff;position: absolute;top: 12px;right: 12px;font-size: 24px;"><i class="fas fa-times"></i></a>
            <h1 class="game-winner-name vazhaplayer">'.$gamerName.'</h1>
            </div>
            <div class="split-bar">
            
            </div>
            <button class="screenshot-button" onclick="takeScreenshot();"><i class="fas fa-camera pdspace"></i> SCREENSHOT</button>
            <div id="output"></div>
        </div>
        ';
    }
    if(isset($_GET['nogamewin'])) {
        echo '
        <div class="endgame-screen" style="background-image: none;">
            <video src="images/nogamewin.mp4" muted autoplay playsinline loop style="width: 100%;transform: translateY(-32%);"></video>
            <a href="includes/closeGame.inc.php" style="color: #fff;position: absolute;top: 12px;right: 12px;font-size: 24px;"><i class="fas fa-times"></i></a>
        </div>
        ';
    }
?>
</div>
<script type="text/javascript" src="jquery-barcode.js"></script>
<script>
    let d = new Date();
    $('#barcode-box').html(d.getDay()+'.'+d.getMonth()+'.'+d.getYear()+'.'+d.getMinutes()+'.'+d.getHours());
    let mid = $("#mvpid").val();
    console.log(mid);
    if(mid == 4) {
        $(".winner-box").css({"background":"url('images/thambi.png')","background-size":"cover"});
    }else if(mid == 3) {
        $(".winner-box").css({"background":"url('images/9kumar.png')","background-size":"cover"});
    }else if(mid == 6) {
        $(".winner-box").css({"background":"url('images/stony.png')","background-size":"cover"});
    }else if(mid == 9) {
        $(".winner-box").css({"background":"url('images/killer.png')","background-size":"cover"});
    }else if(mid == 8) {
        $(".winner-box").css({"background":"url('images/renizvazha.png')","background-size":"cover"});
    }else if(mid == 5) {
        $(".winner-box").css({"background":"url('images/alex1.png')","background-size":"cover"});
    }else if(mid == 2) {
        $(".winner-box").css({"background":"url('images/don.jpg')","background-size":"cover"});
    }

</script>
<script src= "https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"> </script>
<script>

function takeScreenshot() {
    let div = document.getElementById('winnerScreenshot'); 
    html2canvas(div).then( 
                function (canvas) { 
                    document 
                    .getElementById('output') 
                    .appendChild(canvas); 
                }) 
}

function changePlayerName(et) {
    let username = $(et).val();
    let userid = $(et).attr('data-user-id');
    $.ajax({
        url: "ajax/changePlayerName.ajax.php",
        type: 'POST',
        data: {
            username: username,
            userid: userid
        }
    });
}


function addPlayer(et) {
    let playerId = $(et).attr("data-player-id");
    $.ajax({
        url : "includes/addPlayerToGame.inc.php",
        type: "POST",
        data: {
            playerId: playerId
        },
        success: function(dataResult) {
            $('#addedPlayer').children().remove();
            $('#addedPlayer').html(dataResult);
            updatePanel();
        }
    });
}

function changeColor(el) {
    let color = $(el).attr("data-color");
    let playerId = $(el).attr("data-player-id");

    $.ajax({
        url: 'includes/addPlayerToGame.inc.php',
        type: 'POST',
        data: {
            color: color,
            playerIdToChange : playerId
        },
        success: function(dataResult) {
            $('#addedPlayer').children().remove();
            $('#addedPlayer').html(dataResult);
            updatePanel();
        }
    });
}

function setScore(el) {
    let score = $(el).attr("data-score");
    let playerId = $(el).attr("data-player-id");
    $.ajax({
        url: 'includes/addPlayerToGame.inc.php',
        type: 'POST',
        data: {
            updateScore: score,
            playerIdToChangeScore: playerId
        },
        success: function(dataResult) {
            $('#addedPlayer').children().remove();
            $('#addedPlayer').html(dataResult);
            updatePanel();
        }
    });

    $(".player-score").css("color","rgba(255, 255, 255, 1)");
    /* setTimeout(() => {
         $(".player-score").css("color","rgba(255, 255, 255, 0.055)");
     }, 5000);*/
}

function updatePanel() {
    $.ajax({
        url: 'ajax/updateAddPanel.ajax.php',
        success: function(dataResult) {
            $('#all-player-panel').children().remove();
            $('#all-player-panel').html(dataResult);
        }
    });
}

let bulb = 2;
function showScore() {


    let mainBoxs = document.getElementsByClassName("pb1");
    let playerScores = document.getElementsByClassName("player-score");

    if(bulb % 2 == 0) {
        $('.player-score').css("color","white");
        for(let i=0;i<playerScores.length;i++) {
            mainBoxs[i].style.transform = "Scale(1.1)";
        }
        $('.side-show-button').css({"top":"calc(100% - 24px)","transform":"rotate(90deg)","filter":"grayscale(0)"});
    }else {
        $('.player-score').css("color","rgba(255,255,255,0.05)");
        for(let i=0;i<playerScores.length;i++) {
            mainBoxs[i].style.transform = "Scale(1)";
        }
        $('.side-show-button').css({"top":"0","transform":"rotate(0deg)","filter":"grayscale(10)"});
    }
    bulb++;


    
}

</script>

<?php
    include "mainBottom.php";
?>