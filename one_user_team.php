<?php
session_start();
include_once("create_database.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $user_email = urldecode($_GET['email']);
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];
    $q = "SELECT * FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $q);
    $q1 = "SELECT * FROM projects";
    $result01 = mysqli_query($conn,$q1);
    $total_projects = mysqli_num_rows($result01);
?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- Mirrored from htmlstream.com/front-dashboard/user-profile-my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 09:38:11 GMT -->

    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Users Teams</title>

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
        ?>
            <main id="content" role="main" class="main">
                <?php
                if (isset($_SESSION['reg_success'])) {
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
                        }, 2000);
                    </script>
                <?php
                    unset($_SESSION['reg_success']);
                }
                ?>
                <!-- Content -->
                <div class="content container-fluid">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-10">
                            <!-- Profile Cover -->
                            <div class="profile-cover">
                                <div class="profile-cover-img-wrapper">
                                    <!-- <img id="profileCoverImg" class="profile-cover-img" src="assets/img/1920x400/img2.jpg" alt="Image Description"> -->
                                    <label for="profileCoverUplaoder" class="profile-cover-img">
                                        <?php
                                        echo "<img id='profileCoverImg' class='profile-cover-img' for='profileCoverUplaoder' src='uploads/" . $row['profile_header'] . "' height='60px' width='65px'>";
                                        ?>
                                    </label>
                                    <!-- Custom File Cover -->
                                    <div class="profile-cover-content profile-cover-uploader p-3">
                                    </div>
                                    <!-- End Custom File Cover -->
                                </div>
                            </div>
                            <!-- End Profile Cover -->
                            <!-- Profile Header -->
                            <div class="text-center mb-5">
                                <!-- Avatar -->
                                <label class="avatar avatar-xxl avatar-circle avatar-uploader profile-cover-avatar" for="editAvatarUploaderModal">
                                    <?php
                                    echo "<img id='editAvatarImgModal' class='avatar-img' src='uploads/" . $row['profile'] . "' height='60px' width='65px'style='border-radius:100%'>";
                                    ?>
                                </label>
                                <!-- End Avatar -->

                                <h1 class="page-header-title"><?php echo "$row[user_name]"; ?>
                                    <i class="bi-patch-check-fill fs-2 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i>
                                </h1>

                                <!-- List -->
                                <ul class="list-inline list-px-2">
                                    <li class="list-inline-item">
                                        <i class="bi-envelope me-1"></i>
                                        <span><?php echo "$row[user_email]";
                                            ?></span>
                                    </li>
                                    <!-- End List -->
                            </div>
                            <!-- End Profile Header -->

                            <!-- Nav -->
                            <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
                                <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                                        <i class="bi-chevron-left"></i>
                                    </a>
                                </span>

                                <span class="hs-nav-scroller-arrow-next" style="display: none;">
                                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                                        <i class="bi-chevron-right"></i>
                                    </a>
                                </span>

                                <ul class="nav nav-tabs align-items-center">
                                    <li class="nav-item">
                                        <a class="nav-link " href="user_profile.php?email=<?php echo urlencode($row['user_email']); ?>">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active disabled" href="#">Teams</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="one_user_project.php?email=<?php echo urlencode($row['user_email']); } ?>">Projects<span class="badge bg-soft-dark text-dark rounded-circle ms-1"><?php echo "$total_projects"; ?></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row align-items-center mb-5">
                                <div class="col">
                                    <h3 class="mb-0">7 teams</h3>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto">
                                    <!-- Nav -->
                                    <ul class="nav nav-segment" id="profileTeamsTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="grid-tab" data-bs-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="true" title="Column view">
                                                <i class="bi-grid"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false" title="List view">
                                                <i class="bi-view-list"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End Nav -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->

                            <!-- Tab Content -->
                            <div class="tab-content" id="profileTeamsTabContent">
                                <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                    <!-- Teams -->
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                                        <div class="col mb-3 mb-lg-5">
                                            <!-- Card -->
                                            <div class="card h-100">
                                                <!-- Body -->
                                                <div class="card-body pb-0">
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-9">
                                                            <h4 class="mb-1">
                                                                <a href="#">#digitalmarketing</a>
                                                            </h4>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col-3 text-end">
                                                            <!-- Dropdown -->
                                                            <div class="dropdowm">
                                                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="bi-three-dots-vertical"></i>
                                                                </button>

                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown1">
                                                                    <a class="dropdown-item" href="#">Rename team</a>
                                                                    <a class="dropdown-item" href="#">Add to favorites</a>
                                                                    <a class="dropdown-item" href="#">Archive team</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                            <!-- End Dropdown -->
                                                        </div>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <p>Our group promotes and sells products and services by leveraging online marketing tactics</p>
                                                </div>
                                                <!-- End Body -->

                                                <!-- Footer -->
                                                <div class="card-footer border-0 pt-0">
                                                    <div class="list-group list-group-flush list-group-no-gutters">
                                                        <!-- List Item -->
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <span class="card-subtitle">Industry:</span>
                                                                </div>
                                                                <!-- End Col -->

                                                                <div class="col-auto">
                                                                    <a class="badge bg-soft-primary text-primary p-2" href="#">Marketing team</a>
                                                                </div>
                                                                <!-- End Col -->
                                                            </div>
                                                        </div>
                                                        <!-- End List Item -->

                                                        <!-- List Item -->
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <span class="card-subtitle">Rated:</span>
                                                                </div>
                                                                <!-- End Col -->

                                                                <div class="col-auto">
                                                                    <!-- Stars -->
                                                                    <div class="d-flex gap-1">
                                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                                        <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                                        <img src="assets/svg/illustrations/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                                                                        <img src="assets/svg/illustrations-light/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                                                                    </div>
                                                                    <!-- End Stars -->
                                                                </div>
                                                                <!-- End Col -->
                                                            </div>
                                                        </div>
                                                        <!-- End List Item -->

                                                        <!-- List Item -->
                                                        <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <span class="card-subtitle">Members:</span>
                                                                </div>
                                                                <!-- End Col -->

                                                                <div class="col-auto">
                                                                    <!-- Avatar Group -->
                                                                    <div class="avatar-group avatar-group-xs avatar-circle">
                                                                        <span class="avatar" data-toggle="tooltip" data-placement="top" title="Ella Lauda">
                                                                            <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                                                                        </span>
                                                                        <span class="avatar" data-toggle="tooltip" data-placement="top" title="David Harrison">
                                                                            <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                                                                        </span>
                                                                        <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Antony Taylor">
                                                                            <span class="avatar-initials">A</span>
                                                                        </span>
                                                                        <span class="avatar avatar-soft-info" data-toggle="tooltip" data-placement="top" title="Sara Iwens">
                                                                            <span class="avatar-initials">S</span>
                                                                        </span>
                                                                        <span class="avatar" data-toggle="tooltip" data-placement="top" title="Finch Hoot">
                                                                            <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                                                                        </span>
                                                                        <span class="avatar avatar-light avatar-circle" data-toggle="tooltip" data-placement="top" title="Sam Kart, Amanda Harvey and 1 more">
                                                                            <span class="avatar-initials">+3</span>
                                                                        </span>
                                                                    </div>
                                                                    <!-- End Avatar Group -->
                                                                </div>
                                                                <!-- End Col -->
                                                            </div>
                                                        </div>
                                                        <!-- End List Item -->
                                                    </div>
                                                </div>
                                                <!-- End Footer -->
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                    </div>
                                    <!-- End Teams -->
                                </div>

                                <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                    <div class="row row-cols-1">
                                        <div class="col mb-3">
                                            <!-- Card -->
                                            <div class="card card-body">
                                                <div class="row align-items-md-center">
                                                    <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                                        <h4><a href="#">#digitalmarketing</a></h4>

                                                        <a class="badge bg-soft-primary text-primary p-2" href="#">Marketing team</a>
                                                    </div>

                                                    <div class="col-3 col-md-auto order-md-last text-end">
                                                        <!-- Dropdown -->
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsListDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bi-three-dots-vertical"></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsListDropdown1">
                                                                <a class="dropdown-item" href="#">Rename team</a>
                                                                <a class="dropdown-item" href="#">Add to favorites</a>
                                                                <a class="dropdown-item" href="#">Archive team</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                        <!-- End Dropdown -->
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col-sm mb-2 mb-sm-0">
                                                        <p>Our group promotes and sells products and services by leveraging online marketing tactics</p>
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col-sm-auto">
                                                        <!-- Stars -->
                                                        <div class="d-flex gap-1 mb-2">
                                                            <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                            <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                            <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                            <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                                                            <img src="assets/svg/illustrations/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                                                            <img src="assets/svg/illustrations-light/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                                                        </div>
                                                        <!-- End Stars -->

                                                        <!-- Avatar Group -->
                                                        <div class="avatar-group avatar-group-xs avatar-circle">
                                                            <span class="avatar" data-toggle="tooltip" data-placement="top" title="Ella Lauda">
                                                                <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                                                            </span>
                                                            <span class="avatar" data-toggle="tooltip" data-placement="top" title="David Harrison">
                                                                <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                                                            </span>
                                                            <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Antony Taylor">
                                                                <span class="avatar-initials">A</span>
                                                            </span>
                                                            <span class="avatar avatar-soft-info" data-toggle="tooltip" data-placement="top" title="Sara Iwens">
                                                                <span class="avatar-initials">S</span>
                                                            </span>
                                                            <span class="avatar" data-toggle="tooltip" data-placement="top" title="Finch Hoot">
                                                                <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                                                            </span>
                                                            <span class="avatar avatar-light avatar-circle" data-toggle="tooltip" data-placement="top" title="Sam Kart, Amanda Harvey and 1 more">
                                                                <span class="avatar-initials">+3</span>
                                                            </span>
                                                        </div>
                                                        <!-- End Avatar Group -->
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                            <!-- End Nav -->


            </main>
            <?php
            if (isset($_POST['update'])) {
                include_once("create_database.php");
                // Handle file upload
                if (isset($_POST['update']) && isset($_FILES['file'])) {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        $profile_header = $_FILES["file"]["name"];
                        $updateQuery = "UPDATE users SET profile_header = '$profile_header', profile_header_updated = 1 WHERE user_email = '$email'";
                        $result3 = mysqli_query($conn, $updateQuery);
                    } else {
                        echo "Error uploading file.";
                    }
                }
                if ($result3) {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" id="alertmsg" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
                        <strong>Success!</strong> Header Updated.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        setTimeout(function() {
                            window.location = "dashboard.php"; // Redirect after 3 seconds
                        }, 3000);
                    </script>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" id="alertmsg" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
                        <strong>Error!</strong> Select Image.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        setTimeout(function() {
                            window.location = "dashboard.php"; // Redirect after 3 seconds
                        }, 3000);
                    </script>
            <?php
                }
            }

            ?>
        <?php
        include_once("user_footer.php");
    } else {
        header("Location: login_user.php");
    }
        ?>
    </body>

    </html>