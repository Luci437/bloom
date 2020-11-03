<?php
    require "../includes/dh.inc.php";

    if(isset($_POST['groupId'])) {
        $group_id = $_POST['groupId'];

        $sql =  "SELECT COUNT(id) as total FROM joinedgroup WHERE group_id='$group_id';";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        echo $row['total'];
        exit();
    }
?>