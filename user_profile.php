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
    <title>Users Dashboard</title>

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
      if (!empty($row['profile_header']) && $row['profile_header_updated'] == 1) {
        $profile_complete++;
      } 

      // Calculate the percentage based on the number of fields completed
      $total_fields = 6; // Total number of fields to track (user_name, profile, user_email, Mobile_no)
      $progress_percentage = round(($profile_complete / $total_fields) * 100);

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
                    <span><?php echo "$row[user_email]";  ?></span>
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
                    <a class="nav-link active disabled" href="#">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="one_user_team.php?email=<?php echo urlencode($row['user_email']); ?>">Teams</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="one_user_project.php?email=<?php echo urlencode($row['user_email']); ?>">Projects<span class="badge bg-soft-dark text-dark rounded-circle ms-1"><?php echo "$total_projects"; ?></span></a>

                  </li>
                  <li class="nav-item ms-auto">
                    <div class="d-flex gap-2">
                      <a class="btn btn-white btn-sm" href="users.php">
                        <i class="bi-person-plus-fill me-1"></i> Go to Users
                      </a>
                      <!-- Dropdown -->
                      <!-- End Dropdown -->
                    </div>
                  </li>
                </ul>
              </div>
              <!-- End Nav -->

              <div class="row">
                <div class="col-lg-4">
                  <!-- Card -->
                  <div class="card card-body mb-3 mb-lg-5">
                    <h5>Complete your profile</h5>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="progress flex-grow-1">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $progress_percentage; ?>%" aria-valuenow="<?php echo $progress_percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="ms-4"><?php echo round($progress_percentage, 0); ?>%</span>
                    </div>
                  </div>
                  <!-- End Card -->

                  <!-- Card -->
                  <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                      <h4 class="card-header-title">Profile</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                      <ul class="list-unstyled list-py-2 text-dark mb-0">
                        <li class="pb-0"><span class="card-subtitle">About</span></li>
                        <!-- <li><i class="bi-person dropdown-item-icon"></i> Mark Williams</li> -->
                        <li><i class="bi-person dropdown-item-icon"></i><?php echo "$row[user_name]"; ?></li>

                        <!-- <li class="pt-4 pb-0"><span class="card-subtitle">Contacts</span></li> -->
                        <li class="pt-4 pb-0"><span class="card-subtitle">Contacts</li>
                        <li><i class="bi-at dropdown-item-icon"></i><?php echo "$row[user_email]" ?></li>
                        <li><i class="bi-phone dropdown-item-icon"></i><?php echo "$row[Mobile_no]";} ?></li>

                        <li class="pt-4 pb-0"><span class="card-subtitle">Teams</span></li>
                        <li class="fs-6 text-body"><i class="bi-people dropdown-item-icon"></i> You are not a member of any teams</li>
                        <li class="fs-6 text-body"><i class="bi-stickies dropdown-item-icon"></i> You are not working on any projects</li>
                      </ul>
                    </div>
                    <!-- End Body -->
                  </div>
                  <!-- End Card -->

                  <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-lg-8">

                  <!-- Card -->
                  <div class="card card-centered mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                      <h4 class="card-header-title">Projects</h4>

                      <!-- Dropdown -->
                      <div class="dropdown">
                        <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="projectReportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi-three-dots-vertical"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="projectReportDropdown">
                          <span class="dropdown-header">Settings</span>

                          <a class="dropdown-item" href="#">
                            <i class="bi-share-fill dropdown-item-icon"></i> Share connections
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits
                          </a>

                          <div class="dropdown-divider"></div>

                          <span class="dropdown-header">Feedback</span>

                          <a class="dropdown-item" href="#">
                            <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                          </a>
                        </div>
                      </div>
                      <!-- End Dropdown -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body card-body-height card-body-centered">
                      <img class="avatar avatar-xxl mb-3" src="assets/svg/illustrations/oc-error.svg" alt="Image Description" data-hs-theme-appearance="default">
                      <img class="avatar avatar-xxl mb-3" src="assets/svg/illustrations-light/oc-error.svg" alt="Image Description" data-hs-theme-appearance="dark">
                      <p class="card-text">No data to show</p>
                      <a class="btn btn-white btn-sm" href="one_user_project.php">Start your Projects</a>
                    </div>
                    <!-- End Body -->
                  </div>
                  <!-- End Card -->
                </div>
                <!-- End Col -->
                 
                <div class="col-sm-6">
                  <!-- <div class="card card-centered mb-3 mb-lg-5"> -->

                    <!-- Card -->
                    <div class="card h-100">
                      <!-- Header -->
                      <div class="card-header">
                        <h4 class="card-header-title">Teams</h4>
                      </div>
                      <!-- End Header -->

                      <!-- Body -->
                      <div class="card-body">
                        <ul class="nav nav-pills card-nav card-nav-vertical nav-pills">
                          <!-- Item -->
                          <li>
                            <a class="nav-link" href="#">
                              <div class="d-flex">
                                <div class="flex-shrink-0">
                                  <i class="bi-people-fill nav-icon text-dark"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                  <span class="d-block text-dark">#digitalmarketing</span>
                                  <small class="d-block text-muted">8 members</small>
                                </div>
                              </div>
                            </a>
                          </li>
                          <!-- End Item -->

                          <!-- Item -->
                          <li>
                            <a class="nav-link" href="#">
                              <div class="d-flex">
                                <div class="flex-shrink-0">
                                  <i class="bi-people-fill nav-icon text-dark"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                  <span class="d-block text-dark">#ethereum</span>
                                  <small class="d-block text-muted">14 members</small>
                                </div>
                              </div>
                            </a>
                          </li>
                          <!-- End Item -->

                          <!-- Item -->
                          <li>
                            <a class="nav-link" href="#">
                              <div class="d-flex">
                                <div class="flex-shrink-0">
                                  <i class="bi-people-fill nav-icon text-dark"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                  <span class="d-block text-dark">#conference</span>
                                  <small class="d-block text-muted">3 members</small>
                                </div>
                              </div>
                            </a>
                          </li>
                          <!-- End Item -->

                          <!-- Item -->
                          <li>
                            <a class="nav-link" href="#">
                              <div class="d-flex">
                                <div class="flex-shrink-0">
                                  <i class="bi-people-fill nav-icon text-dark"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                  <span class="d-block text-dark">#supportteam</span>
                                  <small class="d-block text-muted">3 members</small>
                                </div>
                              </div>
                            </a>
                          </li>
                          <!-- End Item -->

                          <!-- Item -->
                          <li>
                            <a class="nav-link" href="#">
                              <div class="d-flex">
                                <div class="flex-shrink-0">
                                  <i class="bi-people-fill nav-icon text-dark"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                  <span class="d-block text-dark">#invoices</span>
                                  <small class="d-block text-muted">3 members</small>
                                </div>
                              </div>
                            </a>
                          </li>
                          <!-- End Item -->
                        </ul>
                      </div>
                      <!-- End Body -->

                      <!-- Footer -->
                      <a class="card-footer text-center" href="one_user_team.php">
                        View all teams <i class="bi-chevron-right"></i>
                      </a>
                      <!-- End Footer -->
                    </div>
                    <!-- End Card -->
                  </div>
              </div>
              <!-- End Row -->
            </div>
            <!-- End Row -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
        </div>
        <!-- End Content -->

        <!-- Footer -->


      </main>
    <?php
    include_once("user_footer.php");
  } else {
    header("Location: login_user.php");
  }
    ?>
  </body>

  </html>