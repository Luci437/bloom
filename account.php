<?php
    include "mainTop.php";
?>

<div class="group-detail-container">
    <style>
    .active-settings {
        color: #fff;
    }
    </style>
    <div class="account-settings">


        <?php
            require "includes/dh.inc.php";
            $uid = $_SESSION['userid'];
            $sql = "SELECT user.name,user.id FROM users user,myfriends fri WHERE user.id=fri.friend_id AND fri.user_id='$uid';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows(mysqli_query($conn, $sql))>0) {
                echo '<div class="friends-box-account">';
            while($row = mysqli_fetch_assoc($result)) {
                echo '
                    <div class="friends-box">
                        <h1 class="friends-short-name">'.$row['name'].'</h1>
                        <h4 class="friends-full-name">'.$row['name'].'</h4>
                        <a href="includes/deleteFriend.inc.php?id='.$row['id'].'" class="remove-friend"><i class="fas fa-times-circle"></i></a>
                    </div>
            ';
            }
            echo '</div>';
        }
        ?>

        <script>
        if (document.getElementsByClassName('friends-short-name')) {
            let el = document.getElementsByClassName('friends-short-name');
            let el2 = document.getElementsByClassName('friends-box')
            let totalLength = el.length;

            for (let i = 0; i < totalLength; i++) {
                let firtWord = el[i].innerHTML.substr(0, 1);
                el[i].innerHTML = firtWord;
            }

            let midPoint = parseInt(totalLength / 2);
            let midSecPoint = midPoint;

            setInterval(() => {
                if (midSecPoint != totalLength + 1) {
                    el2[midPoint--].style.display = "flex";
                    el2[midSecPoint++].style.display = "flex";
                } else {
                    clearInterval(this);
                }
            }, 100);
        }
        </script>

        <div class="log-container as-bx">
            <form method="POST" class="login-main-box account-change-form">
                <h2 class="main-heading">Account Settings</h3>
                    <h5 class="sub-heading">You can change your Name here.</h5>
                    <div class="sub-login-box">
                        <label for="email" class="input-label">New Name</label>
                        <?php
                        if(isset($_SESSION['userid'])) {
                            $uid = $_SESSION['userid'];
                            echo '<input type="text" class="input-box" pattern="[a-zA-Z0-9\s]+" required id="user-name" value="" name="email">
                                <input type="hidden" id="user-id" value="'.$uid.'">
                            ';        
                        }
                    ?>
                    </div>
                    <label style="color: green;font-size: 12px;padding: 0 0 10px 0;" id="account-change-status"></label>
                    <button type="submit" name="login-form" class="log-button"><i class="fas fa-save pdspace"></i> Save
                        Changes <img src="images/ld.svg" class="lod-anim"></button>
            </form>
            <script>
            if (document.getElementsByClassName('friends-short-name')) {
                $('.account-change-form').on('submit', function(e) {
                    e.preventDefault();
                    let uid = $('#user-id').val();
                    let user_name = $('#user-name').val();
                    $('.log-button').attr('disabled', 'disabled').css("opacity", "0.3").html(
                        "Saving....<img src='images/ld.svg' class='lod-anim'>");
                    $('.lod-anim').css("visibility", "visible");
                    $.ajax({
                        url: 'ajax/changeUserName.ajax.php',
                        type: 'POST',
                        data: {
                            uid: uid,
                            name: user_name
                        },
                        success: function(dataResult) {
                            console.log(dataResult);
                            if (dataResult) {
                                setTimeout(() => {
                                    $('.log-button').removeAttr('disabled').css("opacity",
                                        "1").html(
                                        "<i class='fas fa-check-circle pdspace'></i>Done"
                                        );
                                    $('.lod-anim').css("visibility", "hidden");
                                    $('#account-change-status').html(
                                        "Name Changed Successfully.");
                                    setTimeout(() => {
                                        window.location = "index.php";
                                    }, 1000);
                                }, 3000);
                            }
                        }
                    });
                });
            }
            </script>
        </div>
    </div>
</div>

<?php
    include "mainBottom.php";
?>