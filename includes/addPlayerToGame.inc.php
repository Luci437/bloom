<?php
    require "dh.inc.php";
    session_start();

    if(isset($_SESSION['newGame'])) {
        $gameId = $_SESSION['newGame'];

        if(isset($_POST['color'])) {
            $color = $_POST['color'];
            $playerId = $_POST['playerIdToChange'];
    
            $sql = "UPDATE available_players SET player_color='$color' WHERE id='$playerId';";
            mysqli_query($conn, $sql);
        }

        if(isset($_POST['updateScore'])) {
            $playerId = $_POST['playerIdToChangeScore'];
            $score = $_POST['updateScore'];

            if($score == 1) {
                $checkPlayerInBoard = "SELECT * FROM winner_board WHERE player_id='$playerId';";
                if(mysqli_num_rows(mysqli_query($conn, $checkPlayerInBoard)) > 0) {
                    $resultPlayerBoard = mysqli_fetch_assoc(mysqli_query($conn, $checkPlayerInBoard));
                    $crewWin = $resultPlayerBoard['crew_win'];
                    $crewWin++;

                    $sql2 = "UPDATE winner_board SET crew_win='$crewWin' WHERE player_id='$playerId';";
                    mysqli_query($conn, $sql2);
                }else {
                    $sql2 = "INSERT INTO winner_board(player_id,crew_win) VALUES('$playerId',1);";
                    mysqli_query($conn, $sql2);
                }
            }else if($score > 4) {
                $checkPlayerInBoard = "SELECT * FROM winner_board WHERE player_id='$playerId';";
                if(mysqli_num_rows(mysqli_query($conn, $checkPlayerInBoard)) > 0) {
                    $resultPlayerBoard = mysqli_fetch_assoc(mysqli_query($conn, $checkPlayerInBoard));
                    $imposterWin = $resultPlayerBoard['imposter_win'];
                    $imposterWin++;

                    $sql2 = "UPDATE winner_board SET imposter_win='$imposterWin' WHERE player_id='$playerId';";
                    mysqli_query($conn, $sql2);
                }else {
                    $sql2 = "INSERT INTO winner_board(player_id,imposter_win) VALUES('$playerId',1);";
                    mysqli_query($conn, $sql2);
                }
            }
            if($score != -1) {
                $sqlGetPlayerTotalGame = "SELECT total_games_played FROM winner_board WHERE player_id='$playerId';";
                $totalGame = mysqli_fetch_assoc(mysqli_query($conn,$sqlGetPlayerTotalGame));
                $totalPlayed = $totalGame['total_games_played'];
                $totalPlayed++;

                $sql2 = "UPDATE winner_board SET total_games_played='$totalPlayed' WHERE player_id='$playerId';";
                mysqli_query($conn, $sql2);

            }

            $sqlScoreGet = "SELECT scores FROM available_players WHERE id='$playerId';";
            $resultGetScore = mysqli_query($conn, $sqlScoreGet);
            $rowScoreGet = mysqli_fetch_assoc($resultGetScore);
            $currentScore = $rowScoreGet['scores'];
            $newScore = $score + $currentScore;
            if($newScore >= 0) {
                $sqlScoreSet = "UPDATE available_players SET scores='$newScore' WHERE id='$playerId';";
                mysqli_query($conn, $sqlScoreSet);

            }
        }

        if(isset($_POST['playerId'])) {
            $playerId = $_POST['playerId'];

            $sql = "SELECT * FROM addedgame WHERE game_id='$gameId' AND player_id='$playerId';";
            $results = mysqli_query($conn, $sql);
            if(mysqli_num_rows($results) == 0) {
            $findingTotalMembersSql = "SELECT COUNT(player_id) as totals FROM addedgame WHERE game_id='$gameId';";
            $rowTotalMembers = mysqli_fetch_assoc(mysqli_query($conn, $findingTotalMembersSql));
            $totalMembers = $rowTotalMembers["totals"];

            if($totalMembers <= 9) {
                $sql = "INSERT INTO addedgame(game_id,player_id) VALUES('$gameId','$playerId');";
                mysqli_query($conn, $sql);
    
                $findColorSql = "SELECT color FROM available_color WHERE color not in (SELECT ap.player_color FROM available_players ap, newgame ng,addedgame ag WHERE ap.id = ag.player_id AND ng.id = '$gameId' AND ng.id = ag.game_id)";
                $colorResult = mysqli_fetch_assoc(mysqli_query($conn, $findColorSql));
                $finalColor = $colorResult['color'];
    
                $setColorSql = "UPDATE available_players SET player_color='$finalColor' WHERE id='$playerId';";
                mysqli_query($conn, $setColorSql);
            }
            }else {
                $sql = "DELETE FROM addedgame WHERE game_id='$gameId' AND player_id='$playerId';";
                mysqli_query($conn, $sql);
            }
        }
            $sql = "SELECT ap.player_name,ap.scores,ap.id,ap.player_color FROM available_players ap, addedgame ag WHERE ag.game_id = '$gameId' AND ag.player_id = ap.id ORDER BY ap.scores DESC;";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo '
                <a href="includes/endgame.inc.php" class="endgame-button">END GAME</a>
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
                    <video playsinline loop muted autoplay>
                        <source src="images/noamongus.mp4" type="video/mp4">
                    </video>
                    <h1 class="game-main-title" style="z-index: 20;position: absolute;left: 50%;top: 50%;transform: translateX(-50%);">Among Us</h1>
                    </div>
                    ';
                }
    }
?>