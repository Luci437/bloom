<?php
    require "dh.inc.php";
    session_start();

    $sql = "SELECT player_name,id,scores FROM available_players WHERE scores in (SELECT MIN(scores) FROM available_players)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $gamerName = $row['player_name'];
    $playerId = $row['id'];
    $gameId = $_SESSION['newGame'];
    $score = $row['scores'];

        $sql = "INSERT INTO mvp(player_id,player_score,game_id) VALUES('$playerId','$score','$gameId');";
        mysqli_query($conn, $sql);

        $sql2 = "SELECT id FROM available_players;";
        $results = mysqli_query($conn,$sql2);
        while($row = mysqli_fetch_assoc($results)) {
            $gid = $row['id'];
            $sql3 = "UPDATE available_players SET scores=0 WHERE id='$gid';";
            mysqli_query($conn, $sql3);
        }

        header("Location: ../amongus.php?gamerName=$gamerName");
        exit();

    mysqli_query($conn, "DELETE FROM newgame WHERE id='$gameId';");
    header("Location: ../amongus.php?nogamewin");
    exit();
?>