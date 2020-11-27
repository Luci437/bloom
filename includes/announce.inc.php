<?php
    require "dh.inc.php";
    session_start();

    if(isset($_POST['announce-submit'])) {
        $gid = $_POST['gid'];
        $announce = $_POST['broad-message'];
        $ann_date = date("Y/m/d");

        $sql = "INSERT INTO broadcast(group_id,broadcast_message,message_date) VALUES('$gid','$announce','$ann_date');";
        mysqli_query($conn, $sql);

        $sql = "SELECT MAX(id) as id FROM broadcast;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $broad_id = $row['id'];
        echo $broad_id;

        $sql = "SELECT user_id FROM joinedgroup WHERE group_id='$gid';";
        $result = mysqli_query($conn, $sql);
        while($row2=mysqli_fetch_assoc($result)) {
            $uid = $row2['user_id'];
            $sql2 = "INSERT INTO broadcast_seen_users(user_id,broad_id,broad_status) VALUES('$uid','$broad_id',0);";
            mysqli_query($conn, $sql2);
        }

        header("Location: ../showGroup.php?groupId=$gid");
        exit();
    }
?>