<?php
    require "dh.inc.php";
    session_start();

    if(isset($_GET['reviewId'])) {
        $reviewId = $_GET['reviewId'];

        $sql = "DELETE FROM reviews WHERE id='$reviewId'";
        mysqli_query($conn, $sql);

        header("Location: ../showMyReviews.php");
        exit();
    }else {
        header("Location: ../showMyReviews.php");
        exit();
    }

?>