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
    }
    ?>
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-end mb-3">
          <div class="col-sm mb-2 mb-sm-0">

            <h1 class="page-header-title">Teams</h1>
          </div>
          <!-- End Col -->

          <div class="col-sm-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shareWithPeopleModal">
              <i class="bi-plus me-1"></i> Add team
            </button>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->

        <!-- Nav -->
        <!-- Nav -->
        <div class="js-nav-scroller hs-nav-scroller-horizontal">
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

          <ul class="nav nav-tabs page-header-tabs" id="projectsTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="user_teams.php">Teams</a>
            </li>
          </ul>
        </div>
        <!-- End Nav -->
      </div>
      <!-- End Page Header -->

      <!-- Card -->
      <div class="card">
        <!-- Header -->
        <div class="card-header card-header-content-md-between">
          <div class="mb-2 mb-md-0">
            <form>
              <!-- Search -->
              <div class="input-group input-group-merge input-group-borderless">
                <div class="input-group-prepend input-group-text">
                  <i class="bi-search"></i>
                </div>
                <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
              </div>
              <!-- End Search -->
            </form>
          </div>
          <!-- End Col -->

          <div class="d-grid d-sm-flex align-items-sm-center gap-2">
            <!-- Datatable Info -->
            <div id="datatableCounterInfo" style="display: none;">
              <div class="d-flex align-items-center">
                <span class="fs-5 me-3">
                  <span id="datatableCounter">0</span> Selected
                </span>

                <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                  <i class="bi-trash"></i> Delete
                </a>
              </div>
            </div>
            <!-- End Filter Collapse Trigger -->
          </div>
        </div>
        <!-- End Header -->
        <!-- End Filter Search Collapse -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
          <table id="datatable" class="table table-borderless table-thead-bordered card-table" data-hs-datatables-options='{
                   "autoWidth": false,
                   "columnDefs": [{
                      "targets": [0, 6],
                      "orderable": false
                    }],
                   "columns": [
                      null,
                      null,
                      { "width": "35%" },
                      null,
                      null,
                      null,
                      null
                    ],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 8,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
            <thead class="thead-light">
              <tr>
                <th scope="col" class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                    <label class="form-check-label" for="datatableCheckAll"></label>
                  </div>
                </th>
                <th scope="col" class="table-column-ps-0">Team</th>
                <th scope="col" style="min-width: 20rem;">Description</th>
                <th scope="col">Industry</th>
                <th scope="col">Rated</th>
                <th scope="col">Members</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck1">
                    <label class="form-check-label" for="teamDataCheck1"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#digitalmarketing</a></td>
                <td>Our group promotes and sells products and services by leveraging online marketing tactics</td>
                <td><a class="badge bg-soft-primary text-primary p-2" href="#">Marketing team</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Ella Lauda">
                      <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                      <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Antony Taylor">
                      <span class="avatar-initials">A</span>
                    </span>
                    <span class="avatar avatar-soft-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Sara Iwens">
                      <span class="avatar-initials">S</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Finch Hoot">
                      <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-light avatar-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Sam Kart, Amanda Harvey and 1 more">
                      <span class="avatar-initials">+3</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown1">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck2">
                    <label class="form-check-label" for="teamDataCheck2"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#ethereum</a></td>
                <td>Focusing on innovative and disruptive business models</td>
                <td><a class="badge bg-soft-dark text-dark p-2" href="#">Blockchain</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Sam Kart">
                      <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Teresa Eyker">
                      <span class="avatar-initials">T</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Amanda Harvey">
                      <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                      <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Olivier L.">
                      <span class="avatar-initials">O</span>
                    </span>
                    <span class="avatar avatar-light avatar-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Brian Halligan, Rachel Doe and 7 more">
                      <span class="avatar-initials">+9</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown2">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck3">
                    <label class="form-check-label" for="teamDataCheck3"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#conference</a></td>
                <td>Online meeting services group</td>
                <td><a class="badge bg-soft-info text-info p-2" href="#">Marketing team</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Costa Quinn">
                      <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Clarice Boone">
                      <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Zack Ins">
                      <span class="avatar-initials">Z</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown3">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck4">
                    <label class="form-check-label" for="teamDataCheck4"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#supportteam</a></td>
                <td>Keep in touch and stay productive with us</td>
                <td><a class="badge bg-soft-danger text-danger p-2" href="#">Customer service</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Costa Quinn">
                      <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Clarice Boone">
                      <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Adam Keep">
                      <span class="avatar-initials">A</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown4">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck5">
                    <label class="form-check-label" for="teamDataCheck5"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#invoices</a></td>
                <td>This group serves online money transfers as an electronic alternative to paper methods</td>
                <td><a class="badge bg-soft-primary text-primary p-2" href="#">Online payment</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Finch Hoot">
                      <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Bob Bardly">
                      <span class="avatar-initials">B</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Linda Bates">
                      <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Ella Lauda">
                      <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown5" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown5">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck6">
                    <label class="form-check-label" for="teamDataCheck6"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#payments</a></td>
                <td>Our responsibility to manage the money in this organization</td>
                <td><a class="badge bg-soft-info text-info p-2" href="#">Finance</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Finch Hoot">
                      <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Bob Bardly">
                      <span class="avatar-initials">B</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Linda Bates">
                      <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Ella Lauda">
                      <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown6" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown6">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck7">
                    <label class="form-check-label" for="teamDataCheck7"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#event</a></td>
                <td>Because we love to know what's going on & share great ideas</td>
                <td><a class="badge bg-soft-dark text-dark p-2" href="#">Organizers</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                    <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Costa Quinn">
                      <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Bob Bardly">
                      <span class="avatar-initials">B</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Clarice Boone">
                      <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Sam Kart">
                      <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Daniel Cs.">
                      <span class="avatar-initials">D</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown7" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown7">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck8">
                    <label class="form-check-label" for="teamDataCheck8"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#softwaretester</a></td>
                <td>Software testers play a critical role in application development. They are quality assurance experts who put applications</td>
                <td><a class="badge bg-soft-danger text-danger p-2" href="#">Software</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-half.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                    <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Bob Bardly">
                      <span class="avatar-initials">B</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Linda Bates">
                      <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Clarice Boone">
                      <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Adam Keep">
                      <span class="avatar-initials">A</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown8" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown8">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck9">
                    <label class="form-check-label" for="teamDataCheck9"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#sales</a></td>
                <td>Managing a sales team is no easy task. You have the potential to either make or break your sales reps.</td>
                <td><a class="badge bg-soft-primary text-primary p-2" href="#">Sales</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Ella Lauda">
                      <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                      <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Finch Hoot">
                      <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown9" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown9">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck10">
                    <label class="form-check-label" for="teamDataCheck10"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#webdev</a></td>
                <td>Web talents</td>
                <td><a class="badge bg-soft-dark text-dark p-2" href="#">Development</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar avatar-soft-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Teresa Eyker">
                      <span class="avatar-initials">T</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                      <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Olivier L.">
                      <span class="avatar-initials">O</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown10" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown10">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck11">
                    <label class="form-check-label" for="teamDataCheck11"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#socialteam</a></td>
                <td>Team that manages and runs socials accounts of the company.</td>
                <td><a class="badge bg-soft-info text-info p-2" href="#">Marketing team</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                    <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="default">
                    <img src="assets/svg/illustrations-light/star-muted.svg" alt="Review rating" width="14" data-hs-theme-appearance="dark">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Costa Quinn">
                      <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Zack Ins">
                      <span class="avatar-initials">Z</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown11" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown11">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="teamDataCheck12">
                    <label class="form-check-label" for="teamDataCheck12"></label>
                  </div>
                </td>
                <td class="table-column-ps-0"><a href="#">#design</a></td>
                <td>Creative minds</td>
                <td><a class="badge bg-soft-primary text-primary p-2" href="#">Design</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                    <img src="assets/svg/illustrations/star.svg" alt="Review rating" width="14">
                  </div>
                </td>
                <td>
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Ella Lauda">
                      <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                      <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Antony Taylor">
                      <span class="avatar-initials">A</span>
                    </span>
                    <span class="avatar avatar-soft-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Sara Iwens">
                      <span class="avatar-initials">S</span>
                    </span>
                    <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Finch Hoot">
                      <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                    </span>
                    <span class="avatar avatar-light avatar-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Sam Kart, Amanda Harvey and 1 more">
                      <span class="avatar-initials">+3</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm" id="teamsDropdown12" data-bs-toggle="dropdown" aria-expanded="false">
                      More <i class="bi-chevron-down ms-1"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown12">
                      <a class="dropdown-item" href="#">Rename team</a>
                      <a class="dropdown-item" href="#">Add to favorites</a>
                      <a class="dropdown-item" href="#">Archive team</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="#">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
          <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
            <div class="col-sm mb-2 mb-sm-0">
              <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                <span class="me-2">Showing:</span>

                <!-- Select -->
                <div class="tom-select-custom">
                  <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8" selected>8</option>
                    <option value="12">12</option>
                  </select>
                </div>
                <!-- End Select -->

                <span class="text-secondary me-2">of</span>

                <!-- Pagination Quantity -->
                <span id="datatableWithPaginationInfoTotalQty"></span>
              </div>
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
              <div class="d-flex justify-content-center justify-content-sm-end">
                <!-- Pagination -->
                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Footer -->
      </div>
      <!-- End Card -->
    </div>
    <!-- End Content -->

    <!-- Footer -->

  
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>

    <!-- End Footer -->
  </main>
  <div class="modal fade" id="shareWithPeopleModal" tabindex="-1" aria-labelledby="shareWithPeopleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="shareWithPeopleModalLabel">Invite users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Body -->
        <div class="modal-body">
          <!-- Form -->
          <div class="mb-4">
            <div class="input-group mb-2 mb-sm-0">
              <input type="text" class="form-control" name="fullName" placeholder="Search name or emails" aria-label="Search name or emails">

              <div class="input-group-append input-group-append-last-sm-down-none">
                <!-- Select -->
                <div class="tom-select-custom tom-select-custom-end">
                  <select class="js-select form-select tom-select-custom-form-select-invite-user" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true,
                            "dropdownWidth": "11rem"
                          }'>
                    <option value="guest" selected>Guest</option>
                    <option value="can edit">Can edit</option>
                    <option value="can comment">Can comment</option>
                    <option value="full access">Full access</option>
                  </select>
                </div>
                <!-- End Select -->

                <a class="btn btn-primary d-none d-sm-inline-block" href="javascript:;">Invite</a>
              </div>
            </div>

            <a class="btn btn-primary w-100 d-sm-none" href="javascript:;">Invite</a>
          </div>
          <!-- End Form -->

          <!-- List Group -->
          <ul class="list-unstyled list-py-2">
            <!-- Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <span class="icon icon-soft-dark icon-sm icon-circle">
                    <i class="bi-people-fill"></i>
                  </span>
                </div>

                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="text-body mb-0">#digitalmarketing</h5>
                      <span class="d-block fs-6">8 members</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest">Guest</option>
                          <option value="can edit" selected>Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                    <!-- End Col -->
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End Item -->

            <!-- Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                  </div>
                </div>

                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="text-body mb-0">David Harrison</h5>
                      <span class="d-block fs-6">david@site.com</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest">Guest</option>
                          <option value="can edit" selected>Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                    <!-- End Col -->
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End Item -->

            <!-- Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                  </div>
                </div>

                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="text-body mb-0">Ella Lauda <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                      <span class="d-block fs-6">Markvt@site.com</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest">Guest</option>
                          <option value="can edit" selected>Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                    <!-- End Col -->
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End Item -->

            <!-- Item -->
            <li>
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <span class="icon icon-soft-dark icon-sm icon-circle">
                    <i class="bi-people-fill"></i>
                  </span>
                </div>

                <div class="flex-grow-1 ms-3">
                  <div class="row align-items-center">
                    <div class="col-sm">
                      <h5 class="text-body mb-0">#conference</h5>
                      <span class="d-block fs-6">3 members</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                      <!-- Select -->
                      <div class="tom-select-custom tom-select-custom-sm-end">
                        <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "11rem"
                                }'>
                          <option value="guest">Guest</option>
                          <option value="can edit" selected>Can edit</option>
                          <option value="can comment">Can comment</option>
                          <option value="full access">Full access</option>
                          <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                        </select>
                      </div>
                      <!-- End Select -->
                    </div>
                    <!-- End Col -->
                  </div>
                  <!-- End Row -->
                </div>
              </div>
            </li>
            <!-- End Item -->
          </ul>
          <!-- End List Group -->

          <!-- Form Switch -->
          <label class="row form-check form-switch" for="addTeamPreferencesNewProjectSwitch1">
            <span class="col-8 col-sm-9 ms-0">
              <i class="bi-bell text-primary me-2"></i>
              <span class="text-dark">Inform all project members</span>
            </span>
            <span class="col-4 col-sm-3 text-end">
              <input type="checkbox" class="form-check-input" id="addTeamPreferencesNewProjectSwitch1" checked>
            </span>
          </label>
          <!-- End Form Switch -->
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div class="modal-footer">
          <div class="row align-items-center flex-grow-1 mx-n2">
            <div class="col-sm-9 mb-2 mb-sm-0">
              <input type="hidden" id="publicShareLinkClipboard" value="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/">

              <p class="modal-footer-text">The public share <a class="link" href="#">link settings</a>
                <i class="bi-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="The public share link allows people to view the project without giving access to full collaboration features."></i>
              </p>
            </div>
            <!-- End Col -->

            <div class="col-sm-3 text-sm-end">
              <a class="js-clipboard btn btn-white btn-sm text-nowrap" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard!" data-hs-clipboard-options='{
                  "type": "tooltip",
                  "successText": "Copied!",
                  "contentTarget": "#publicShareLinkClipboard",
                  "container": "#shareWithPeopleModal"
                 }'>
                <i class="bi-link me-1"></i> Copy link</a>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </div>
  <script src="assets/js/vendor.min.js"></script>
  <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF DATATABLES
      // =======================================================
      HSCore.components.HSDatatables.init($('#datatable'), {
        select: {
          style: 'multi',
          selector: 'td:first-child input[type="checkbox"]',
          classMap: {
            checkAll: '#datatableCheckAll',
            counter: '#datatableCounter',
            counterInfo: '#datatableCounterInfo'
          }
        },
        language: {
          zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
        }
      });

      const datatable = HSCore.components.HSDatatables.getItem(0)

      $('.js-datatable-filter').on('change', function() {
        var $this = $(this),
          elVal = $this.val(),
          targetColumnIndex = $this.data('target-column-index');

        if (elVal === 'null') elVal = ''

        datatable.column(targetColumnIndex).search(elVal).draw();
      });
    });
  </script>
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