<?php
    require "../includes/dh.inc.php";
    session_start();

    if(isset($_POST['gid'])) {
        $gid = $_POST['gid'];
        $uid = $_SESSION['userid'];

        $sql = "SELECT user.name,user.id FROM users user,myfriends fri WHERE user.id=fri.friend_id AND fri.user_id='$uid';";
        $result = mysqli_query($conn, $sql);
        $val = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)) {
        $uids = $row['id'];
        $sql2 = "SELECT id FROM joinedgroup WHERE group_id='$gid' AND user_id='$uids';";
        $result2 = mysqli_query($conn, $sql2);
        
        if(mysqli_num_rows($result2) > 0) {
            echo '
            <a href="" class="close-add-friends-box2"><i class="fas fa-times" ></i></a>
            <div class="friends-box2" style="background: linear-gradient(#78f446,#45b738);" data-person-name="'.$row['id'].'" onclick="addToGroup(this)">
            <h1 class="friends-short-name">'.$row['name'].'</h1>
            <h4 class="friends-full-name">'.$row['name'].'</h4>
            </div>
            ';
        }else {
            echo '
            <a href="" class="close-add-friends-box2"><i class="fas fa-times" ></i></a>
                <div class="friends-box2" data-person-name="'.$row['id'].'" onclick="addToGroup(this)">
                <h1 class="friends-short-name">'.$row['name'].'</h1>
                <h4 class="friends-full-name">'.$row['name'].'</h4>
                </div>
            ';
        }
        }
        if($val == 0) {echo '<a href="" class="close-add-friends-box2"><i class="fas fa-times" ></i></a>
            <h2 style="color: white;">Friends list is empty</h2>
        ';}
    }

?>