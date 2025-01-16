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
    <title>Public Projects</title>

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

    <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-end">
          <div class="col-sm mb-2 mb-sm-0">
            <nav aria-label="breadcrumb">
            </nav>

            <h1 class="page-header-title">Public Projects</h1>
          </div>
          <!-- End Col -->

          <div class="col-sm-auto">
            <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#newProjectModal">
              <i class="bi-plus me-1"></i> New project
            </a>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->

        <!-- Nav -->
        <ul class="nav nav-tabs page-header-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="projects.html">
              Projects <span class="badge bg-soft-dark text-dark ms-1"></span>
            </a>
          </li>
        </ul>
        <!-- End Nav -->
      </div>
      <!-- End Page Header -->

      <!-- Card -->
      <div class="card mb-3 mb-lg-5">
        <!-- Body -->
        <div class="card-body">
          <div class="d-flex align-items-md-center">
            <div class="flex-shrink-0">
              <span class="display-3 text-dark">24</span>
            </div>

            <div class="flex-grow-1 ms-3">
              <div class="row mx-md-n3">
                <div class="col-md px-md-4">
                  <span class="d-block">Total projects</span>
                  <span class="badge bg-soft-danger text-danger rounded-pill p-1">
                    <i class="bi-graph-down"></i> -2 late in due
                  </span>
                </div>
                <!-- End Col -->

                <div class="col-md-9 col-lg-10 column-md-divider px-md-4">
                  <div class="row justify-content-start mb-2">
                    <div class="col-auto">
                      <span class="legend-indicator bg-primary"></span>
                      In progress (10)
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                      <span class="legend-indicator bg-success"></span>
                      Completed (8)
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                      <span class="legend-indicator"></span>
                      To do (6)
                    </div>
                    <!-- End Col -->
                  </div>
                  <!-- End Row -->

                  <!-- Progress -->
                  <div class="progress rounded-pill">
                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <!-- End Progress -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
        </div>
        <!-- End Body -->
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="card">
        <!-- Header -->
        <div class="card-header card-header-content-md-between">
          <div class="mb-2 mb-md-0">
            <form>
              <!-- Search -->
              <div class="input-group input-group-merge input-group-flush">
                <div class="input-group-prepend input-group-text">
                  <i class="bi-search"></i>
                </div>
                <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
              </div>
              <!-- End Search -->
            </form>
          </div>

          <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">
            <!-- Datatable Info -->
            <div id="datatableCounterInfo" style="display: none;">
              <div class="d-flex align-items-center">
                <span class="fs-5 me-3">
                  <span id="datatableCounter">0</span>
                  Selected
                </span>
                <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                  <i class="bi-trash"></i> Delete
                </a>
              </div>
            </div>
            <!-- End Datatable Info -->

            <!-- Dropdown -->
            <div class="dropdown">
              <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi-download me-2"></i> Export
              </button>

              <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                <span class="dropdown-header">Options</span>
                <a id="export-copy" class="dropdown-item" href="javascript:;">
                  <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/copy-icon.svg" alt="Image Description">
                  Copy
                </a>
                <a id="export-print" class="dropdown-item" href="javascript:;">
                  <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/illustrations/print-icon.svg" alt="Image Description">
                  Print
                </a>
                <div class="dropdown-divider"></div>
                <span class="dropdown-header">Download options</span>
                <a id="export-excel" class="dropdown-item" href="javascript:;">
                  <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/excel-icon.svg" alt="Image Description">
                  Excel
                </a>
                <a id="export-csv" class="dropdown-item" href="javascript:;">
                  <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/components/placeholder-csv-format.svg" alt="Image Description">
                  .CSV
                </a>
                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                  <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/pdf-icon.svg" alt="Image Description">
                  PDF
                </a>
              </div>
            </div>
            <!-- End Dropdown -->

            <!-- Dropdown -->
            <div class="dropdown">
              <button type="button" class="btn btn-white btn-sm w-100" id="usersFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi-filter me-1"></i> Filter <span class="badge bg-soft-dark text-dark rounded-circle ms-1">2</span>
              </button>

              <div class="dropdown-menu dropdown-menu-sm-end dropdown-card card-dropdown-filter-centered" aria-labelledby="usersFilterDropdown" style="min-width: 22rem;">
                <!-- Card -->
                <div class="card">
                  <div class="card-header card-header-content-between">
                    <h5 class="card-header-title">Filter users</h5>

                    <!-- Toggle Button -->
                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm ms-2">
                      <i class="bi-x-lg"></i>
                    </button>
                    <!-- End Toggle Button -->
                  </div>

                  <div class="card-body">
                    <form>
                      <div class="mb-4">
                        <small class="text-cap text-body">Role</small>

                        <div class="row">
                          <div class="col">
                            <!-- Check -->
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="usersFilterCheckAll" checked>
                              <label class="form-check-label" for="usersFilterCheckAll">
                                All
                              </label>
                            </div>
                            <!-- End Check -->
                          </div>
                          <!-- End Col -->

                          <div class="col">
                            <!-- Check -->
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="usersFilterCheckEmployee">
                              <label class="form-check-label" for="usersFilterCheckEmployee">
                                Employee
                              </label>
                            </div>
                            <!-- End Check -->
                          </div>
                          <!-- End Col -->
                        </div>
                        <!-- End Row -->
                      </div>

                      <div class="row">
                        <div class="col-sm mb-4">
                          <small class="text-cap text-body">Position</small>

                          <!-- Select -->
                          <div class="tom-select-custom">
                            <select class="js-select js-datatable-filter form-select form-select-sm" data-target-column-index="2" data-hs-tom-select-options='{
                                      "placeholder": "Any",
                                      "searchInDropdown": false,
                                      "hideSearch": true,
                                      "dropdownWidth": "10rem"
                                    }'>
                              <option value="">Any</option>
                              <option value="Accountant">Accountant</option>
                              <option value="Co-founder">Co-founder</option>
                              <option value="Designer">Designer</option>
                              <option value="Developer">Developer</option>
                              <option value="Director">Director</option>
                            </select>
                            <!-- End Select -->
                          </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm mb-4">
                          <small class="text-cap text-body">Status</small>

                          <!-- Select -->
                          <div class="tom-select-custom">
                            <select class="js-select js-datatable-filter form-select form-select-sm" data-target-column-index="4" data-hs-tom-select-options='{
                                      "placeholder": "Any status",
                                      "searchInDropdown": false,
                                      "hideSearch": true,
                                      "dropdownWidth": "10rem"
                                    }'>
                              <option value="">Any status</option>
                              <option value="Completed" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success"></span>Completed</span>'>Completed</option>
                              <option value="In progress" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-warning"></span>In progress</span>'>In progress</option>
                              <option value="To do" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger"></span>To do</span>'>To do</option>
                            </select>
                          </div>
                          <!-- End Select -->
                        </div>
                        <!-- End Col -->

                        <div class="col-12 mb-4">
                          <small class="text-cap text-body">Members</small>

                          <!-- Select -->
                          <div class="tom-select-custom">
                            <select class="js-select form-select" autocomplete="off" multiple data-hs-tom-select-options='{
                                      "singleMultiple": true,
                                      "hideSelected": false,
                                      "placeholder": "Select member"
                                    }'>
                              <option label="empty"></option>
                              <option value="AH" selected data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/img/160x160/img10.jpg" alt="Image Description" /><span class="text-truncate">Amanda Harvey</span></span>'>Amanda Harvey</option>
                              <option value="DH" selected data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/img/160x160/img3.jpg" alt="Image Description" /><span class="text-truncate">David Harrison</span></span>'>David Harrison</option>
                              <option value="SK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/img/160x160/img4.jpg" alt="Image Description" /><span class="text-truncate">Sam Kart</span></span>'>Sam Kart</option>
                              <option value="FH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/img/160x160/img5.jpg" alt="Image Description" /><span class="text-truncate">Finch Hoot</span></span>'>Finch Hoot</option>
                              <option value="CQ" selected data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="assets/img/160x160/img6.jpg" alt="Image Description" /><span class="text-truncate">Costa Quinn</span></span>'>Costa Quinn</option>
                            </select>
                          </div>
                          <!-- End Select -->
                        </div>
                        <!-- End Col -->
                      </div>
                      <!-- End Row -->

                      <div class="d-grid">
                        <a class="btn btn-primary" href="javascript:;">Apply</a>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- End Card -->
              </div>
            </div>
            <!-- End Dropdown -->
          </div>
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
          <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 2, 3, 6, 7],
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 15,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
            <thead class="thead-light">
              <tr>
                <th class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                    <label class="form-check-label" for="datatableCheckAll"></label>
                  </div>
                </th>
                <th class="table-column-ps-0">Project</th>
                <th>Tasks</th>
                <th>Members</th>
                <th>Due date</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck1">
                    <label class="form-check-label" for="usersDataCheck1"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="project.html">
                    <img class="avatar" src="assets/svg/brands/guideline-icon.svg" alt="Image Description">
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Cloud computing web service</span>
                      <span class="d-block fs-6 text-body">Updated 2 minutes ago</span>
                    </div>
                  </a>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    120 <a class="badge bg-soft-dark text-dark ms-1" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="tasks completed today">+2</a>
                  </div>
                </td>
                <td>
                  <!-- Avatar Group -->
                  <div class="avatar-group avatar-group-xs avatar-circle">
                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Ella Lauda">
                      <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                    </a>
                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                      <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                    </a>
                    <a class="avatar avatar-soft-dark" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Antony Taylor">
                      <span class="avatar-initials">A</span>
                    </a>
                    <a class="avatar avatar-soft-info" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Sara Iwens">
                      <span class="avatar-initials">S</span>
                    </a>
                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Finch Hoot">
                      <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                    </a>
                  </div>
                  <!-- End Avatar Group -->
                </td>
                <td>05 May</td>
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
                    <option value="10">10</option>
                    <option value="15" selected>15</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <!-- End Select -->

            

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

    <div class="footer">
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
        </div>
        <!-- End Col -->

        <div class="col-auto">
          <div class="d-flex justify-content-end">
            <!-- List Separator -->
            <ul class="list-inline list-separator">
              <li class="list-inline-item">
                <a class="list-separator-link" href="#">FAQ</a>
              </li>

              <li class="list-inline-item">
                <a class="list-separator-link" href="#">License</a>
              </li>

              <li class="list-inline-item">
                <!-- Keyboard Shortcuts Toggle -->
                <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts" aria-controls="offcanvasKeyboardShortcuts">
                  <i class="bi-command"></i>
                </button>
                <!-- End Keyboard Shortcuts Toggle -->
              </li>
            </ul>
            <!-- End List Separator -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>

    <!-- End Footer -->
  </main>
  <?php 
  include_once("user_footer.php");
}     
else {
  header("Location: login_user.php");
}
  ?>

  </body>
  </html>
