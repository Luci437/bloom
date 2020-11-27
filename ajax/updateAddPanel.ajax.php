<?php
        require "../includes/dh.inc.php";
        session_start();
        $sql = "SELECT * FROM available_players";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="each-player-box">
            <input value="'.$row["player_name"].'" type="text" data-user-id="'.$row["id"].'" onchange="changePlayerName(this);" class="player-name">
            <span style="position: absolute;right: 8px;">
            ';
            $player_id = $row['id'];
            $game_id = $_SESSION['newGame'];
            $sql2 = "SELECT * FROM addedgame WHERE game_id='$game_id' AND player_id='$player_id';";
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