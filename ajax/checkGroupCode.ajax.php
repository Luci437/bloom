<?php

    require "../includes/dh.inc.php";

    if(isset($_POST['code'])) {
        $groupCode = $_POST['code'];

        $sql = "SELECT * from groups where group_gen_id='$groupCode';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            echo json_encode(array("result"=>1));
        }else {
            echo json_encode(array("result"=>0));
        }
    }

?>