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
    if (isset($_POST['btn'])) {
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
                    echo "<div class='alert alert-success'>Password Changed Successfully !!  Login Again.</div>";
                        echo "<script> window.location='login_user.php';</script>";
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

  <!-- Mirrored from htmlstream.com/front-dashboard/user-profile-my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 09:38:11 GMT -->

  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Update password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo-mini.svg" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/css/vendor.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="assets/css/theme.minc619.css?v=1.0">
  
    <link rel="preload" href="assets/css/theme.min.css" data-hs-appearance="default" as="style">
    <link rel="preload" href="assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

    <style data-hs-appearance-onload-styles>
      * {
        transition: unset !important;
      }

      body {
        opacity: 0;
      }
    </style>

    <!-- ONLY DEV -->

    <style>
      body {
        opacity: 0;
      }
    </style>

  </head>
  <?php include_once("user_header.php") ?>

  <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

    <script src="assets/js/hs.theme-appearance.js"></script>

    <script src="assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

    <main id="content" role="main" class="main">
    <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url(assets/svg/components/card-6.svg);">
      <!-- Shape -->
      <div class="shape shape-bottom zi-1">
        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
          <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
        </svg>
      </div>
      <!-- End Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
 

      <div class="mx-auto" style="max-width: 30rem;">
        <!-- Card -->
        <div class="card card-lg mb-5">
          <div class="card-body">
            <!-- Form -->
            <form  action="change_pass.php"  novalidate enctype="multipart/form-data" method="post">
              <div class="text-center">
                <div class="mb-5">
				<a class="d-flex justify-content-center mb-5" href="index.php">
        <img class="zi-2" src="assets/images/logo (2).svg" alt="Image Description" style="width: 8rem;">
      </a>
                  <h1 class="display-5">Wanted a New Password ?</h1>
                  <p>Enter the Details we'll send you instructions to reset your password.</p>
                </div>
              </div>

              <!-- Form -->
              <div class="mb-4">
                <label class="form-label" for="resetPasswordSrEmail" tabindex="0">Your Current password</label>

                <input type="text" class="form-control form-control-lg" name="current" id="resetPasswordSrEmail" tabindex="1" placeholder="Existing Password" aria-label="Enter your email address" value="<?php echo $pass; ?>" readonly>
                <span class="invalid-feedback">Existing Password</span>
              </div>
              <div class="mb-4">
                <label class="form-label" for="resetPasswordSrEmail" tabindex="0">New password</label>

                <input type="password" class="form-control form-control-lg" name="new" id="resetPasswordSrEmail" tabindex="1" placeholder="Please enter a valid Password" aria-label="Enter your email address" required>
                <span class="invalid-feedback">Please enter a valid Password</span>
              </div>
              <div class="mb-4">
                <label class="form-label" for="resetPasswordSrEmail" tabindex="0">Confirm New Password</label>

                <input type="password" class="form-control form-control-lg" name="confirm" id="resetPasswordSrEmail" tabindex="1" placeholder="Please enter a valid Password" aria-label="Enter your email address" required>
                <span class="invalid-feedback">Please enter a valid Password.</span>
              </div>
              <!-- End Form -->

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg" name="btn">Submit</button>

              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Card -->
      </div>
    </div>
    <!-- End Content -->
  </main>


    <?php
    include_once("user_footer.php");
    ?>
  </body>

  </html>