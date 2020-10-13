<?php

    require "dh.inc.php";
    session_start();
    
    if(isset($_SESSION['userid'])) {
        
        if(isset($_POST['review-submit'])) {
            
            $review = $_POST['review'];
            $user_id = $_POST['userid'];
            $group_id = $_POST['groupid'];


            $sql = "INSERT INTO reviews(group_id, user_id, review) VALUES('$group_id','$user_id','$review');";
            mysqli_query($conn, $sql);

            header("Location: ../showGroup.php?groupId=$group_id&success=reviewPosted");
            exit();

        }else {
           echo "elsed"; 
        }

    }else {
        header("Location: ../login.php");
        exit();
    }

?>