<?php
    require "dh.inc.php";
    session_start();
    $gameId = $_SESSION['newGame'];
    $sql = "SELECT available_players.player_name,available_players.id,available_players.scores FROM available_players,addedgame WHERE addedgame.player_id=available_players.id AND addedgame.game_id = '$gameId' AND available_players.scores in (SELECT MIN(ap.scores) FROM available_players ap, addedgame ng WHERE ng.player_id=ap.id AND ng.game_id = '$gameId')";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $gamerName = $row['player_name'];
    $playerId = $row['id'];
    $score = $row['scores'];

    $winnerSql = "SELECT available_players.player_name,available_players.id,available_players.scores FROM available_players,addedgame WHERE addedgame.player_id=available_players.id AND addedgame.game_id = '$gameId' AND available_players.scores in (SELECT MAX(ap.scores) FROM available_players ap, addedgame ng WHERE ng.player_id=ap.id AND ng.game_id = '$gameId')";
    $winnerResult = mysqli_query($conn, $winnerSql);
    $winnerRow = mysqli_fetch_assoc($winnerResult);
    $winner = $winnerRow['player_name'];

        $sql = "INSERT INTO mvp(player_id,player_score,game_id) VALUES('$playerId','$score','$gameId');";
        mysqli_query($conn, $sql);

        $sql2 = "SELECT id FROM available_players;";
        $results = mysqli_query($conn,$sql2);
        while($row = mysqli_fetch_assoc($results)) {
            $gid = $row['id'];
            $sql3 = "UPDATE available_players SET scores=0 WHERE id='$gid';";
            mysqli_query($conn, $sql3);
        }

        header("Location: ../amongus.php?gamerName=$gamerName&winner=$winner&id=$playerId");
        exit();

    mysqli_query($conn, "DELETE FROM newgame WHERE id='$gameId';");
    header("Location: ../amongus.php?nogamewin");
    exit();
?>