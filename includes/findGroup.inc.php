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
                                        $uid = $_SESSION['userid'];
                                        $sql = "SELECT * FROM joinedgroup WHERE group_id='$gid' AND user_id='$uid';";
                                        $result = mysqli_query($conn, $sql);
                                        if(!$row = mysqli_fetch_assoc($result)) {
                                                $uid = $_SESSION['userid'];
                                                $sql = "INSERT INTO joinedgroup(group_id,user_id) VALUES('$gid','$uid');";
                                                mysqli_query($conn, $sql);
                                        }
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