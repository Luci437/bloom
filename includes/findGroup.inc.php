<?php
        require 'dh.inc.php';
        session_start();

        if(isset($_SESSION['userid'])) {

                if(isset($_POST['find-group-form'])) {
                        $group_code = $_POST['group-code'];

                        $sql = "SELECT * FROM groups WHERE group_gen_id = '$group_code';";
                        $result = mysqli_query($conn, $sql);
                        if($row = mysqli_fetch_assoc($result)) {

                                if($row['group_type'] == 'Private') {
                                        header("Location: ../index.php?error=privateGroup");
                                        exit();
                                }else {
                                        $gid = $row['id'];
                                        header("Location: ../showGroup.php?groupId=$gid");
                                        exit();
                                }

                        }else {
                                header("Location: ../index.php?error=group404");
                                exit();
                        }

                }

        }else {
                header("Location: ../login.php");
                exit();
        }
?>