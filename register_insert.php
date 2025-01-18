<?php
session_start();
include_once("create_database.php");

// Use PHPMailer for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require('PHPMailer/PHPMailer.php');
require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');

if (isset($_POST['btn'])) {
    $name = htmlspecialchars($_POST['name']);
    $mobile_no = htmlspecialchars($_POST['mobile']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = mime_content_type($tmp_name);

    // File validation
    $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
    $max_size = 2 * 1024 * 1024; // 2 MB
    if (!in_array($file_type, $allowed_types) || $file_size > $max_size) {
        $_SESSION['reg_msg_err'] = "Invalid file type or size. Only JPEG, PNG, and PDF files under 2MB are allowed.";
        header("Location: register.php");
        exit();
    }


    // Check if email already exists
    $email_check_query = "SELECT user_email FROM users WHERE user_email = ?";
    $stmt_check = $conn->prepare($email_check_query);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Email already exists
        $_SESSION['reg_msg_err'] = "This email is already registered. Please use a different email.";
        header("Location: register.php");
        exit();
    }
    // Use a prepared statement for the SQL query
    $stmt = $conn->prepare("INSERT INTO users (user_name, Mobile_no, user_email, user_password, Profile, Status) VALUES (?, ?, ?, ?, ?, 'Inactive')");
    $stmt->bind_param("sisss", $name, $mobile_no, $email, $password, $file_name);

    if ($stmt->execute()) {
        // Move the uploaded file to the uploads directory
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_store = $upload_dir . basename($file_name);
        move_uploaded_file($tmp_name, $file_store);

        // Send activation email
        $activation_link = "http://localhost/CodeColab/account_activation.php?email=" . urlencode($email);
        $mail = new PHPMailer();
        try {
            putenv("SMTP_USER=ndhinoja188@rku.ac.in");
            putenv("SMTP_PASS=N2955467");

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USER'); // Use environment variables for credentials
            $mail->Password = getenv('SMTP_PASS');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email settings
            $mail->setFrom('ndhinoja188@rku.ac.in', 'CodeColab Team');
            $mail->addAddress($email, $name);
            $mail->isHTML(true);
            $mail->Subject = "Account Activation Link for CodeColab";
            $mail->Body = "Your account has been successfully created. Please click the link below to activate your account:<br><br>
                <a href='$activation_link'>$activation_link</a>";
            $mail->AltBody = "Your account has been successfully created. Please visit the following link to activate your account: $activation_link";

            if ($mail->send()) {
                $_SESSION['reg_success'] = "Account created successfully. An activation link has been sent to your registered email address.";
            } else {
                $_SESSION['reg_msg_err'] = "Failed to send the activation email. Please try again.";
            }
        } catch (Exception $e) {
            $_SESSION['reg_msg_err'] = "Error sending email: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['reg_msg_err'] = "Error creating account. Please try again.";
        error_log("MySQL Error: " . $stmt->error, 3, "/var/log/php_errors.log");
    }

    // Redirect to the registration page with messages
    header("Location: register.php");
    exit();
} else {
?>
    <script>
        alert("Error in Registration. Please try again.");
        window.location = "register.php";
    </script>
<?php
}
?>