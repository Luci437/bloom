<?php
    require "../includes/dh.inc.php";
    session_start();

    if(isset($_SESSION['userid'])) {
        if(isset($_GET['userId'])) {
            $userid = $_GET['userId'];
            $groupid = $_GET['groupId'];
            $uid = $_SESSION['userid'];

            $sql = "SELECT * FROM joinedgroup WHERE user_id='$userid' AND group_id IN (SELECT id FROM groups WHERE id='$groupid' AND user_id='$uid');";

            if(mysqli_num_rows(mysqli_query($conn, $sql))>0) {
                $sql = "DELETE FROM joinedgroup WHERE user_id='$userid' AND group_id IN (SELECT id FROM groups WHERE id='$groupid' AND user_id='$uid');";
                mysqli_query($conn, $sql);
                header("Location: ../showGroup.php?groupId=$groupid&success=kicked");
                exit();
            }else {
                header("Location: ../showGroup.php?groupId=$groupid&error=notAdmin");
                exit();
            }
        }
    }

?>