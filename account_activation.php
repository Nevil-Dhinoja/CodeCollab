<?php
include_once("header1.php");
require("create_database.php");
session_start();
$email = $_GET['email'];
$q1 = "select * from users where user_email='$email' and Status='Active'";
$result = mysqli_num_rows(mysqli_query($conn, $q1));
if ($result == 0) {
    $q = "UPDATE users set Status = 'Active' where user_email='$email'";
    if (mysqli_query($conn, $q)) {
        $_SESSION['Activation_succ'] = "Account acrtivated succesfully. Plaese Log in to your account.";
    } else {
        $_SESSION['Activation_err'] = "Account activation Failed";
    }
} else {
    $_SESSION['Activation_err'] = "Account is already activated. Log in to your account";
}
include_once("footer1.php") 
?>
<script>
    window.location = "login_user.php";
</script>
