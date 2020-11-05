<?php

    require "dh.inc.php";
    session_start();

    if(isset($_SESSION['userid'])) {
        if(isset($_GET['id'])) {
            $friend_id = $_GET['id'];
            $uid = $_SESSION['userid'];
            $gid = $_GET['gid'];

            $sql = "INSERT INTO myfriends(user_id,friend_id) VALUES('$uid','$friend_id');";
            mysqli_query($conn, $sql);

            header("Location: ../showGroup.php?groupId=$gid");
            exit();
        }
    }else {
        header("Location: ../login.php");
        exit();
    }
?>