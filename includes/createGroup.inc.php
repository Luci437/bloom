<?php

    require "dh.inc.php";
    session_start();

    if(isset($_SESSION['userid'])) {

        if(isset($_POST['create-group-form'])) {

            $group_name = mysqli_real_escape_string($conn,$_POST['group-name']);
            $group_type = 'Public';
            $user_id = $_SESSION['userid'];
            $group_gen_code = '';

            // to create random group code
            function random_strings($length_of_string) { 
                $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                return substr(str_shuffle($str_result),0, $length_of_string); 
            }
            
            while(1) {
                $group_gen_code = random_strings(5);
                $sql = "SELECT group_gen_id FROM groups WHERE group_gen_id = '$group_gen_code';";
                $result = mysqli_query($conn,$sql);
                if($row = mysqli_fetch_assoc($result)) {
                    continue;
                }else {
                    break;
                }
            }


            $sql = "INSERT INTO groups(user_id, group_name, group_type,group_gen_id) VALUES('$user_id','$group_name','$group_type','$group_gen_code');";
            mysqli_query($conn, $sql);
            $sql = 'SELECT id FROM groups ORDER BY ID DESC LIMIT 1';
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $gid= $row['id'];
            $sql = "INSERT INTO joinedgroup(group_id,user_id) VALUES('$gid','$user_id');";
            mysqli_query($conn, $sql);

            header("Location: ../index.php?success=groupCreated");
            exit();

        }

    }else {
        header("Location: ../login.php");
        exit();
    }
    

?>