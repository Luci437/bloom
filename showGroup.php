<?php
    include 'mainTop.php';
?>

<div class="group-detail-container">
    <div class="group-member-box">
        
    <!-- ** -->
    <?php
        if(isset($_GET['groupId'])) {
            $gid = $_GET['groupId'];
            $uid= $_SESSION['userid'];
            $sql = "SELECT u.name,u.id,u.email, g.group_id FROM users u,joinedgroup g WHERE g.group_id='$gid' AND g.user_id=u.id;";
            $result = mysqli_query($conn, $sql);
            $total_members = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)) {
                if($row['id'] != $uid) {
                    echo '
                    <div class="review-box">
                    <div class="review-top">
                        <h4 class="group-username">@ '.$row['name'].'</h4>
                        <h5 class="group-user-about">'.$row['email'].'</h5>
                    </div>
                    <form action="includes/sendReview.inc.php" method="POST" class="review-bottom">
                    <i class="fas fa-comment-alt review-icon"></i>
                        <input type="text" placeholder="Say something about me" class="review-input" require name="review">
                        <input type="hidden" name="userid" value="'.$row['id'].'">
                        <input type="hidden" name="groupid" value="'.$row['group_id'].'">
                        <button type="submit" name="review-submit" class="review-button"><i class="fas fa-paper-plane pdspace"></i> send</button>
                    </form>
                    </div>
                    ';
                }
            }
            if($total_members == 1) {
                echo '<div class="empty-group"></div>';
            }
        }

    ?>
    <!-- *** -->

    </div>
    <div class="group-details-box">
        <div>
            <img src="images/group-image.webp" alt="group-img">
            <div class="image-black-cover"></div>
        </div>
        

        <?php

            require "includes/dh.inc.php";

            if(isset($_GET['groupId'])) {
                $groupid = $_GET['groupId'];
                $sql = "SELECT * FROM groups WHERE id='$groupid';";
                $result = mysqli_query($conn, $sql);

                if($row = mysqli_fetch_assoc($result)) {
                    $uid = $row['user_id'];
                    $sql = "SELECT name FROM users where id='$uid';";
                    echo '
                        <h4 class="group-code">#'.$row['group_gen_id'].'</h4>
                        <div class="group-detail-sub">
                        <h3 class="group-name">'.$row['group_name'].'</h3>
                    ';
                    if($row = mysqli_fetch_assoc(mysqli_query($conn, $sql))) {
                        echo '
                            <h4 class="group-hostname">@ <span>'.$row['name'].'</span></h4>
                            </div>       
                        ';
                    }
                }
            }
        ?>
        <div style="display: grid;grid-template-columns: repeat(2,1fr);margin-top: 16px;">
            <h4 class="member-sub-text">TOTAL_MEMBERS</h4>
            <h4 class="member-sub-text">TOTAL_REVIEWS</h4>
            <?php   

                require 'includes/dh.inc.php';

                if(isset($_GET['groupId'])) {
                    $gid = $_GET['groupId'];
                    $uid= $_SESSION['userid'];
                    $sql = "SELECT u.name,u.id,u.email FROM users u,joinedgroup g WHERE g.group_id='$gid' AND g.user_id=u.id;";
                    $result = mysqli_query($conn, $sql);
                    $total_members = mysqli_num_rows($result);

                    echo '
                        <h2 class="total-members">'.$total_members.'</h2>
                    ';

                    $sql = "SELECT * FROM reviews WHERE group_id='$gid';";
                    $result = mysqli_query($conn, $sql);
                    $totalReviews = mysqli_num_rows($result);

                    echo '
                        <h2 class="total-members">'. $totalReviews .'</h2>      
                    ';
                }
            ?>
        </div>

    </div>

        <script type="text/javascript">
        randomColors();
        function randomColors() {
            let darkValues = ['#7B241C','#5B2C6F','#1A5276','#21618C','#117864','#0E6655','#1D8348','#9A7D0A','#9C640C','#935116','#873600','#515A5A','#212F3C','#1C2833'];
            let lightValues = ['#A93226','#7D3C98','#2471A3','#2E86C1','#17A589','#138D75','#28B463','#D4AC0D','#D68910','#CA6F1E','#BA4A00','#707B7C','#2E4053','#273746'];
            let totalColor = darkValues.length;
            let choosedColor = [];
            let el = document.getElementsByClassName('group-username');
            let randNumber;

            for(let i=0; i<el.length; i++) {
                while(true) {
                     randNumber = Math.floor(Math.random()*totalColor);
                    if(choosedColor.includes(randNumber)) {
                        continue;
                    }else {
                        choosedColor.push(randNumber);
                        el[i].style.background = "linear-gradient("+ lightValues[randNumber] +","+ darkValues[randNumber] +")";
                        break;
                    }
                }
            }
        }
        </script>

</div>

<?php
    include 'mainBottom.php';
?>