<?php
    include 'mainTop.php';
?>

<div class="group-detail-container">
    <div class="group-member-box">
        
    <!-- ** -->
        <div class="review-box">
            <div class="review-top">
                <h4 class="group-username">@ Kamal</h4>
                <h5 class="group-user-about">kamalej1234@gmail.com</h5>
            </div>
            <form action="" class="review-bottom">
            <i class="fas fa-comment-alt review-icon"></i>
                <input type="text" placeholder="Say something about me" class="review-input" require name="review">
                <input type="hidden" name="userid" value="">
                <button type="submit" class="review-button"><i class="fas fa-paper-plane pdspace"></i> send</button>
            </form>
        </div>

        <div class="review-box">
            <div class="review-top">
                <h4 class="group-username">@ Kamal</h4>
                <h5 class="group-user-about">kamalej1234@gmail.com</h5>
            </div>
            <form action="" class="review-bottom">
            <i class="fas fa-comment-alt review-icon"></i>
                <input type="text" placeholder="Say something about me" class="review-input" require name="review">
                <button type="submit" class="review-button"><i class="fas fa-paper-plane pdspace"></i> send</button>
            </form>
        </div>

        <div class="review-box">
            <div class="review-top">
                <h4 class="group-username">@ Kamal</h4>
                <h5 class="group-user-about">kamalej1234@gmail.com</h5>
            </div>
            <form action="" class="review-bottom">
            <i class="fas fa-comment-alt review-icon"></i>
                <input type="text" placeholder="Say something about me" class="review-input" require name="review">
                <input type="hidden" name="userid" value="">
                <button type="submit" class="review-button"><i class="fas fa-paper-plane pdspace"></i> send</button>
            </form>
        </div>

        <div class="review-box">
            <div class="review-top">
                <h4 class="group-username">@ Kamal</h4>
                <h5 class="group-user-about">kamalej1234@gmail.com</h5>
            </div>
            <form action="" class="review-bottom">
            <i class="fas fa-comment-alt review-icon"></i>
                <input type="text" placeholder="Say something about me" class="review-input" require name="review">
                <button type="submit" class="review-button"><i class="fas fa-paper-plane pdspace"></i> send</button>
            </form>
        </div>
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
            <h2 class="total-members">1242</h1>
            <h2 class="total-members">34567</h1>
        </div>

    </div>
</div>

<?php
    include 'mainBottom.php';
?>