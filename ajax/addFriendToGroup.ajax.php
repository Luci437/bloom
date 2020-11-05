<?php
    require "../includes/dh.inc.php";
    session_start();

    if(isset($_POST['userid'])) {
        $uid = $_POST['userid'];
        $gid = $_POST['gid'];

        $sqlTest = "SELECT * FROM joinedgroup WHERE user_id='$uid' AND group_id='$gid';";
        if(mysqli_num_rows(mysqli_query($conn, $sqlTest)) > 0) {
            $sql = "DELETE FROM joinedgroup WHERE user_id='$uid' AND group_id='$gid';";
            mysqli_query($conn, $sql);
            echo "Removed".$uid.$gid;
            exit();
        }else {
            $sql = "INSERT INTO joinedgroup(user_id,group_id) VALUES('$uid','$gid');";
            mysqli_query($conn, $sql);
            echo "Added";
            exit();
        }
    }
?>