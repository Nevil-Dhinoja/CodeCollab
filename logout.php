<?php
session_start();

// Unset session variables
unset($_SESSION['email']);
unset($_SESSION['password']);

// Destroy the session
session_destroy();

// Prevent page caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // Disable caching
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login page
header("Location: login_user.php");
exit(); // Make sure to call exit after header redirect
?>
