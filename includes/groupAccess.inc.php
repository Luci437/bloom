<?php
    require "dh.inc.php";
    session_start();

    if(isset($_SESSION['userid'])) {
        if(isset($_GET['groupId'])){
            $gid = $_GET['groupId'];
            $uid = $_SESSION['userid'];

            $sql = "SELECT * FROM groups WHERE id='$gid';";
            $result = mysqli_query($conn, $sql);
            if($row = mysqli_fetch_assoc($result)){
                echo $row['group_type'];
                
                if($row['group_type'] == 'Public') {
                    $sql = "UPDATE groups SET group_type='Private' WHERE id='$gid';";
                    mysqli_query($conn, $sql);
                }else {
                    $sql = "UPDATE groups SET group_type='Public' WHERE id='$gid';";
                    mysqli_query($conn, $sql);
                }
            }
            header("Location: ../showGroup.php?groupId=$gid&success=PermissionChanged");
            exit();
        }
    }else {
        header("Location: ../login.php");
        exit();
    }
?>