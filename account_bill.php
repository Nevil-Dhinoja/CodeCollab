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
        <title>Account Billing Cycle</title>

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
            <!-- Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-sm mb-2 mb-sm-0">

                            <h1 class="page-header-title">Billing</h1>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm-auto">
                            <a class="btn btn-primary" href="my_profile.php">
                                <i class="bi-person me-1"></i> My profile
                            </a>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page Header -->

                <div class="row justify-content-lg-center">
                    <div class="col-lg-9">
                        <div class="d-grid gap-3 gap-lg-5"></div>
                        <div class="card">
                            <div class="card-body">
                                <h1>Launching Premium Soon !! 💸💳</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-lg-center">
                    <div class="col-lg-9">
                        <div class="d-grid gap-3 gap-lg-5">
                            <!-- Card -->
                            <div class="card">
                                <!-- Header -->
                                <div class="card-header card-header-content-between border-bottom">
                                    <h4 class="card-header-title">Overview</h4>

                                    <a class="btn btn-ghost-secondary btn-sm " href="#">
                                        <i class="bi-file-earmark-arrow-down me-1"></i> Launching Soon
                                    </a>
                                </div>
                                <!-- End Header -->

                                <!-- Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md mb-4 mb-md-0">
                                            <div class="mb-4">
                                                <span class="card-subtitle">Your plan (billed yearly):</span>
                                                <h3>2025</h3>
                                            </div>

                                            <div>
                                                <span class="card-subtitle">Total per year</span>
                                                <h1 class="text-primary">$200 USD</h1>
                                            </div>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-md-auto">
                                            <div class="d-grid d-sm-flex gap-3">
                                                <a class="btn btn-white" href="#">Take subscription</a>
                                                <button type="button" class="btn btn-primary w-100 w-sm-auto" data-bs-toggle="modal" data-bs-target="#accountUpdatePlanModal">Future plans</button>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </div>
                                <!-- End Body -->

                                <hr class="my-3">

                                <!-- Body -->
                                <div class="card-body">
                                    <div class="row align-items-center flex-grow-1 mb-2">
                                        <div class="col">
                                            <h4 class="card-header-title">Storage usage</h4>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <span class="text-dark fw-semibold">0.0 GB </span> used of 6 GB
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->

                                    <!-- Progress -->
                                    <div class="progress rounded-pill mb-3">
                                        <!-- <div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 25%; opacity: .6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> -->
                                    </div>
                                    <!-- End Progress -->

                                    <!-- Legend Indicators -->
                                    <ul class="list-inline list-px-2">
                                        <li class="list-inline-item">
                                            <span class="legend-indicator bg-primary"></span> Personal usage space
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="legend-indicator bg-primary opacity"></span> Shared space
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="legend-indicator"></span> Unused space
                                        </li>
                                    </ul>
                                    <!-- End Legend Indicators -->
                                </div>
                                <!-- End Body -->
                            </div>
                            <!-- End Card -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                </>
                <!-- End Content -->


        </main>
    <?php
    include_once("user_footer.php");
} else {
    header("Location: login_user.php");
}
    ?>
    </body>

    </html>