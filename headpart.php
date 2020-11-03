
<div class="top-menu-bar">
        <a href="index.php"><img src="images/logo.svg" alt="logo" class="logo-img"></a>
        
        <div>
            <a href="about.php" class="menus active-about"><i class="fas fa-info-circle pdspace"></i> About bloom</a>
            <a id="logout-btn" href="#" class="menus"><i class="fas fa-sign-in-alt pdspace"></i> Logout</a>
        </div>
</div>

<script src="ajax/jquery-3.5.1.min.js"></script>
<script>
    $('#logout-btn').on('click', function(){
        $('.logout-anim-box').css("display","flex");
        $.ajax({
            url: "includes/logout.inc.php",
            type: 'POST',
            data: {
                id:'1'
            },
            success: function(dataResult) {
                setTimeout(() => {
                    window.location = "login.php";
                }, 1500);
            }
        });
    });
</script>