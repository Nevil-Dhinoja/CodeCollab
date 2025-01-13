<?php
session_start();
include_once("create_database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add User</title>
    <link rel="shortcut icon" href="assets/images/logo-mini.svg" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/logo-mini.svg" />
</head>
<style>
    body {
        background-color: #333;
        color: #fff;
    }

    .register-form {
        max-width: 540px;
        margin: 100px auto;
        background-color: rgba(26, 30, 44, 0.7);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .register-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color:rgb(255, 255, 255);
    }
/* 
    .form-control {
        border-radius: 20px;
        margin-bottom: 15px;
    } */

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
        text-decoration: none;
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
            passwordError.textContent = "Password be 6-15 characters and include uppercase, lowercase, digit, and special character.";
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
    <?php include_once("admin_header.php"); ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="register-form">
                <H2>Add User</H2>
                <form method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
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
                        <a href="admin_dashboard.php" id="links">Go to Dashboard</a>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="btn">Add User</button>
                </form>
            </div>
        </div>
        <?php include_once("admin_footer.php"); ?>
                </div> 
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
        <?php
        if (isset($_POST['btn'])) {
            $name = $_POST['name'];
            $mobile_no = $_POST['mobile'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $file_name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = mime_content_type($tmp_name);

            // File validation
            $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
            $max_size = 2 * 1024 * 1024; // 2 MB
            if (!in_array($file_type, $allowed_types) || $file_size > $max_size) {
        ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
                    <strong>Error</strong>Invalid file type or size. Only JPEG, PNG, and PDF files under 2MB are allowed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function() {
                        window.location = "add_user.php"; // Redirect after 3 seconds
                    }, 2000);
                </script>
            <?php

                exit();
            }

            $sql_check_email = "SELECT * FROM users WHERE user_email = '$email'";
            $result = $conn->query($sql_check_email);

            if ($result->num_rows > 0) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
                    <strong>Error </strong>Mail Already in Use Please Use different Email Id.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function() {
                        window.location = "add_user.php";
                    }, 2000);
                </script>
            <?php
                exit();
            }

            if (empty($name) || empty($mobile_no) || empty($email) || empty($password)) {
                $_SESSION['reg_msg_err'] = "All fields are required.";
                header("Location: add_user.php");
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['reg_msg_err'] = "Invalid email format.";
                header("Location: add_user.php");
                exit();
            }

            if (!preg_match('/^\d{10}$/', $mobile_no)) {
                $_SESSION['reg_msg_err'] = "Invalid mobile number. Must be 10 digits.";
                header("Location: add_user.php");
                exit();
            }

            // File upload logic
            $upload_dir = "uploads/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $file_store = $upload_dir . basename($file_name);

            if (!move_uploaded_file($tmp_name, $file_store)) {
                $_SESSION['reg_msg_err'] = "File upload failed.";
                header("Location: add_user.php");
                exit();
            }

            $sql = "INSERT INTO users (user_name, Mobile_no, user_email, user_password, profile, Status) 
                VALUES ('$name', '$mobile_no', '$email', '$password', '$file_name', 'Active')";

            if ($conn->query($sql) === TRUE) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
                    <strong>Success </strong>User Added Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <script>
                        setTimeout(function() {
                            window.location = "admin_dashboard.php";
                        }, 1000);
                    </script>
                </div>
        <?php
                header("Location: admin_dashboard.php");
            } else {
                $_SESSION['reg_msg_err'] = "Database error: " . $conn->error;
                header("Location: add_user.php");
            }
            $conn->close();
            exit();
        }
        ?>
</body>

</html>