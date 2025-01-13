<?php
include_once("create_database.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $user = $_SESSION['email'];
    $pass = $_SESSION['password'];

    // Fetch user details from the database
    $q = "SELECT * FROM users WHERE user_email='$user'";
    $result = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($result)) {
        $pass = $row['user_password'];
    }
    if (isset($_POST['lgn_btn'])) {
        $current = $_POST['current'];
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];

        $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/";

        if ($current === $pass) {
            if (preg_match($passwordPattern, $new)) {
                if ($new === $confirm) {
                    // Update the password in the database
                    $query = "UPDATE users SET user_password='$new' WHERE user_email='$user'";
                    $res = mysqli_query($conn, $query);

                    if ($res) {
                        session_destroy();
                        echo "<script>alert('Password Changed Successfully.'); window.location='login_user.php';</script>";
                    } else {
                        echo "<div class='alert alert-dark'>Error in changing the password.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>New password and confirm password must match.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>New password must be between 8-16 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Incorrect current password.</div>";
        }
    }
} else {
    echo "<script>window.location = 'login_user.php';</script>"; // Redirect to login if not authenticated
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="CodeColab">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        .register-form {
            max-width: 500px;
            margin: 100px auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4e73df;
        }
        .form-control {
            border-radius: 20px;
            margin-bottom: 15px;
        }
        .btn-primary {
            border-radius: 20px;
            width: 100%;
            padding: 10px;
        }
        .links {
            text-align: center;
            margin-top: 10px;
        }
        .links a {
            color: #4e73df;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <?php include_once("header1.php"); ?>
</header>
<div class="container">
    <div class="register-form">
        <h2>Change Password</h2>
        <form method="POST" action="">
            <input type="password" class="form-control" name="current" placeholder="Current Password" required>
            <input type="password" class="form-control" name="new" placeholder="New Password" required>
            <input type="password" class="form-control" name="confirm" placeholder="Confirm Password" required>
            <button type="submit" class="btn btn-primary btn-block" name="lgn_btn">Change</button>
        </form>
    </div>
</div>
<footer>
    <?php include_once("footer1.php"); ?>
</footer>
</body>
</html>
