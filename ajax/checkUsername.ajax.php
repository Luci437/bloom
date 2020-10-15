<?php

    require "../includes/dh.inc.php";
    
    if(isset($_POST['email'])) {
        $email = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo json_encode(array("result"=> 1));
        }else {
            echo json_encode(array("result"=> 0));
        }
        mysqli_close($conn);
    }

?>