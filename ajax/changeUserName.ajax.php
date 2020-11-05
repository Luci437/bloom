<?php
    require "../includes/dh.inc.php";

    if(isset($_POST['uid'])) {
        $uid = $_POST['uid'];
        $name = $_POST['name'];

        $sql = "UPDATE users SET name='$name' WHERE id='$uid'";
        if(mysqli_query($conn, $sql)) {
            echo "Name Updated";
        }else {
            echo "Something went wrong";
        }
    }
?>