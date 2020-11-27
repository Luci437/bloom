<div class="top-menu-bar">
    <a href="index.php"><img src="images/logo.svg" alt="logo" class="logo-img"></a>

    <div style="display: flex;position: relative;">
    <a href="index.php" class="menus active-home"><i class="fas fa-home pdspace"></i> <span
        class="name-menu">Home</span></a>
        <a href="#" class="menus notification-button"><i class="fas fa-bell pdspace"></i>
        <?php
            require "includes/dh.inc.php";
            $uid = $_SESSION['userid'];
            $sql = "SELECT * FROM notifications WHERE user_id='$uid' AND noti_status=0;";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                echo '<i class="fas fa-circle notification-circle"></i> ';
            }
        ?>
        <span class="name-menu notimenu">Notifications</span></a>

        <script src="ajax/jquery-3.5.1.min.js"></script>
        <script>
            $(document).mouseup(function(e) 
            {
                var container = $(".notification-box");

                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                {
                    container.hide();
                    $('.notimenu').css("display","none");
                    $('.fa-bell').css("color","rgba(255, 255, 255, 0.64)");
                    $('.notification-button').css("padding","16px 10px 16px 16px");
                }
            });

        </script>

        <!-- end here -->
        <a href="account.php" class="menus active-settings"><i class="fas fa-cog pdspace"></i> <span
        class="name-menu">Settings</span></a>
        <a href="about.php" class="menus active-about"><i class="fas fa-info-circle pdspace"></i> <span
                class="name-menu">About bloom</span></a>
        <a id="logout-btn" href="#" class="menus"><i class="fas fa-sign-in-alt pdspace"></i> <span
                class="name-menu">Logout</span></a>
        <div class="notification-box">
            <?php
                require "includes/dh.inc.php";

                $uid = $_SESSION['userid'];
                $sql = "SELECT * FROM notifications WHERE user_id='$uid' ORDER BY id DESC;";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)) {
                    if($row['noti_status'] == 0) {
                        echo '
                        <div class="noti-bars" data-noti="'.$row['id'].'" onmouseover=checkNotification(this)>
                            <i class="fas fa-chevron-circle-left noti-icon"></i>
                            <p class="noti-text">'.$row['notification'].'</p>
                        </div>
                        ';
                    }else {
                        echo '
                        <div class="noti-bars" data-noti="'.$row['id'].'">
                            <i class="fas fa-chevron-circle-left noti-icon" style="color: rgb(108, 255, 115);"></i>
                            <p class="noti-text">'.$row['notification'].'</p>
                        </div>
                        ';
                    }

                }
                if(mysqli_num_rows($result) == 0) {
                    echo '<div class="noti-bars">
                            <i class="fas fa-dot-circle noti-icon"></i>
                            <p class="noti-text">Nothing happend till now</p>
                        </div>';
                }
            ?>
        </div>
    </div>
</div>

<script src="ajax/jquery-3.5.1.min.js"></script>
<script>
$('#logout-btn').on('click', function() {
    $('.logout-anim-box').css("display", "flex");
    $.ajax({
        url: "includes/logout.inc.php",
        type: 'POST',
        data: {
            id: '1'
        },
        success: function(dataResult) {
            setTimeout(() => {
                window.location = "login.php";
            }, 1500);
        }
    });
});

$('.notification-button').on('click', function() {
    $('.notification-box').fadeToggle();
    $('.notimenu').css({"display":"flex","color":"white"});
    $('.fa-bell').css("color","white");
    $('.notification-button').css("padding","16px 32px");
});

function checkNotification(notibox) {
    let notid = $(notibox).attr('data-noti');
    $.ajax({
        url: 'ajax/checkNoti.ajax.php',
        type: 'POST',
        data: {
            id: notid
        },
        success: function(dataResult) {
            if (dataResult > 0) {
                $('.notification-circle').css("display", "block");
            } else {
                $('.notification-circle').css("display", "none");
                $('.noti-icon').css('color', 'rgb(108, 255, 115)');
            }
        }
    });
}
</script>