<?php
    require "../includes/dh.inc.php";
    session_start();

    if(isset($_POST['mode'])) {
        if($_POST['mode'] == 'Exchange') {
            $myid = $_POST['myid'];
            $himid = $_POST['himid'];


            $sql = "SELECT scores FROM available_players WHERE id='$myid';";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $myScore = $row['scores'];

            $sql = "SELECT scores FROM available_players WHERE id='$himid';";
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $himScore = $row['scores'];

            $sql = "UPDATE available_players SET scores='$myScore' WHERE id='$himid';";
            mysqli_query($conn,$sql);

            $sql = "UPDATE available_players SET scores='$himScore' WHERE id='$myid';";
            mysqli_query($conn,$sql);

            echo "Exchange";
        }

        if($_POST['mode'] == 'mvp') {
            $himid = $_POST['mvpid'];
            $gameId = $_SESSION['newGame'];
            $sql = "SELECT min(ap.scores) as mx, ap.id FROM available_players ap, addedgame ag where ag.game_id = '$gameId' AND ag.player_id = ap.id;";
            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $topScore = $result['mx'];

            //this was the area that caused error
                $topScore--;
                $sql = "UPDATE available_players SET scores = '$topScore' WHERE id='$himid';";
                mysqli_query($conn, $sql);

            echo "You are a vazha";


        }

        if($_POST['mode'] == 'boost_10') {
            $letUserid = $_POST['gainUserId'];

            $sql = "SELECT scores FROM available_players WHERE id='$letUserid';";
            $newScoreResult = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $newScore = $newScoreResult['scores'];
            $newScore += 10;

            $sql = "UPDATE available_players SET scores='$newScore' WHERE id='$letUserid';";
            mysqli_query($conn, $sql);

            echo "10 points added";
        }

        if($_POST['mode'] == 'loss_10') {
            $letUserid = $_POST['gainUserId'];

            $sql = "SELECT scores FROM available_players WHERE id='$letUserid';";
            $newScoreResult = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $newScore = $newScoreResult['scores'];
            $newScore -= 10;
        
            

            $sql = "UPDATE available_players SET scores='$newScore' WHERE id='$letUserid';";
            mysqli_query($conn, $sql);

            echo "10 points removed";
        }

    }
?>


