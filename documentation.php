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

    <!-- Title -->
    <title>Users</title>

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
  <script src="assets/js/vendor.min.js"></script>
  <main id="content" role="main" class="main">
        <!-- Page Header -->
        <div class="bg-light py-3">
            <div class="container">
                <h1 class="h3 mb-0">Website Documentation</h1>
            </div>
        </div>

        <!-- Documentation Sections -->
        <div class="container py-5">
            <!-- Introduction Section -->
            <section id="introduction">
                <h2 class="h4">Introduction</h2>
                <p>This documentation provides an in-depth guide to the website's structure, components, and functionalities. It serves as a reference for users and developers to understand and utilize the features effectively.</p>
            </section>

            <!-- Features Section -->
            <section id="features" class="mt-4">
                <h2 class="h4">Features</h2>
                <ul>
                    <li><strong>Responsive Design:</strong> Fully optimized for desktop, tablet, and mobile devices.</li>
                    <li><strong>User Authentication:</strong> Secure login and registration system.</li>
                    <li><strong>Dynamic Content:</strong> Content is dynamically loaded and updated using PHP and AJAX.</li>
                    <li><strong>Admin Panel:</strong> Comprehensive control over website management, including user data and content moderation.</li>
                    <li><strong>Documentation:</strong> Detailed guides and FAQs for users and developers.</li>
                </ul>
            </section>

            <!-- Code Structure Section -->
            <section id="code-structure" class="mt-4">
                <h2 class="h4">Code Structure</h2>
                <p>The project follows a modular approach to ensure scalability and maintainability. Below is the directory structure:</p>
                <pre>
root/
|-- assets/
|   |-- css/
|   |-- js/
|   |-- images/
|-- includes/
|   |-- user_header.php
|   |-- user_footer.php
|-- pages/
|   |-- documentation.php
|-- index.php
                </pre>
            </section>

            <!-- Technology Stack Section -->
            <section id="technology-stack" class="mt-4">
                <h2 class="h4">Technology Stack</h2>
                <ul>
                    <li><strong>Frontend:</strong> HTML5, CSS3, JavaScript, Bootstrap.</li>
                    <li><strong>Backend:</strong> PHP 7.4+, MySQL.</li>
                    <li><strong>Version Control:</strong> Git and GitHub.</li>
                    <li><strong>Libraries/Plugins:</strong> DataTables, Chart.js, HS Navigation.</li>
                </ul>
            </section>

            <!-- Usage Guidelines Section -->
            <section id="usage-guidelines" class="mt-4">
                <h2 class="h4">Usage Guidelines</h2>
                <p>To use the website effectively, follow these steps:</p>
                <ol>
                    <li>Navigate to the homepage to explore the website's main features.</li>
                    <li>Use the navigation menu to access different sections.</li>
                    <li>For admin functionalities, log in with admin credentials to access the admin panel.</li>
                    <li>Refer to the FAQ section for common queries and troubleshooting tips.</li>
                </ol>
            </section>

            <!-- FAQ Section -->
            <section id="faq" class="mt-4">
                <h2 class="h4">Frequently Asked Questions</h2>
                <dl>
                    <dt>How do I reset my password?</dt>
                    <dd>Click on the "Forgot Password" link on the login page and follow the instructions.</dd>

                    <dt>What browsers are supported?</dt>
                    <dd>The website is compatible with all modern browsers, including Chrome, Firefox, Edge, and Safari.</dd>

                    <dt>Can I access the website on mobile devices?</dt>
                    <dd>Yes, the website is fully responsive and optimized for mobile devices.</dd>
                </dl>
            </section>
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