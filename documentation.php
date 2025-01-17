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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Documentation</title>

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
    }
    ?>
    <!-- <script src="assets/js/vendor.min.js"></script> -->
    <main id="content" role="main" class="main">

      <div class="card justify-content-lg-center">
        <div class="card-header">
          <h2 class="card-title">Documentation</h2>
        </div>
        <div class="card-body">
          <h2>Overview</h2>
          <p>CodeColab is a collaborative platform designed for developers, students, and tech enthusiasts to work on coding projects together. It provides an interactive environment where users can share code, collaborate in real-time, and improve their skills through group learning and teamwork.</p>

          <h2>Features</h2>
          <ul>
            <li><strong>Real-Time Collaboration:</strong> Users can edit and debug code collaboratively with live updates.</li>
            <li><strong>Project Management:</strong> Manage projects, assign tasks, and track progress effectively.</li>
            <li><strong>Code Sharing:</strong> Easily share code snippets with team members or the community.</li>
            <li><strong>Interactive Code Editor:</strong> Built-in editor with syntax highlighting, autocomplete, and multi-language support.</li>
            <li><strong>Version Control Integration:</strong> Option to manually integrate with Git for version control.</li>
            <li><strong>User Authentication:</strong> Secure login and registration system.</li>
            <li><strong>Responsive Design:</strong> Accessible on desktops, tablets, and mobile devices.</li>
          </ul>

          <h2>Technology Stack</h2>
          <ul>
            <li><strong>Frontend:</strong> HTML, CSS, and JavaScript (Bootstrap for responsive design)</li>
            <li><strong>Backend:</strong> PHP and MySQL</li>
            <li><strong>Hosting:</strong> Deployed on a suitable web server</li>
          </ul>

          <h2>Setup Instructions</h2>
          <h3>Prerequisites</h3>
          <ul>
            <li>PHP 7.4 or higher installed on your system.</li>
            <li>MySQL database server.</li>
            <li>A web server (e.g., Apache or Nginx).</li>
          </ul>
          <h3>Installation Steps</h3>
          <ol>
            <li>Clone the repository: <code>git clone [repository URL]</code></li>
            <li>Navigate to the project directory: <code>cd CodeColab</code></li>
            <li>Set up the database by importing the `database.sql` file into MySQL.</li>
            <li>Update the database configuration in <code>config.php</code>.</li>
            <li>Start the local server and access the project in the browser.</li>
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