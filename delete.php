<?php
session_start();
include_once('header1.php');
include_once("create_database.php");
$email = $_GET['email'];
$m = "DELETE FROM users WHERE user_email='$email';";
if (mysqli_query($conn, $m)) {
    $_SESSION['reg_success'] = "User Account Deleted";
    header("Location: admin_dashboard.php");
?>
<?php
} else {
    $_SESSION['reg_msg_err'] = "Failed to send the activation email. Please try again.";
?>
    <script>
        alert("error in deleting data..");
    </script>
<?php
}
?>