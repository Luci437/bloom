<?php
    include "mainTop.php";
?>
<style>
.active-menus-groups {
    background: #241663;
    color: white;
}
</style>
<div class="show-group-main-container">
    <!-- <h2 class="main-title-groups">Joined Group</h2> -->
        <!-- ** -->
        <?php

            require "includes/dh.inc.php";
            
            $uid = $_SESSION['userid'];
            $sql = "SELECT * FROM groups WHERE id IN(SELECT group_id FROM joinedgroup WHERE user_id='$uid') ORDER BY id DESC;";
            $result = mysqli_query($conn, $sql);
            $total_group = mysqli_num_rows($result);
            if($total_group == 0) {
                echo '
                    <div class="no-group-box">
                    <div class="video-text-box">
                    <h1 class="video-text" style="color: rgba(255,255,255,0.6);"><i class="fab fa-cloudversify pdspace"></i>Void </h1>
                    <h2 style="color: rgba(255, 255, 255, 0.5);">You haven\'t join any group bro, try create or join a group.</h2>
                </div>
                        <video autoplay loop playsinline src="images/terraforge-video.mp4" class="no-group-video"></video>
                    </div>
                ';
            }else {
                echo '
                <h2 class="main-title-groups">Joined Group</h2>
                <h4 class="main-title-groups" style="font-weight: lighter;padding: 10px 0 16px 0;">You can see all your groups here, making ease access to it.</h4>
                <div class="my-each-group">
                ';
            while($row = mysqli_fetch_assoc($result)) {
                $gid = $row['id'];
                $sqls = "SELECT * FROM joinedgroup WHERE group_id='$gid';";
                $totalmembers = mysqli_num_rows(mysqli_query($conn, $sqls));
                $door_type = "";
                if($row['group_type'] == 'Public') {
                    $door_type = "-open";
                }
                echo '
                    <a href="showGroup.php?groupId='.$row['id'].'"><div class="each-group-box">
                        <div class="each-gp-video-box">
                            <video class="each-gp-video" autoplay src="images/Snow Scene.mp4" playsinline loop ></video>
                        </div>
                        <div class="group-each-black-cover"></div>
                        <div class="each-gp-details-box">
                            <h3 class="group-each-name">'.$row['group_name'].'</h3>
                            <h4 class="group-each-username"><i class="fas fa-lock'.$door_type.'" style="padding-right: 5px;"></i> '.$row['group_type'].'</h4>
                        </div>
                        <h5 class="total-members-in-each-group"><i class="fas fa-eye"></i> '.$totalmembers.'</h5>
                    </div></a>
                ';
            }
        }



        ?>
        <!-- ** -->
    </div>
</div>

<script type="text/javascript">

    let video_names = ['360-dribbble','dribbble_1','floppydrib','morphy','Pirelli Spin','Snow Scene','tie_dye_particles','ai motion','ai Motion2'];
    let total_videos = video_names.length;
    let el = document.getElementsByClassName('each-gp-video');
    let video_arr = [];
    let rnd;
    for(let i=0;i<el.length;i++) {
        while(true) {
            rnd = Math.floor(Math.random() * total_videos);
            if(video_arr.includes(rnd)) {
                continue;
            }else {
                video_arr.push(rnd);
                break;
            }
        }
        el[i].src = "images/"+ video_names[rnd]+".mp4";
        if(video_arr.length == total_videos) {
            video_arr = [];
        }
    }


</script>

<?php
    include "mainBottom.php";
?>