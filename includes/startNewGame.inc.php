<?php
    require 'dh.inc.php';
    session_start();
    if(!isset($_SESSION['newGame'])) {
        $gameDay = date('d');
        $gameMonth = date('m');
        $gameYear = date('Y');
        $uid = $_SESSION['userid'];

        $sql = "INSERT INTO newgame(player_id,game_date_year,game_date_month,game_date_day) VALUES('$uid','$gameYear','$gameMonth','$gameDay');";
        mysqli_query($conn, $sql);
        $sql1 = "SELECT MAX(id) as gameId FROM newgame";
        $result = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($result);
        $gameId = $row['gameId'];
        $_SESSION['newGame'] = $gameId;

        $sql2 = "SELECT * FROM available_players;";
        $result2 = mysqli_query($conn, $sql2);
        while($rows = mysqli_fetch_assoc($result2)) {
            $uid2 = $rows['id'];
            $sql3 = "UPDATE available_players SET scores=0 WHERE id='$uid2';";
            mysqli_query($conn, $sql3);
            echo "inside while loop";
        }

        header("Location: ../amongus.php");
        exit();
        
    }
?>