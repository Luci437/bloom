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

                $sql3 = "SELECT groups.group_name FROM groups WHERE groups.id='$groupid';";
                $result = mysqli_query($conn, $sql3);
                
                if($row = mysqli_fetch_assoc($result)) {
                    $group_name = $row['group_name'];
                    $noti_text = "You were kicked from ".$group_name;
                    $sql2 = "INSERT INTO notifications(user_id,notification,noti_status) VALUES('$userid','$noti_text',0);";
                    mysqli_query($conn, $sql2);
                }
                header("Location: ../showGroup.php?groupId=$groupid&success=kicked");
                exit();
            }else {
                header("Location: ../showGroup.php?groupId=$groupid&error=notAdmin");
                exit();
            }
        }
    }

?>