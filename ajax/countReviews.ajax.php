<?php

    require '../includes/dh.inc.php';
    session_start();

    if(isset($_POST['val'])) {
        if(isset($_SESSION['userid'])) {
            $uid = $_SESSION['userid'];
            $sql = "SELECT COUNT(id) AS v FROM reviews WHERE user_id='$uid' AND viewed='0';";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $nums = $row['v'];
            echo json_encode(array("reviews"=> $nums));
        }
        mysqli_close($conn);
    }
                
?>