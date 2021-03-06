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
    <?php

    require "includes/dh.inc.php";
    $gid = $_GET['groupId'];
    $uid = $_SESSION['userid'];
    $sql = "SELECT bc.id, bc.broadcast_message, bc.message_date FROM broadcast bc,broadcast_seen_users bs WHERE bc.group_id='$gid' AND bc.id=bs.broad_id AND bs.broad_status=0 AND bs.user_id='$uid';";
    $result = mysqli_query($conn, $sql);
    $broad_id = 0;
    if(mysqli_num_rows($result) > 0) {
        echo '
        <div class="main-broadcaste">
        <div class="load-box"><section class="loder"></section>
        <div class="attention-list">
        <i class="fas fa-times close-attention"></i>
            <section class="inside-list">
                <h5 style="color: white;"><i class="fas fa-bullhorn pdspace"></i>ATTENTION DEAR FELLOW MATES</h5>
                ';
                while($row = mysqli_fetch_assoc($result)) {
                    $broad_id = $row['id'];
                    echo '
                    <p class="attention-note">
                    <i class="fas fa-angle-double-right pdspace"></i>'.$row['broadcast_message'].'
                    <span class="date-attention">'.$row['message_date'].'</span>
                    </p>   
                    ';
                    $sql = "UPDATE broadcast_seen_users SET broad_status=1 WHERE broad_id='$broad_id' AND user_id='$uid';";
                    mysqli_query($conn, $sql);
                }
        echo '
            </section>
        </div>
        </div>
        </div>
        ';


    }
    // $sql = "UPDATE broadcast SET message_status=1 WHERE group_id='$gid' AND message_status=0;";
    // mysqli_query($conn, $sql);
    ?>
    <script>
        $('.close-attention').on('click', function() {
            $('.main-broadcaste').css('display','none');
        });
    </script>
        <?php
            require "includes/dh.inc.php";

            $gid = $_GET['groupId'];
            $uid = $_SESSION['userid'];

            $sql = "SELECT * FROM groups WHERE user_id='$uid' AND id='$gid';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0) {
                echo '<div class="group-options">
                <a href="#" class="add-friends-buttons2 second-add-friend0-button" style="position: relative;padding: 16px 32px;"><i class="fas fa-plus-square pdspace"></i> ADD FRIENDS</a>
                <a href="#" onclick="showAnnounceInputBox()" class="add-friends-buttons" style="position: relative;padding: 16px 32px;"><i class="fas fa-bullhorn pdspace"></i> BROADCAST</a>
                <a href="#" class="group-close-button delgp" style="position: relative;padding: 16px 32px;"><i class="fas fa-trash pdspace"></i> DELETE GROUP</a>
                <i class="fas fa-chevron-down pulldownarrow"></i>
                </div>';
            }
        ?>

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
                    <div class="inside-review-option-box">';
                        $fid = $row['id'];
                        $sql2 = "SELECT * FROM myfriends WHERE user_id='$uid' AND friend_id='$fid';";
                        $results = mysqli_query($conn, $sql2);
                        $rowz = mysqli_num_rows($results);
                        
                        if($rowz>0) {
                            echo '<a class="already-friend-button"><i class="fas fa-check pdspace"></i> Friend</a>';
                        }else {
                            echo '<a href="includes/addFriend.inc.php?id='.$fid.'&gid='.$gid.'" class="add-friend-button"><i class="fas fa-user-plus pdspace"></i> Add Friend</a>';
                        }

                        $qry = "SELECT * FROM groups WHERE user_id='$uid' AND id='$gid';";
                        $resultss = mysqli_query($conn, $qry);
                        if(mysqli_num_rows($resultss)>0) {
                            echo '<a href="includes/kick.inc.php?userId='.$row['id'].'&groupId='.$row['group_id'].'" class="kickout-btn"><i class="fas fa-times close-button"></i><span class="kick-span">KICK OUT</span></a>';
                        }
                    echo '
                    </div><div class="review-top">
                        <h4 class="group-username">@ '.$row['name'].'</h4>
                        <h5 class="group-user-about">'.$row['email'].'</h5>
                    </div>
                    <form method="POST" action="includes/sendReview.inc.php" class="review-bottom">
                    <i class="fas fa-comment-alt review-icon"></i>
                        <input type="text" placeholder="Say something about '.$row['name'].'" class="review-input" maxlength="500" id="review" require name="review">
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
                    </div>';
            }
        }

    ?>
        <!-- *** -->
        <a href="" class="reload-members"><i class="fas fa-redo-alt pdspace"></i> New Members</a>
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
                        <h2 class="total-members" id="total_">'.$total_members.'</h2>
                        <input type="hidden" id="group-id" value="'.$gid.'">
                        <input type="hidden" id="group_t" value="'.$total_members.'">
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
                        echo '<a href="includes/groupAccess.inc.php?groupId='.$groupid.'" class="group-close-buttons"><i class="fas fa-lock pdspace"></i> CLOSE GROUP</a>';
                    }else {
                        echo '<a href="includes/groupAccess.inc.php?groupId='.$groupid.'" class="group-close-buttons open-button"><i class="fas fa-lock-open pdspace"></i> OPEN GROUP</a>';
                    }
                }else {
                    echo '<a href="includes/leaveGroup.inc.php?groupId='.$groupid.'" class="group-close-buttons"><i class="fas fa-sign-out-alt pdspace"></i> LEAVE GROUP</a>';
                }
            ?>

            <!-- to find total group members -->
            <script>
            setInterval(() => {
                let groupId = $('#group-id').val();
                let gpMembers = $('#group_t').val();
                $.ajax({
                    url: "ajax/countTotalGroupMembers.ajax.php",
                    type: "POST",
                    data: {
                        groupId: groupId
                    },
                    success: function(dataResult) {
                        if (dataResult != gpMembers) {
                            $(".reload-members").css("display", "block");
                        }
                        $('#total_').html(dataResult);
                        $("#group_t").val(dataResult);
                    }
                });
            }, 1000);
            </script>
            <!-- total group members ends here -->

        </div>

    </div>

    <script type="text/javascript">
    randomColors();

    function randomColors() {
        let darkValues = ['#7B241C', '#5B2C6F', '#1A5276', '#21618C', '#117864', '#0E6655', '#1D8348', '#9A7D0A',
            '#9C640C', '#935116', '#873600', '#515A5A', '#212F3C', '#1C2833'
        ];
        let lightValues = ['#A93226', '#7D3C98', '#2471A3', '#2E86C1', '#17A589', '#138D75', '#28B463', '#D4AC0D',
            '#D68910', '#CA6F1E', '#BA4A00', '#707B7C', '#2E4053', '#273746'
        ];
        let totalColor = darkValues.length;
        let el = document.getElementsByClassName('group-username');
        let randNumber;

        for (let i = 0; i < el.length; i++) {
            randNumber = Math.floor(Math.random() * totalColor);
            el[i].style.background = "linear-gradient(" + lightValues[randNumber] + "," + darkValues[randNumber] + ")";
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

    <div class="your-friend-list-box">
        <a id="close-add-friends-box"><i class="fas fa-times"></i></a>
        <div class="friends-zone">
            <p class="outer-title">Your Friends List</p>

            <?php
            require "includes/dh.inc.php";
            $uid = $_SESSION['userid'];
            $gid = $_GET['groupId'];
            $sql = "SELECT user.name,user.id FROM users user,myfriends fri WHERE user.id=fri.friend_id AND fri.user_id='$uid';";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo '
                    <div class="friends-box" data-person-name="'.$row['id'].'" onclick="addToGroup(this)">
                        <h1 class="friends-short-name">'.$row['name'].'</h1>
                        <h4 class="friends-full-name">'.$row['name'].'</h4>
                    </div>
                ';
            }

            if(mysqli_num_rows(mysqli_query($conn, $sql)) == 0) {
                echo '<p style="font-weight: bold;color: grey;">You haven\'t added any one to your friends list </p>';
            }
        ?>

        </div>

        <script>
        function addToGroup(userid) {
            let val = $(userid).attr('data-person-name');
            let gid = $('#group-id').val();
            $.ajax({
                url: "ajax/addFriendToGroup.ajax.php",
                type: "POST",
                data: {
                    userid: val,
                    gid: gid
                },
                success: function(dataResults) {
                    console.log(dataResults);
                    if (dataResults == "Added") {
                        $(userid).css("background", "linear-gradient(#78f446,#45b738)");
                    } else {
                        $(userid).css("background", "linear-gradient( rgb(73, 46, 192),rgb(84, 25, 139))");
                    }
                }
            });
        }
        </script>



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
                if (midSecPoint <= totalLength + 1 && midPoint > 0) {
                    el2[midPoint--].style.display = "flex";
                    el2[midSecPoint++].style.display = "flex";
                } else {
                    clearInterval();
                }
            }, 100);
        }
        </script>

    </div>

        <!-- the second add friend  -->
        <div id="second-add-friends-box">
            <a href="" class="close-add-friends-box2"><i class="fas fa-times" ></i></a>
        </div>
        <!-- ends here -->
        <script>
            $('.second-add-friend0-button').on('click', function() {
                $('#second-add-friends-box').css("display","flex");
                let gid = $('#group-id').val();

                $.ajax({
                    url: 'ajax/secondAddFriends.ajax.php',
                    type: 'POST',
                    data: {
                        gid: gid
                    },
                    success: function(Result) {
                        $('#second-add-friends-box').html(Result);
                        
                        if (document.getElementsByClassName('friends-short-name')) {
                            let el = document.getElementsByClassName('friends-short-name');
                            let el2 = document.getElementsByClassName('friends-box')
                            let totalLength = el.length;

                            for (let i = 0; i < totalLength; i++) {
                                let firtWord = el[i].innerHTML.substr(0, 1);
                                el[i].innerHTML = firtWord;
                            }
                        }
                        
                    }
                });
            });

            function closeSecondBox() {
                $('#second-add-friends-box').css("display","none");
                console.log('eee');
            }
        </script>

        <div class="delete-big-box">
            <h2 style="color: #fff;">Are you sure?</h2><h4 style="color: grey;font-weight: lighter;transform: translateY(-14px);"> you want to delete this group...</h4>
            <div style="display: flex;column-gap: 16px;">
                <button class="del-buttons actual-del" onclick="del_grp()"><i class="fas fa-trash pdspace"></i>DELETE</button>                    
                <button class="del-buttons" onclick="clearBigDelBox()">CANCEL</button>
            </div>
        </div>

        <script>
            function del_grp() {
                let gid = $('#group-id').val();
                $.ajax({
                    url: 'ajax/deleteGroup.ajax.php',
                    type: 'POST',
                    data: {
                        gid: gid
                    },
                    success: function(Result) {
                        if(Result == "success") {
                            let gpLeng = $('.review-box').length;
                            let el = document.getElementsByClassName('review-box');
                            $('.delete-big-box').css("display","none");
                            setInterval(() => {
                                if(gpLeng != 0) {
                                    el[gpLeng - 1].style.display = "none";
                                    gpLeng--;
                                }else {
                                    clearInterval();
                                    window.location = "myGroup.php?success=gpDeleted";
                                }
                            }, 160);
                        }
                    }
                });
            }

            $('.delgp').on('click', function() {
                $('.delete-big-box').css("display","flex");
            });

            function clearBigDelBox() {
                $('.delete-big-box').css("display","none");
            }

            function clearAnnounceInputBox() {
                $('.broad-input-box').css('display','none');
            }

            function showAnnounceInputBox() {
                $('.broad-input-box').css('display','flex');
            }
        </script>

        <div class="broad-input-box">
            <i class="fas fa-times close-announce-input-box" onclick="clearAnnounceInputBox()"></i>
            <h4 style="color: #fff;">SAY SOMETHING HERE</h4>
            <form method="POST" action="includes/announce.inc.php" style="display: flex;column-gap: 16px;">
                <?php
                    if(isset($_GET['groupId'])) {
                        $gid = $_GET['groupId'];
                        echo '<input type="hidden" name="gid" value="'.$gid.'">';
                    }
                ?>
                <input type="text" class="broad-input" name="broad-message" placeholder="Type here to announce">
                <button type="submit" name="announce-submit" class="broad-button"><i class="fas fa-bullhorn pdspace"></i> ANNOUNCE</button>
            </form>
        </div>
</div>

<?php
    include 'mainBottom.php';
?>