<?php
    include 'mainTop.php';
    if(isset($_GET['groupId'])) {

        require 'includes/dh.inc.php';
        

        $gid = $_GET['groupId'];
        $uid = $_SESSION['userid'];

        $sql = "SELECT * FROM joinedgroup WHERE group_id='$gid' AND user_id='$uid';";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if($rows == 0) {
            header("Location: myGroup.php");
            exit();
        }

    }
?>

<div class="group-detail-container">
    <div class="group-member-box" id="group-members-box">
        
    <!-- ** -->
    <?php
        if(isset($_GET['groupId'])) {
            $gid = $_GET['groupId'];
            $uid= $_SESSION['userid'];
            $sql = "SELECT u.name,u.id,u.email, g.group_id FROM users u,joinedgroup g WHERE g.group_id='$gid' AND g.user_id=u.id ORDER BY u.name;";
            $result = mysqli_query($conn, $sql);
            $total_members = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)) {
                if($row['id'] != $uid) {
                    echo '
                    <div class="review-box">
                        <a href="includes/kick.inc.php?userId='.$row['id'].'&groupId='.$row['group_id'].'"><i class="fas fa-times close-button"></i></a>
                    <div class="review-top">
                        <h4 class="group-username">@ '.$row['name'].'</h4>
                        <h5 class="group-user-about">'.$row['email'].'</h5>
                    </div>
                    <form method="POST" action="includes/sendReview.inc.php" class="review-bottom">
                    <i class="fas fa-comment-alt review-icon"></i>
                        <input type="text" placeholder="Say something about me" class="review-input" id="review" require name="review">
                        <input type="hidden" id="userid" name="userid" value="'.$row['id'].'">
                        <input type="hidden" id="groupid" name="groupid" value="'.$row['group_id'].'">
                        <button type="submit" name="review-submit" class="review-button"><i class="fas fa-paper-plane pdspace"></i> send</button>
                    </form>
                    </div>
                    ';
                }
            }
            if($total_members <= 1) {
                echo '<div class="empty-group">
                    <a href="includes/deleteGroup.inc.php?groupId='.$gid.'" class="group-close-button"><i class="fas fa-eraser pdspace"></i> DELETE GROUP</a>
                </div>';
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
                        <div class="group-code-box">#
                        <input type="text" readonly value="'.$row['group_gen_id'].'" class="group-code">
                        </div>
                        
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
        <div style="display: grid;grid-template-columns: repeat(2,1fr);margin-top: 16px;row-gap: 8px;column-gap: 8px;">
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
            <?php
                require 'includes/dh.inc.php';
                $uid = $_SESSION['userid'];
                $groupid = $_GET['groupId'];
                $sql = "SELECT * FROM groups WHERE user_id='$uid' AND id='$groupid';";
                $result = mysqli_query($conn, $sql);
                if($row = mysqli_fetch_assoc($result)) {
                    if($row['group_type'] == 'Public') {
                        echo '<a href="includes/groupAccess.inc.php?groupId='.$groupid.'" class="group-close-button"><i class="fas fa-lock pdspace"></i> CLOSE GROUP</a>';
                    }else {
                        echo '<a href="includes/groupAccess.inc.php?groupId='.$groupid.'" class="group-close-button open-button"><i class="fas fa-lock-open pdspace"></i> OPEN GROUP</a>';
                    }
                }else {
                    echo '<a href="includes/leaveGroup.inc.php?groupId='.$groupid.'" class="group-close-button"><i class="fas fa-sign-out-alt pdspace"></i> LEAVE GROUP</a>';
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
            let el = document.getElementsByClassName('group-username');
            let randNumber;

            for(let i=0; i<el.length; i++) {
                randNumber = Math.floor(Math.random()*totalColor);
                el[i].style.background = "linear-gradient("+ lightValues[randNumber] +","+ darkValues[randNumber] +")";
            }
        }



            var copyTextareaBtn = document.querySelector('.group-code');

            copyTextareaBtn.addEventListener('click', function(event) {
            var copyTextarea = document.querySelector('.group-code');
            copyTextarea.focus();
            copyTextarea.select();
            document.execCommand('copy');
            console.log("copied");
            document.getElementsByClassName('copy-message')[0].style.display = "block";
            setTimeout(() => {
                document.getElementsByClassName('copy-message')[0].style.display = "none";
            }, 5000);
            });
        </script>

</div>

<?php
    include 'mainBottom.php';
?>