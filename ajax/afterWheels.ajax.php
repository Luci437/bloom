<?php
    require('../includes/dh.inc.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $score = $_POST['score'];

        $sql = "UPDATE available_players SET scores='$score' WHERE id='$id';";
        mysqli_query($conn,$sql);

        echo 'score changed';
    }
?>