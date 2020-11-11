<?php
    require "../includes/dh.inc.php";
    if(isset($_POST['gid'])) {
        $gid = $_POST['gid'];

        $pp = "SELECT group_name FROM groups WHERE id='$gid';";
        $ppg = mysqli_query($conn, $pp);
        $row = mysqli_fetch_assoc($ppg);
        $gpname = $row['group_name'];

        $qry = "SELECT user_id FROM joinedgroup WHERE group_id='$gid';";
        $ans = mysqli_query($conn, $qry);
        while($row = mysqli_fetch_assoc($ans)) {
            $txt = $gpname." was deleted.";
            $uid = $row['user_id'];
            $q1 = "INSERT INTO notifications(user_id,notification) VALUES('$uid','$txt');";
            mysqli_query($conn, $q1);
        }

        $sql = "DELETE FROM groups WHERE id='$gid';";
        if(mysqli_query($conn, $sql)) {
            echo "success";
        }else {
            echo "failed";
        }
    }
?>