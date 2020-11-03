
<?php 
    include('mainTop.php');
?>
<div class="no-group-container">
            <!-- <img src="images/no-group.png" alt="no-group" class="no-group-img"> -->
            <div class="black-cover"></div>

            <?php 

                if(isset($_GET['link'])) {
                    if($_GET['link'] == 'showJoinBox') {
                        echo '
                            <h2 class="welcome-note">Join any group</h2>
                            <form action="includes/findGroup.inc.php" method="post" class="join-group-form">
                            <table cellspacing="10" style="width: 400px;">
                                <tr>
                                    <td>
                                        <label for="group-id" class="group-label">CODE</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="text" name="group-code" onkeyup="checkCode()" onpaste="checkCode()" required maxlength="5" id="group-gen-code" class="group-input">
                                    <i class="fas fa-check-circle correct-group"></i>
                                    <i class="fas fa-times-circle wrong-group"></i>
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td style="display: grid;grid-template-columns: repeat(2,1fr);">
                                        <button name="find-group-form" class="join-button"> Join group</button>
                                        <a href="index.php" class="cancel-button"> Cancel</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <script type="text/javascript" src="javascript/jscript.js">
                        </script>
                    ';
                    exit();
                    }elseif($_GET['link'] == 'showCreateBox') {
                        echo '
                        <h2 class="welcome-note">Create your group</h2>
                        <form action="includes/createGroup.inc.php" method="post" class="join-group-form">
                        <table cellspacing="10" style="width: 400px;">
                            <tr>
                                <td>
                                    <label for="group-id" class="group-label">NAME</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <input type="text" name="group-name" required maxlength="20" class="group-input-create">
                                </td>
                            </tr>
                            <tr align="left">
                            <td style="display: grid;grid-template-columns: repeat(2,1fr);">
                                    <button name="create-group-form" class="join-button"> Create group</button>
                                    <a href="index.php" class="cancel-button"> Cancel</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                        ';
                    }
                }else {
                    echo '
                        <h1 class="welcome-note">Welcome to bloom</h1>
                        <h3 class="welcome-sub-note">You might know everything in this world, but do you know yourself?</h3>    
                        <div class="group-button-box">
                            <a href="index.php?link=showCreateBox" class="group-button"><i class="fas fa-folder-plus pdspace"></i> Create group</a>
                            <a href="index.php?link=showJoinBox" class="group-button join-group"><i class="fas fa-plus-square pdspace"></i> Join group</a>
                        </div>
                    ';
                }

            ?>
        </div>

<?php
    include "mainBottom.php";
?>