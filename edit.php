<?php
include_once("create_database.php");
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
        function validateForm() {
            let isValid = true;

            // Name validation
            const nameField = document.getElementById("name");
            const nameError = document.getElementById("nameError");
            const nameRegex = /^[A-Za-z ]+$/;
            if (!nameRegex.test(nameField.value)) {
                nameError.textContent = "Name can only contain letters.";
                isValid = false;
            } else {
                nameError.textContent = "";
            }

            // Mobile validation
            const mobileField = document.getElementById("mobile");
            const mobileError = document.getElementById("mobileError");
            if (mobileField.value.length !== 10 || isNaN(mobileField.value)) {
                mobileError.textContent = "Mobile number must be exactly 10 digits.";
                isValid = false;
            } else {
                mobileError.textContent = "";
            }

            return isValid;
        }
    </script>
</head>

<body>
    <header>
        <?php include_once("header1.php"); ?>
    </header>

    <?php
    include_once("create_database.php");
    if (!isset($_GET['email'])) {
    ?> <script>
            window.location = "admin_dashboard.php";
        </script>
    <?php
    } else {
        $email = $_GET['email'];
        $q = "select * from users where user_email='$email'";
        $result = mysqli_query($conn, $q);
    }
    ?>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['user_name'];
        $mob = $row['Mobile_no'];
        $email = $row['user_email'];
        $pass = $row['user_password'];
        $profile = $row['profile'];
    }
    ?>
    <div class="register-form">
        <H2>Edit Details</H2>
        <form method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="form-group">
                <div class="card-body text-center">
                    <?php
                    if (!empty($profile) && file_exists("uploads/$profile")) {
                        // Display the profile image
                        echo "<img class='img-account-profile rounded-circle mb-2' 
                    src='uploads/$profile' 
                    alt='Profile Image' 
                    style='height:100px;width:100px; border: 2px solid #4e73df;
  border-radius: 25px;'>";
                    } else {
                        echo "<img class='img-account-profile rounded-circle mb-2' 
                    src='assets/images/faces/admin.png' 
                    alt='Default Image' 
                    style='height:100px;width:100px;'>";
                    }
                    ?>
                    <div class="small font-bold text-muted mb-4" style="font-size:14px">
                        JPG or PNG no larger than 5 MB
                    </div>
                    <input type="file" id="actual-btn" name="file" hidden />
                    <label for="actual-btn" id="actual" class="btn btn-outline-secondary" name="file">Choose File</label>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" placeholder="Enter Your Name" value="<?php echo "$name" ?>" name="name">
                <p id="nameError" class="error"></p>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control" id="email" type="email" placeholder="Enter your Email" value="<?php echo "$email" ?>" name="em" readonly>
                <p id="emailError" class="error"></p>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input class="form-control" id="mobile" type="number" placeholder="Enter your Mobile number" value="<?php echo "$mob" ?>" name="mob">
                <p id="mobileError" class="error"></p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" id="pass" type="text" placeholder="Enter your Password" value="<?php echo "$pass" ?>" name="pswd" readonly>
                <p id="password1" class="error"></p>
            </div>
            <div class="links">
                <a href="admin_dashboard.php" id="links">Go to Dashboard</a>
            </div><br>
            <button type="submit" class="btn btn-primary" name="btn">Edit</button>
        </form>
    </div>
    <br><br>
    <?php
    if (isset($_POST['btn'])) {
        $name1 = $_POST['name'];
        $mobile1 = $_POST['mob'];
        $email1 = $_POST['em'];
        $password1 = $_POST['pswd'];

        // Handle file upload
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $profile1 = $_FILES['file']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($profile1);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            } else {
                $profile1 = '';
            }
        }

        if (isset($profile1) && !empty($profile1)) {
            $b = "UPDATE users SET `user_name`='$name1', `Mobile_no`=$mobile1, `user_password`='$password1', `profile`='$profile1' WHERE `user_email`='$email1'";
        } else {
            $b = "UPDATE users SET `user_name`='$name1', `Mobile_no`=$mobile1, `user_password`='$password1' WHERE `user_email`='$email1'";
        }

        $result2 = mysqli_query($conn, $b);
        if ($result2) {
    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
                <strong>Success!</strong> User details have been updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <script>
                setTimeout(function() {
                    window.location = "admin_dashboard.php"; // Redirect after 3 seconds
                }, 2000);
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Error in data updating");
                window.location = "edit.php";
            </script>
    <?php
        }
    }
    ?>
    <?php include_once("footer1.php"); ?>
</body>

</html>