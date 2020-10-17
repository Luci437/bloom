<?php

    require "dh.inc.php";
    session_start();

    if(isset($_SESSION['userid'])) {

        if(isset($_GET['groupId'])) {
            $gid = $_GET['groupId'];
            $uid = $_SESSION['userid'];

            $sql = "DELETE FROM joinedGroup WHERE group_id='$gid' AND user_id='$uid';";
            mysqli_query($conn, $sql);

            header("Location: ../myGroup.php?success=exitedGroup");
            exit();

        }

    }else {
        header("Location: ../login.php");
        exit();
    }

?>