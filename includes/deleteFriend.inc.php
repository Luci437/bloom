<?php
    require "dh.inc.php";
    session_start();
    
    if(isset($_GET['id'])) {
        $uid = $_SESSION['userid'];
        $fid = $_GET['id'];
        $sql = "DELETE FROM myfriends WHERE user_id='$uid' AND friend_id='$fid';";
        mysqli_query($conn, $sql);

        header("Location: ../account.php");
        exit();
    }
?>