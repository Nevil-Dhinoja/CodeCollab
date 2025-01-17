<?php
session_start();
include_once("create_database.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email = $_SESSION['email'];
  $pass = $_SESSION['password'];
  $q = "SELECT * FROM users WHERE user_email = '$email'";
  $result = mysqli_query($conn, $q);
?>
  <!DOCTYPE html>
  <html lang="en">

  <!-- Mirrored from htmlstream.com/front-dashboard/user-profile-my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 09:38:11 GMT -->

  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Title -->
    <title>Components</title>

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

    <style>
      body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .card {
        max-width: 800px;
        margin: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background: #fff;
        align-items: center;
      }

      .card-header {
        text-align: center;
        margin-bottom: 20px;
      }

      .card-header h2 {
        font-size: 24px;
        font-weight: 600;
      }

      .card-body h2 {
        font-size: 20px;
        margin-top: 20px;
        font-weight: 500;
      }

      .card-body ul {
        padding-left: 20px;
        list-style-type: disc;
      }

      .card-body ol {
        padding-left: 20px;
        list-style-type: decimal;
      }

      .card-body p,
      .card-body li {
        font-size: 16px;
        line-height: 1.6;
      }

      .contact-info {
        margin-top: 20px;
      }

      .contact-info ul {
        list-style-type: none;
        padding: 0;
      }

      .contact-info ul li {
        font-size: 16px;
        margin: 5px 0;
      }
    </style>

  </head>
  <?php include_once("user_header.php") ?>

  <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

    <script src="assets/js/hs.theme-appearance.js"></script>

    <script src="assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

    <?php while ($row = mysqli_fetch_array($result)) {
      $profile_complete = 0;

      // Check profile fields for completeness
      if (!empty($row['user_name'])) {
        $profile_complete++;
      }
      if (!empty($row['profile'])) {
        $profile_complete++;
      }
      if (!empty($row['user_email'])) {
        $profile_complete++;
      }
      if (!empty($row['Mobile_no'])) {
        $profile_complete++;
      }
      if (!empty($row['user_password'])) {
        $profile_complete++;
      }
      if (!empty($row['profile_header']) && $row['profile_header'] == 1) {
        $profile_complete++;
      }

      // Calculate the percentage based on the number of fields completed
      $total_fields = 6; // Total number of fields to track (user_name, profile, user_email, Mobile_no)
      $progress_percentage = ($profile_complete / $total_fields) * 100;
    }
    ?>
    <!-- <script src="assets/js/vendor.min.js"></script> -->
    <main id="content" role="main" class="main">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title h4">Components</h2>
        </div>
        <div class="card-body">
          <h2>Overview</h2>
          <p>CodeColab Components is a modular system designed to enhance reusability and maintainability of code. Each component is built with a focus on clarity, simplicity, and scalability.</p>

          <h2>Available Components</h2>
          <ul>
            <li><strong>Navbar:</strong> A responsive navigation bar that adapts to various screen sizes.</li>
            <li><strong>Footer:</strong> A customizable footer with multiple layout options.</li>
            <li><strong>Cards:</strong> Pre-designed card components for displaying information.</li>
            <li><strong>Modals:</strong> Popup modals for alerts, confirmations, or displaying forms.</li>
            <li><strong>Buttons:</strong> Standardized buttons with various styles and sizes.</li>
            <li><strong>Forms:</strong> Pre-styled form components for input handling.</li>
          </ul>

          <h2>Technology Stack</h2>
          <ul>
            <li><strong>Frontend:</strong> HTML, CSS, JavaScript (with Bootstrap for responsive design)</li>
            <li><strong>Backend:</strong> PHP and MySQL</li>
          </ul>

          <h2>How to Use</h2>
          <ol>
            <li>Identify the component you want to use from the above list.</li>
            <li>Include the necessary HTML markup and classes in your code.</li>
            <li>Refer to the documentation for any specific configuration or customization options.</li>
          </ol>

          <h2>Contact</h2>
          <div class="contact-info">
            <ul>
              <li>
                <a href="https://www.linkedin.com/in/nevil-dhinoja" target="_blank">
                  <i class="fa-solid fa-user"></i> &nbsp;Nevil Dhinoja
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/nevil-dhinoja" target="_blank">
                  <i class="fab fa-linkedin"></i> &nbsp;LinkedIn
                </a>
              </li>
              <li>
                <a href="https://github.com/Nevil-Dhinoja" target="_blank">
                  <i class="fab fa-github"></i> &nbsp;GitHub
                </a>
              </li>
            </ul>
          </div>
        </div>
    </main>
  <?php
  include_once("user_footer.php");
} else {
  header("Location: login_user.php");
}
  ?>
  </body>

  </html>