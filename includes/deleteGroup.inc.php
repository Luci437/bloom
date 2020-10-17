<?php

    require 'dh.inc.php';
    session_start();

    if(isset($_SESSION['userid'])) {
        if(isset($_GET['groupId'])) {
            $gid = $_GET['groupId'];

            $sql = "DELETE FROM groups WHERE id='$gid';";
            mysqli_query($conn, $sql);

            header("Location: ../myGroup.php?success=groupSmashed");
            exit();

        }
    }else {
        header("Location: ../login.php");
        exit();
    }

?>