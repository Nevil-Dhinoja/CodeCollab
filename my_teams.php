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
    <title>Dashboard</title>

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
                    <form method="post" enctype="multipart/form-data">
                      <input type="file" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder" name="file" data-hs-file-attach-options='{
                            "textTarget": "#profileCoverImg",
                            "mode": "image",
                            "targetAttr": "src",
                            "allowTypes": [".png", ".jpeg", ".jpg"]
                         }'>
                      <Button class="profile-cover-uploader-label btn btn-sm btn-white" for="" type="submit" name="update">
                        <i class="bi-camera-fill"></i>
                        <span class="d-none d-sm-inline-block ms-1" name="update" type="submit">Update Header</span>
                      </Button>
                    </form>
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
                  <input type="file" class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal" name="profile" data-hs-file-attach-options='{
                          "textTarget": "#editAvatarImgModal",
                          "mode": "image",
                          "targetAttr": "src",
                          "allowTypes": [".png", ".jpeg", ".jpg"]
                       }'>

                  <span class="avatar-uploader-trigger">
                    <i class="bi-pencil-fill avatar-uploader-icon shadow-sm"></i>
                  </span>
                </label>
                <!-- End Avatar -->

                <h1 class="page-header-title"><?php echo "$row[user_name]"; ?>
                  <i class="bi-patch-check-fill fs-2 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i>
                </h1>

                <!-- List -->
                <ul class="list-inline list-px-2">
                  <li class="list-inline-item">
                    <i class="bi-envelope me-1"></i>
                    <span><?php echo "$row[user_email]"; } ?></span>
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
                    <a class="nav-link " href="my_profile.php">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active disabled" href="user_teams.php">Teams</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="user_project.php">Projects <span class="badge bg-soft-dark text-dark rounded-circle ms-1">3</span></a>
                  </li>

                  <li class="nav-item ms-auto">
                    <div class="d-flex gap-2">
                      <a class="btn btn-white btn-sm" href="account-settings.html">
                        <i class="bi-person-plus-fill me-1"></i> Edit profile
                      </a>

                      <a class="btn btn-white btn-icon btn-sm" href="#">
                        <i class="bi-list-ul me-1"></i>
                      </a>

                      <!-- Dropdown -->
                      <div class="dropdown nav-scroller-dropdown">
                        <button type="button" class="btn btn-white btn-icon btn-sm" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi-three-dots-vertical"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="profileDropdown">
                          <span class="dropdown-header">Settings</span>

                          <a class="dropdown-item" href="#">
                            <i class="bi-share-fill dropdown-item-icon"></i> Share profile
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="bi-slash-circle dropdown-item-icon"></i> Block page and profile
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits
                          </a>

                          <div class="dropdown-divider"></div>

                          <span class="dropdown-header">Feedback</span>

                          <a class="dropdown-item" href="#">
                            <i class="bi-flag dropdown-item-icon"></i> Report
                          </a>
                        </div>
                      </div>
                      <!-- End Dropdown -->
                    </div>
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

                <div class="col mb-3 mb-lg-5">
                  <!-- Card -->
                  <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body pb-0">
                      <div class="row align-items-center mb-2">
                        <div class="col-9">
                          <h4 class="mb-1">
                            <a href="#">#ethereum</a>
                          </h4>
                        </div>

                        <div class="col-3 text-end">
                          <!-- Dropdown -->
                          <div class="dropdowm">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown2">
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

                      <p>Focusing on innovative and disruptive business models</p>
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
                              <a class="badge bg-soft-dark text-dark p-2" href="#">Blockchain</a>
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
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                                <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
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
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Sam Kart">
                                  <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-danger" data-toggle="tooltip" data-placement="top" title="Teresa Eyker">
                                  <span class="avatar-initials">T</span>
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Amanda Harvey">
                                  <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="David Harrison">
                                  <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-warning" data-toggle="tooltip" data-placement="top" title="Olivier L.">
                                  <span class="avatar-initials">O</span>
                                </span>
                                <span class="avatar avatar-light avatar-circle" data-toggle="tooltip" data-placement="top" title="Brian Halligan, Rachel Doe and 7 more">
                                  <span class="avatar-initials">+9</span>
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

                <div class="col mb-3 mb-lg-5">
                  <!-- Card -->
                  <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body pb-0">
                      <div class="row align-items-center mb-2">
                        <div class="col-9">
                          <h4 class="mb-1">
                            <a href="#">#conference</a>
                          </h4>
                        </div>

                        <div class="col-3 text-end">
                          <!-- Dropdown -->
                          <div class="dropdowm">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown3">
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

                      <p>Online meeting services group</p>
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
                              <a class="badge bg-soft-info text-info p-2" href="#">Marketing team</a>
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
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Costa Quinn">
                                  <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Clarice Boone">
                                  <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Zack Ins">
                                  <span class="avatar-initials">Z</span>
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

                <div class="col mb-3 mb-lg-5">
                  <!-- Card -->
                  <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body pb-0">
                      <div class="row align-items-center mb-2">
                        <div class="col-9">
                          <h4 class="mb-1">
                            <a href="#">#supportteam</a>
                          </h4>
                        </div>

                        <div class="col-3 text-end">
                          <!-- Dropdown -->
                          <div class="dropdowm">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsDropdown5" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown5">
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

                      <p>Keep in touch and stay productive with us</p>
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
                              <a class="badge bg-soft-danger text-danger p-2" href="#">Customer service</a>
                            </div>

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
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Costa Quinn">
                                  <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Clarice Boone">
                                  <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Adam Keep">
                                  <span class="avatar-initials">A</span>
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

                <div class="col mb-3 mb-lg-5">
                  <!-- Card -->
                  <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body pb-0">
                      <div class="row align-items-center mb-2">
                        <div class="col-9">
                          <h4 class="mb-1">
                            <a href="#">#invoices</a>
                          </h4>
                        </div>

                        <div class="col-3 text-end">
                          <!-- Dropdown -->
                          <div class="dropdowm">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown4">
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

                      <p>This group serves online money transfers as an electronic alternative to paper methods</p>
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
                              <a class="badge bg-soft-primary text-primary p-2" href="#">Online payment</a>
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
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                                <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                              </div>
                              <!-- End Stars -->
                            </div>

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
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Finch Hoot">
                                  <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Bob Bardly">
                                  <span class="avatar-initials">B</span>
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Linda Bates">
                                  <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Ella Lauda">
                                  <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
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

                <div class="col mb-3 mb-lg-5">
                  <!-- Card -->
                  <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body pb-0">
                      <div class="row align-items-center mb-2">
                        <div class="col-9">
                          <h4 class="mb-1">
                            <a href="#">#payments</a>
                          </h4>
                        </div>

                        <div class="col-3 text-end">
                          <!-- Dropdown -->
                          <div class="dropdowm">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsDropdown6" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown6">
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

                      <p>Our responsibility to manage the money in this organization</p>
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
                              <a class="badge bg-soft-info text-info p-2" href="#">Finance</a>
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
                                <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
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
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Amanda Harvey">
                                  <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="David Harrison">
                                  <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-info" data-toggle="tooltip" data-placement="top" title="Lisa Iston">
                                  <span class="avatar-initials">L</span>
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Sam Kart">
                                  <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Zack Ins">
                                  <span class="avatar-initials">Z</span>
                                </span>
                                <span class="avatar avatar-light avatar-circle" data-toggle="tooltip" data-placement="top" title="Lewis Clarke, Chris Mathew and 3 more">
                                  <span class="avatar-initials">+5</span>
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

                <div class="col mb-3 mb-lg-5">
                  <!-- Card -->
                  <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body pb-0">
                      <div class="row align-items-center mb-2">
                        <div class="col-9">
                          <h4 class="mb-1">
                            <a href="#">#event</a>
                          </h4>
                        </div>

                        <div class="col-3 text-end">
                          <!-- Dropdown -->
                          <div class="dropdowm">
                            <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsDropdown7" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi-three-dots-vertical"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown7">
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

                      <p>Because we love to know what's going on & share great ideas</p>
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
                              <a class="badge bg-soft-dark text-dark p-2" href="#">Organizers</a>
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
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                                <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                                <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
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
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Costa Quinn">
                                  <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-info" data-toggle="tooltip" data-placement="top" title="Bob Bardly">
                                  <span class="avatar-initials">B</span>
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Clarice Boone">
                                  <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                                </span>
                                <span class="avatar" data-toggle="tooltip" data-placement="top" title="Sam Kart">
                                  <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                                </span>
                                <span class="avatar avatar-soft-primary" data-toggle="tooltip" data-placement="top" title="Daniel Cs.">
                                  <span class="avatar-initials">D</span>
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

                <div class="col mb-3">
                  <!-- Card -->
                  <div class="card card-body">
                    <div class="row align-items-md-center">
                      <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                        <h4><a href="#">#ethereum</a></h4>

                        <a class="badge bg-soft-dark text-dark p-2" href="#">Blockchain</a>
                      </div>

                      <div class="col-3 col-md-auto order-md-last text-end">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-three-dots-vertical"></i>
                          </button>

                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsListDropdown2">
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
                        <p>Focusing on innovative and disruptive business models</p>
                      </div>
                      <!-- End Col -->

                      <div class="col-sm-auto">
                        <!-- Stars -->
                        <div class="d-flex gap-1 mb-2">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                          <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                        </div>
                        <!-- End Stars -->

                        <!-- Avatar Group -->
                        <div class="avatar-group avatar-group-xs avatar-circle">
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Sam Kart">
                            <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-danger" data-toggle="tooltip" data-placement="top" title="Teresa Eyker">
                            <span class="avatar-initials">T</span>
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Amanda Harvey">
                            <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="David Harrison">
                            <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-warning" data-toggle="tooltip" data-placement="top" title="Olivier L.">
                            <span class="avatar-initials">O</span>
                          </span>
                          <span class="avatar avatar-light avatar-circle" data-toggle="tooltip" data-placement="top" title="Brian Halligan, Rachel Doe and 7 more">
                            <span class="avatar-initials">+9</span>
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

                <div class="col mb-3">
                  <!-- Card -->
                  <div class="card card-body">
                    <div class="row align-items-md-center">
                      <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                        <h4><a href="#">#conference</a></h4>

                        <a class="badge bg-soft-info text-info p-2" href="#">Marketing team</a>
                      </div>

                      <div class="col-3 col-md-auto order-md-last text-end">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsListDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-three-dots-vertical"></i>
                          </button>

                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsListDropdown3">
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
                        <p>Online meeting services group</p>
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
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Costa Quinn">
                            <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Clarice Boone">
                            <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Zack Ins">
                            <span class="avatar-initials">Z</span>
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

                <div class="col mb-3">
                  <!-- Card -->
                  <div class="card card-body">
                    <div class="row align-items-md-center">
                      <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                        <h4><a href="#">#supportteam</a></h4>

                        <a class="badge bg-soft-danger text-danger p-2" href="#">Customer service</a>
                      </div>

                      <div class="col-3 col-md-auto order-md-last text-end">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsListDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-three-dots-vertical"></i>
                          </button>

                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsListDropdown4">
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
                        <p>Keep in touch and stay productive with us</p>
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
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Costa Quinn">
                            <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Clarice Boone">
                            <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Adam Keep">
                            <span class="avatar-initials">A</span>
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

                <div class="col mb-3">
                  <!-- Card -->
                  <div class="card card-body">
                    <div class="row align-items-md-center">
                      <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                        <h4><a href="#">#invoices</a></h4>

                        <a class="badge bg-soft-primary text-primary p-2" href="#">Online payment</a>
                      </div>

                      <div class="col-3 col-md-auto order-md-last text-end">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsListDropdown5" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-three-dots-vertical"></i>
                          </button>

                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsListDropdown5">
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
                        <p>This group serves online money transfers as an electronic alternative to paper methods</p>
                      </div>
                      <!-- End Col -->

                      <div class="col-sm-auto">
                        <!-- Stars -->
                        <div class="d-flex gap-1 mb-2">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                          <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                        </div>
                        <!-- End Stars -->

                        <!-- Avatar Group -->
                        <div class="avatar-group avatar-group-xs avatar-circle">
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Finch Hoot">
                            <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Bob Bardly">
                            <span class="avatar-initials">B</span>
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Linda Bates">
                            <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Ella Lauda">
                            <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
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

                <div class="col mb-3">
                  <!-- Card -->
                  <div class="card card-body">
                    <div class="row align-items-md-center">
                      <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                        <h4><a href="#">#payments</a></h4>

                        <a class="badge bg-soft-info text-info p-2" href="#">Finance</a>
                      </div>

                      <div class="col-3 col-md-auto order-md-last text-end">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsListDropdown6" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-three-dots-vertical"></i>
                          </button>

                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsListDropdown6">
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
                        <p>Our responsibility to manage the money in this organization</p>
                      </div>
                      <!-- End Col -->

                      <div class="col-sm-auto">
                        <!-- Stars -->
                        <div class="d-flex gap-1 mb-2">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                        </div>
                        <!-- End Stars -->

                        <!-- Avatar Group -->
                        <div class="avatar-group avatar-group-xs avatar-circle">
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Amanda Harvey">
                            <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="David Harrison">
                            <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-info" data-toggle="tooltip" data-placement="top" title="Lisa Iston">
                            <span class="avatar-initials">L</span>
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Sam Kart">
                            <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-dark" data-toggle="tooltip" data-placement="top" title="Zack Ins">
                            <span class="avatar-initials">Z</span>
                          </span>
                          <span class="avatar avatar-light avatar-circle" data-toggle="tooltip" data-placement="top" title="Lewis Clarke, Chris Mathew and 3 more">
                            <span class="avatar-initials">+5</span>
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

                <div class="col mb-3">
                  <!-- Card -->
                  <div class="card card-body">
                    <div class="row align-items-md-center">
                      <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                        <h4><a href="#">#event</a></h4>

                        <a class="badge bg-soft-dark text-dark p-2" href="#">Organizers</a>
                      </div>

                      <div class="col-3 col-md-auto order-md-last text-end">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="teamsListDropdown7" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-three-dots-vertical"></i>
                          </button>

                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsListDropdown7">
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
                        <p>Because we love to know what's going on &amp; share great ideas</p>
                      </div>
                      <!-- End Col -->

                      <div class="col-sm-auto">
                        <!-- Stars -->
                        <div class="d-flex gap-1 mb-2">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                          <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                          <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                          <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                          <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                        </div>
                        <!-- End Stars -->

                        <!-- Avatar Group -->
                        <div class="avatar-group avatar-group-xs avatar-circle">
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Costa Quinn">
                            <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-info" data-toggle="tooltip" data-placement="top" title="Bob Bardly">
                            <span class="avatar-initials">B</span>
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Clarice Boone">
                            <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                          </span>
                          <span class="avatar" data-toggle="tooltip" data-placement="top" title="Sam Kart">
                            <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                          </span>
                          <span class="avatar avatar-soft-primary" data-toggle="tooltip" data-placement="top" title="Daniel Cs.">
                            <span class="avatar-initials">D</span>
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