<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    
    require '../vendor/autoload.php';
    
    $mail = new PHPMailer(true);
    $toaddress = '';
    $token = '';
    if(isset($_POST['email'])) {
        require "../includes/dh.inc.php";

        $toaddress = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email='$toaddress';";
        $row = mysqli_num_rows(mysqli_query($conn, $sql));
        if($row == 0) {
            echo json_encode(array("result"=>1));
            exit();
        }

        $sql = "SELECT * FROM forgotpassword WHERE email='$toaddress';";
        $row = mysqli_num_rows(mysqli_query($conn, $sql));
        if($row > 0) {
            echo json_encode(array("result"=>2));
            exit();
        }

        while(1) {
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);

            $sql = "SELECT * FROM forgotpassword WHERE token='$token';";
            if((mysqli_num_rows(mysqli_query($conn, $sql))) == 0) {
                break;
            }
        }

        $today = date("Y/m/d");
        
        $the_link = '<div style="position: relative;display: flex;flex-direction: column;width: 500px;padding: 8px;justify-content: center;align-items: center;">
        <h1>Bloom</h1>
        <h3>Click the below link to change your Password</h3>
        <a href="http://localhost/bloom/changePassword.php?token='.$token.'" style="background: blue;color: #fff;padding: 12px 40px;">CHANGE PASSWORD</a>
        </div>';
        $sql = "INSERT INTO forgotpassword(email,created_date,token) VALUES('$toaddress','$today','$token');";
        mysqli_query($conn, $sql);

        try {                   
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML();                                   
            $mail->Username   = 'kamalej1234@gmail.com';                     
            $mail->Password   = 'hsxerjkgqensmukb';                               
            $mail->Port       = '465'; 
            $mail->setFrom('no-replay@bloom.com');
            $mail->Subject = "Reset bloom password";
            $mail->Body = $the_link;
            $mail->addAddress($toaddress);
        
            $mail->send();
                echo json_encode(array("result"=>3));
            } catch (Exception $e) {
                echo json_encode(array("result"=>4));
            }
    }else {
        echo json_encode(array("result"=>11));
        
    }



?>