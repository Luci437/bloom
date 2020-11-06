<?php
    require "../includes/dh.inc.php";
    session_start();
    $uid = $_SESSION['userid'];

    if(isset($_SESSION['userid'])) {
        if(isset($_POST['id'])) {
            $notid = $_POST['id'];
            $uid = $_SESSION['userid'];
            $sql = "UPDATE notifications SET noti_status=1 WHERE id='$notid';";
            mysqli_query($conn, $sql);

            $sql2 = "SELECT COUNT(id) AS total FROM notifications WHERE user_id='$uid' AND noti_status=0;";
            $result = mysqli_query($conn, $sql2);

            echo $row['total'];
        }
    }
    
?>