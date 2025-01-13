<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CodeColab</title>
    <link href="//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;    
        }
        header {
            padding: 15px 0;
        }
    </style>
</head>

<body>
    <header id="site-header" class="fixed">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <h1>
                    <a class="navbar-brand" href="header.php">
                        { Code<span class="log">Colab }</span>
                    </a>
                </h1>
            </nav>
        </div>
    </header>
      <script>
        // Add event listener to the logo
        document.getElementById('logo').addEventListener('click', function () {
            // Toggle the dark theme class on the body
            document.body.classList.toggle('dark-theme');
        });
    </script>
    <section class="login-form-section py-5"></section>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/theme-change.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
