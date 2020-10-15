<?php
    include "mainTop.php";
?>
<style>
.active-menus-reviews {
    background: #241663;
    color: white;
}
</style>
<div class="main-review-box">
    <!-- ** -->
        <?php
            require 'includes/dh.inc.php';

            if($_SESSION['userid']) {

                $uid = $_SESSION['userid'];
                $sql = "SELECT * FROM reviews WHERE user_id='$uid' AND viewed=false ORDER BY id desc;";
                $result = mysqli_query($conn, $sql);
                $total_reviews = mysqli_num_rows($result);
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <div class="review-container">
                            <div class="review-user-box"></div>
                            <h3 class="review-text">'.$row['review'].'</h3>
                            <div class="mark-as-read-box">
                                <a href="includes/deleteReview.inc.php?reviewId='.$row['id'].'" class="mark-as-read">MARK AS READ</a>
                            </div>
                        </div>
                    ';
                }
                if($total_reviews == 0) {
                    echo '
                    <div class="video-box">
                        <div class="video-text-box">
                            <h1 class="video-text"><i class="fab fa-rocketchat pdspace"></i>Deserted</h1>
                            <h2 style="color: rgba(255, 255, 255, 0.18);">Join any group or create a new group, reviews are inevitable.</h2>
                        </div>
                        <video autoplay loop playsinline src="images/galaxy stone.mp4" class="no-review-video"></video>
                    </div>
                    ';
                }

            }else {
                header("Location: login.php");
                exit();
            }
        ?>
    <!-- ** -->

</div>

<?php
    include "mainBottom.php";
?>