<?php
session_start();
include_once("create_database.php");

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $targetDir = "uploads/";
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

    // Handle profile picture update
    if (isset($_POST['updateProfile']) && isset($_FILES['profile'])) {
        $profile = $_FILES['profile'];
        $fileName = basename($profile["name"]);
        $fileName = mysqli_real_escape_string($conn, $fileName);
        $targetFilePath = $targetDir . $fileName;

        if (in_array($profile["type"], $allowedTypes) && $profile["size"] <= 2 * 1024 * 1024) { // Max 2MB
            if (move_uploaded_file($profile["tmp_name"], $targetFilePath)) {
                $q = "UPDATE users SET profile = '$fileName' WHERE user_email = '$email'";
                if (mysqli_query($conn, $q)) {
                    $_SESSION['Activation_succ'] = "Profile picture updated successfully.";
                } else {
                    $_SESSION['Activation_err'] = "Failed to update profile picture in the database.";
                }
            } else {
                $_SESSION['Activation_err'] = "Error uploading profile picture.";
            }
        } else {
            $_SESSION['Activation_err'] = "Invalid file type or size for profile picture.";
        }
    }

    // Handle profile header update
    if (isset($_POST['update']) && isset($_FILES['file'])) {
        $cover = $_FILES['file'];
        $fileName = basename($cover["name"]);
        $fileName = mysqli_real_escape_string($conn, $fileName);
        $targetFilePath = $targetDir . $fileName;

        if (in_array($cover["type"], $allowedTypes) && $cover["size"] <= 5 * 1024 * 1024) { // Max 5MB
            if (move_uploaded_file($cover["tmp_name"], $targetFilePath)) {
                $q = "UPDATE users SET profile_header = '$fileName', profile_header_updated = 1 WHERE user_email = '$email'";
                if (mysqli_query($conn, $q)) {
                    $_SESSION['Activation_succ'] = "Profile header updated successfully.";
                } else {
                    $_SESSION['Activation_err'] = "Failed to update profile header in the database.";
                }
            } else {
                $_SESSION['Activation_err'] = "Error uploading profile header.";
            }
        } else {
            $_SESSION['Activation_err'] = "Invalid file type or size for profile header.";
        }
    }

    // Redirect back to profile to display messages
    header("Location: my_profile.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>
