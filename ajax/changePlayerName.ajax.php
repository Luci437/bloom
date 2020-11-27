<?php
    require "../includes/dh.inc.php";
    
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $userid = $_POST['userid'];

        $sql = "UPDATE available_players SET player_name='$username' WHERE id='$userid';"; 
        mysqli_query($conn, $sql);
    }
?>