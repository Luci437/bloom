<?php
    require "../includes/dh.inc.php";
    session_start();

    if(isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $game_id = $_SESSION['newGame'];

        $sql = "UPDATE available_players SET scores=-1000 WHERE id='$user_id'";
        mysqli_query($conn, $sql);

        $sql = "UPDATE newgame SET nom=0 WHERE id='$game_id'";
        mysqli_query($conn, $sql);

        echo "Made him vazha";
    }
?>