<?php

    require "dh.inc.php";
    session_start();
    
    if(isset($_SESSION['userid'])) {
        
        if(isset($_POST['review-submit'])) {
            
            $review = mysqli_real_escape_string($conn,$_POST['review']);
            $user_id = $_POST['userid'];
            $group_id = $_POST['groupid'];


            $sql = "INSERT INTO reviews(group_id, user_id, review, viewed) VALUES('$group_id','$user_id','$review',false);";
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