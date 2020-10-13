<?php
    include "mainTop.php";
?>

<div class="main-review-box">
    <!-- ** -->
        <?php
            require 'includes/dh.inc.php';

            if($_SESSION['userid']) {

                $uid = $_SESSION['userid'];
                $sql = "SELECT * FROM reviews WHERE user_id='$uid' ORDER BY id desc;";
                $result = mysqli_query($conn, $sql);
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