<?php
session_start();
include_once("create_database.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email = $_SESSION['email'];
  $pass = $_SESSION['password'];
?>
  <!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required Meta Tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>CodeColab Documentation</title>
  <link rel="shortcut icon" href="assets/images/logo-mini.svg" />

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="assets/css/vendor.min.css">

  <!-- CSS Template -->
  <link rel="stylesheet" href="assets/css/theme.minc619.css?v=1.0">

  <link rel="preload" href="assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  <!-- Scripts -->
  <script src="assets/js/hs.theme-appearance.js"></script>
  <script src="assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

  <!-- Main Content -->
  <main id="content" role="main" class="main">

    <!-- Header Include -->
    <?php include_once("user_header.php"); ?>

    <section>
      <h1>Website Documentation</h1>
      <p>This documentation provides an overview of the website structure, components, and key features.</p>
      
      <h2>1. Meta and Styles</h2>
      <p>All essential meta tags and stylesheets are loaded in the head section, ensuring responsiveness and theme consistency.</p>
      
      <h2>2. Header and Footer</h2>
      <p>The header and footer are dynamically included using PHP includes for reusability:</p>
      <ul>
        <li><code>user_header.php</code>: Contains navigation and branding.</li>
        <li><code>user_footer.php</code>: Contains footer links and information.</li>
      </ul>

      <h2>3. Appearance Settings</h2>
      <p>The theme includes light and dark modes, controlled via the <code>hs.theme-appearance.js</code> script.</p>

      <h2>4. JavaScript Functionality</h2>
      <p>Interactive features such as the navbar are powered by <code>hs-navbar-vertical-aside</code> for responsive behavior.</p>

      <h2>5. Customization</h2>
      <p>To customize this template, modify the corresponding PHP, CSS, or JS files within the <code>assets</code> directory.</p>

    </section>

    <!-- Footer Include -->
    <?php include_once("user_footer.php"); } ?>
  </main>

</body>

</html>
