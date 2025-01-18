<?php
session_start();
include_once("create_database.php");
// Check if there's any error message to display
if (isset($_SESSION['reg_msg_err'])) {
    echo "<script>alert('" . $_SESSION['reg_msg_err'] . "');</script>";
    // Clear the error message after it's displayed
    unset($_SESSION['reg_msg_err']);
}
if (isset($_SESSION['reg_success'])) 
{
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertmsg">
            <strong>Success</strong>
             <?php
              echo $_SESSION['reg_success']; 
             ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <script>
           setTimeout(function() {
             document.getElementById('alertmsg').style.display = 'none';
            }, 5000);
        </script>
    <?php
        unset($_SESSION['reg_success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeColab Register</title>
    <link rel="shortcut icon" href="assets/images/logo-mini.svg" />
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
        .error {
            color: red;
            font-size: 12px;
        }
        .success {
            color: green;
        }
    </style>
    <script>
        function validateName() {
            const name = document.getElementById("name").value;
            const nameError = document.getElementById("name1");
            const regex = /^[a-zA-Z ]+$/;

            if (!name) {
                nameError.textContent = "Name field cannot be empty.";
                return false;
            } else if (!regex.test(name)) {
                nameError.textContent = "Name must contain only letters and spaces.";
                return false;
            } else {
                nameError.textContent = "";
                return true;
            }
        }

        function validateEmail() {
            const email = document.getElementById("email").value;
            const emailError = document.getElementById("email1");
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!email) {
                emailError.textContent = "Email field cannot be empty.";
                return false;
            } else if (!regex.test(email)) {
                emailError.textContent = "Invalid email format.";
                return false;
            } else {
                emailError.textContent = "";
                return true;
            }
        }

        function validateMobile() {
            const mobile = document.getElementById("mobile").value;
            const mobileError = document.getElementById("mobile1");

            if (!mobile) {
                mobileError.textContent = "Mobile number cannot be empty.";
                return false;
            } else if (mobile.length < 10) {
                mobileError.textContent = "Enter a 10-digit number.";
                return false;
            } else if (mobile.length > 10) {
                mobileError.textContent = "Number cannot exceed 10 digits.";
                return false;
            } else {
                mobileError.textContent = "";
                return true;
            }
        }

        function validatePassword() {
            const password = document.getElementById("password").value;
            const passwordError = document.getElementById("password1");
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,15}$)/;

            if (!password) {
                passwordError.textContent = "Password field cannot be empty.";
                return false;
            } else if (!regex.test(password)) {
                passwordError.textContent = "Password must be 6-15 characters and include uppercase, lowercase, digit, and special character.";
                return false;
            } else {
                passwordError.textContent = "";
                return true;
            }
        }

        function validateForm() {
            const isNameValid = validateName();
            const isEmailValid = validateEmail();
            const isMobileValid = validateMobile();
            const isPasswordValid = validatePassword();

            return isNameValid && isEmailValid && isMobileValid && isPasswordValid;
        }
    </script>
</head>
<body>
<header>
    <?php include_once("header1.php"); ?>
</header>

<div class="register-form">
    <H2>Register</H2>
    <form action="register_insert.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" onblur="validateName()">
            <p id="name1" class="error"></p>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" onblur="validateEmail()">
            <p id="email1" class="error"></p>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile No" onblur="validateMobile()">
            <p id="mobile1" class="error"></p>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" onblur="validatePassword()">
            <p id="password1" class="error"></p>
        </div>
        <div class="form-group">
            <label for="file">Profile Picture</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="links">
            <a href="login_user.php">Already a member? Login Now</a>
        </div><br>
        <button type="submit" class="btn btn-primary" name="btn">Register</button>
        
    </form>
</div>
<footer>
    <?php include_once("footer1.php"); ?>
</footer>
</body>
</html>
