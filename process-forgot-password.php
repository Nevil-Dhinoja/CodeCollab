<?php
session_start();
include_once("create_database.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

if (isset($_POST['btn'])) {
    $email = $_POST['email'];

    // Query to fetch user password based on email
    $q = "SELECT user_password FROM users WHERE user_email='$email'";
    $result = mysqli_query($conn, $q);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $password = $row['user_password'];

        // Send email with the password
        $mail = new PHPMailer();
        $headers = 'From: CodeColab Team <ndhinoja188@rku.ac.in>' . "\r\n";
        $headers .= 'Reply-To: <ndhinoja188@rku.ac.in>' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $to = $email;
        $subject = "Your Password for CodeColab";
        $body = "You requested your password. Here it is: <br><br> 
                <strong>Password:</strong> $password <br><br>
                Please ensure you keep your password secure.";

        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Host       = 'smtp.gmail.com';
        $mail->Port       = 587;
        $mail->Username   = "ndhinoja188@rku.ac.in";  // Gmail username
        $mail->Password   = "N2955467";             // Gmail password
        $mail->SetFrom('ndhinoja188@rku.ac.in', 'CodeColab');
        $mail->AddReplyTo($email, "CodeColab System");
        $mail->Subject    = $subject;
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
        $mail->MsgHTML($body);
        $address = $email;
        $mail->AddAddress($address, "CodeColab User");

        if (!$mail->Send()) {
            ?>
            <script>
                alert("Error in sending password. Please try again.");
                window.location = "forgot.php";
            </script>
            <?php
        } else {
            $_SESSION['reg_success'] = " A Forgot Mail has been send to your registered email address."; ?>
                    <script>
                        setTimeout(function() {
                            window.location = "login_user.php";
                        });
                    </script>
         <?php
        }
    } else {
        $_SESSION['reg_msg_err'] = "Email not found in the database. Please try again.";
        ?>
        <script>
            window.location = "forgot.php";
        </script>
        <?php
    }
}
?>
