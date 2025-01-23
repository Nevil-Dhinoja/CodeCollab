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
        <div class="d-flex mb-3">
          <!-- Avatar -->
          <div class="flex-shrink-0">
            <div class="avatar avatar-lg avatar-4x3">
              <img class="avatar-img" src="assets/svg/brands/guideline-icon.svg" alt="Image Description">
            </div>
          </div>
          <!-- End Avatar -->

          <div class="flex-grow-1 ms-4">
            <div class="row">
              <div class="col-lg mb-3 mb-lg-0">
                <h1 class="page-header-title">Cloud computing web service</h1>

                <div class="row align-items-center">
                  <div class="col-auto">
                    <span>Client:</span>
                    <a href="#">Htmlstream</a>
                  </div>
                  <!-- End Col -->

                  <div class="col-auto">
                    <div class="row align-items-center g-0">
                      <div class="col-auto">Due date:</div>

                      <!-- Flatpickr -->
                      <div class="col flatpickr-custom-position-fix-sm-down">
                        <div id="projectDeadlineFlatpickr" class="js-flatpickr flatpickr-custom flatpickr-custom-borderless input-group input-group-sm" data-hs-flatpickr-options='{
                                "appendTo": "#projectDeadlineFlatpickr",
                                "dateFormat": "d/m/Y",
                                "wrap": true
                              }'>
                          <input type="text" class="flatpickr-custom-form-control form-control" placeholder="Select dates" data-input value="29/06/2020">
                          <div class="input-group-append input-group-text ps-0" data-bs-toggle>
                            <i class="bi-chevron-down"></i>
                          </div>
                        </div>
                      </div>
                      <!-- End Flatpickr -->
                    </div>
                  </div>
                  <!-- End Col -->

                  <div class="col-auto">
                    <!-- Select -->
                    <div class="tom-select-custom">
                      <select class="js-select form-select form-select-sm form-select-borderless tom-select-form-select-ps-0" id="ownerLabel" autocomplete="off" data-hs-tom-select-options='{
                                "searchInDropdown": false,
                                "hideSearch": true,
                                "dropdownWidth": "12rem"
                              }'>
                        <option value="owner1" selected data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle" src="assets/img/160x160/img6.jpg" alt="Avatar" /><span class="flex-grow-1 ms-2">Mark Williams</span></span>'>Mark Williams</option>
                        <option value="owner2" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle" src="assets/img/160x160/img10.jpg" alt="Avatar" /><span class="flex-grow-1 ms-2">Amanda Harvey</span></span>'>Amanda Harvey</option>
                        <option value="owner3" data-option-template='<span class="d-flex align-items-center"><i class="bi-person text-body"></i><span class="flex-grow-1 ms-2">Assign to owner</span></span>'>Assign to owner</option>
                      </select>
                    </div>
                    <!-- End Select -->
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Row -->
              </div>
              <!-- End Col -->

              <div class="col-lg-auto">
                <span class="text-cap small">Team members:</span>

                <div class="d-flex">
                  <!-- Avatar Group -->
                  <div class="avatar-group avatar-circle me-3">
                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Amanda Harvey">
                      <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                    </a>
                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Linda Bates">
                      <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                    </a>
                    <a class="avatar avatar-soft-info" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="#digitalmarketing">
                      <span class="avatar-initials">
                        <i class="bi-people-fill"></i>
                      </span>
                    </a>
                    <a class="avatar" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                      <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                    </a>
                    <a class="avatar avatar-soft-dark" href="user-profile.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Antony Taylor">
                      <span class="avatar-initials">A</span>
                    </a>

                    <a class="avatar avatar-light avatar-circle" href="javascript:;" data-bs-toggle="modal" data-bs-target="#shareWithPeopleModal">
                      <span class="avatar-initials">+2</span>
                    </a>
                  </div>
                  <!-- End Avatar Group -->

                  <a class="btn btn-primary btn-icon rounded-circle" href="javascript:;" data-bs-toggle="modal" data-bs-target="#shareWithPeopleModal">
                    <i class="bi-share-fill"></i>
                  </a>
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
        </div>
        <!-- End Media -->

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
              <a class="nav-link active" href="project.html">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="project-files.html">Files</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="project-activity.html">Activity</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="project-teams.html">Teams</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="project-settings.html">Settings</a>
            </li>
          </ul>
        </div>
        <!-- End Nav -->
      </div>
      <!-- End Page Header -->

      <div class="row">
        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-6">
          <!-- Card -->
          <div class="card card-sm h-100">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <!-- Media -->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i class="bi-receipt nav-icon"></i>
                    </div>

                    <div class="flex-grow-1 ms-3">
                      <h4 class="mb-1">Spent</h4>
                      <span class="d-block">-$71,431.00 USD</span>
                    </div>
                  </div>
                  <!-- End Media -->
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <!-- Circle -->
                  <div class="circles-chart">
                    <div class="js-circle" data-hs-circles-options='{
                           "value": 54,
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circles-chart-content",
                           "textColor": "#377dff"
                         }'></div>
                  </div>
                  <!-- End Circle -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-6">
          <!-- Card -->
          <div class="card card-sm h-100">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <!-- Media -->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i class="bi-bar-chart nav-icon"></i>
                    </div>

                    <div class="flex-grow-1 ms-3">
                      <h4 class="mb-1">Progress</h4>
                      <span class="fs-5 text-success">
                        <i class="tio-trending-up"></i> 1.7%
                      </span>
                    </div>
                  </div>
                  <!-- End Media -->
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <!-- Circle -->
                  <div class="circles-chart">
                    <div class="js-circle" data-hs-circles-options='{
                           "value": 80,
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circles-chart-content",
                           "textColor": "#377dff"
                         }'></div>
                  </div>
                  <!-- End Circle -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-6">
          <!-- Card -->
          <div class="card card-sm h-100">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <!-- Media -->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i class="bi-check2-circle nav-icon"></i>
                    </div>

                    <div class="flex-grow-1 ms-3">
                      <h4 class="mb-1">Tasks closed</h4>
                      <span class="d-block">79 <span class="badge bg-soft-dark text-dark rounded-pill ms-1">+4 today</span></span>
                    </div>
                  </div>
                  <!-- End Media -->
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <!-- Circle -->
                  <div class="circles-chart">
                    <div class="js-circle" data-hs-circles-options='{
                           "value": 67,
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circles-chart-content",
                           "textColor": "#377dff"
                         }'></div>
                  </div>
                  <!-- End Circle -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-xl-3 mb-3 mb-xl-6">
          <!-- Card -->
          <div class="card card-sm h-100">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <!-- Media -->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <i class="bi-award nav-icon"></i>
                    </div>

                    <div class="flex-grow-1 ms-3">
                      <h4 class="mb-1">Goals</h4>
                      <span class="d-block">41/100</span>
                    </div>
                  </div>
                  <!-- End Media -->
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <!-- Circle -->
                  <div class="circles-chart">
                    <div class="js-circle" data-hs-circles-options='{
                           "value": 41,
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circles-chart-content",
                           "textColor": "#377dff"
                         }'></div>
                  </div>
                  <!-- End Circle -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Row -->

      <!-- Card -->
      <div class="card mb-3 mb-lg-5">
        <!-- Header -->
        <div class="card-header card-header-content-between">
          <h6 class="card-subtitle mb-0">Project budget: <span class="h3 ms-sm-2">$150,000.00 USD</span></h6>

          <!-- Dropdown -->
          <div class="dropdown">
            <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="card-body">
          <!-- Bar Chart -->
          <div class="chartjs-custom" style="height: 18rem;">
            <canvas id="project" class="js-chart" data-hs-chartjs-options='{
                      "type": "line",
                      "data": {
                         "labels": ["Feb","Jan","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                         "datasets": [{
                          "data": [18,51,60,38,88,50,40,52,88,80,60,70],
                          "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                          "borderColor": "#377dff",
                          "borderWidth": 2,
                          "pointRadius": 0,
                          "pointBorderColor": "#fff",
                          "pointBackgroundColor": "#377dff",
                          "pointHoverRadius": 0,
                          "hoverBorderColor": "#fff",
                          "hoverBackgroundColor": "#377dff",
                           "tension": 0.4
                        },
                        {
                          "data": [27,38,60,77,40,50,49,29,42,27,42,50],
                          "backgroundColor": ["rgba(0, 201, 219, 0)", "rgba(255, 255, 255, 0)"],
                          "borderColor": "#00c9db",
                          "borderWidth": 2,
                          "pointRadius": 0,
                          "pointBorderColor": "#fff",
                          "pointBackgroundColor": "#00c9db",
                          "pointHoverRadius": 0,
                          "hoverBorderColor": "#fff",
                          "hoverBackgroundColor": "#00c9db",
                           "tension": 0.4
                        }]
                      },
                      "options": {
                        "gradientPosition": {"y1": 200},
                         "scales": {
                            "y": {
                              "grid": {
                                "color": "#e7eaf3",
                                "drawBorder": false,
                                "zeroLineColor": "#e7eaf3"
                              },
                              "ticks": {
                                "min": 0,
                                "max": 100,
                                "stepSize": 20,
                                "color": "#97a4af",                                
                                "font": {
                                  "family": "Open Sans, sans-serif"
                                },
                                "padding": 10,
                                "postfix": "k"
                              }
                            },
                            "x": {
                              "grid": {
                                "display": false,
                                "drawBorder": false
                              },
                              "ticks": {
                               "color": "#97a4af",
                                "font": {
                                  "family": "Open Sans, sans-serif"
                                },
                                "padding": 5
                              }
                            }
                        },
                        "plugins": {
                          "tooltip": {
                            "prefix": "$",
                            "postfix": "k",
                            "hasIndicator": true,
                            "mode": "index",
                            "intersect": false,
                            "lineMode": true,
                            "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                          }
                        },
                        "hover": {
                          "mode": "nearest",
                          "intersect": true
                        }
                      }
                    }'>
            </canvas>
          </div>
          <!-- End Bar Chart -->
        </div>
        <!-- End Body -->
      </div>
      <!-- End Card -->

      <div class="row">
        <div class="col-lg-5 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-between">
              <h4 class="card-header-title">Expenses</h4>

              <!-- Nav -->
              <ul class="nav nav-segment" id="expensesTab" role="tablist">
                <li class="nav-item" data-bs-toggle="chart-doughnut" data-datasets="0" data-trigger="click" data-action="toggle">
                  <a class="nav-link active" href="javascript:;" data-bs-toggle="tab">This week</a>
                </li>
                <li class="nav-item" data-bs-toggle="chart-doughnut" data-datasets="1" data-trigger="click" data-action="toggle">
                  <a class="nav-link" href="javascript:;" data-bs-toggle="tab">Last week</a>
                </li>
              </ul>
              <!-- End Nav -->
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              <!-- Pie Chart -->
              <div class="chartjs-custom mb-3 mb-sm-5" style="height: 14rem;">
                <canvas id="updatingDoughnutChart" data-hs-chartjs-options='{
                          "type": "doughnut",
                          "data": {
                            "labels": ["USD", "USD", "USD"],
                            "datasets": [{
                              "backgroundColor": ["#377dff", "#00c9db", "#e7eaf3"],
                              "borderWidth": 5,
                              "hoverBorderColor": "#fff"
                            }]
                          },
                          "options": {
                            "cutoutPercentage": 80,
                            "plugins": {
                              "tooltip": {
                                "postfix": "k",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false
                              }
                            },
                            "hover": {
                              "mode": "nearest",
                              "intersect": true
                            }
                          }
                        }'></canvas>
              </div>
              <!-- End Pie Chart -->

              <div class="row justify-content-center">
                <div class="col-auto mb-3 mb-sm-0">
                  <h4 class="card-title">$2,332.00</h4>
                  <span class="legend-indicator bg-primary"></span> Marketing
                </div>
                <!-- End Col -->

                <div class="col-auto mb-3 mb-sm-0">
                  <h4 class="card-title">$10,452.00</h4>
                  <span class="legend-indicator bg-info"></span> Bills
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <h4 class="card-title">$56,856.00</h4>
                  <span class="legend-indicator"></span> Others
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-lg-7 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header card-header-content-between">
              <h4 class="card-header-title">Events</h4>

              <!-- Nav -->
              <ul class="nav nav-segment" id="eventsTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="this-week-tab" data-bs-toggle="tab" href="#this-week" role="tab">
                    This week
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="next-week-tab" data-bs-toggle="tab" href="#next-week" role="tab">
                    Next week
                  </a>
                </li>
              </ul>
              <!-- End Nav -->
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body card-body-height">
              <!-- Tab Content -->
              <div class="tab-content" id="eventsTabContent">
                <div class="tab-pane fade show active" id="this-week" role="tabpanel" aria-labelledby="this-week-tab">
                  <!-- List Group -->
                  <ul class="list-group list-group-flush list-group-start-bordered">
                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-primary" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">12:00 - 03:00 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Weekly overview</h5>
                            <span class="text-body small">24 May, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-dark">
                                <span class="avatar-initials">A</span>
                              </span>
                              <span class="avatar avatar-soft-info">
                                <span class="avatar-initials">S</span>
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                        <!-- End Row -->
                      </a>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-info" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">04:30 - 04:50 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Project tasks</h5>
                            <span class="text-body small">25 May, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-danger">
                                <span class="avatar-initials">A</span>
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                      </a>
                      <!-- End Row -->
                    </li>

                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-danger" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">12:00 - 03:00 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Monthly reports</h5>
                            <span class="text-body small">27 May, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-dark">
                                <span class="avatar-initials">B</span>
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                        <!-- End Row -->
                      </a>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-warning" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">02:00 - 03:00 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Monthly reports to the client</h5>
                            <span class="text-body small">29 May, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-dark">
                                <span class="avatar-initials">B</span>
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                        <!-- End Row -->
                      </a>
                    </li>
                    <!-- End Item -->
                  </ul>
                  <!-- End List Group -->
                </div>

                <div class="tab-pane fade" id="next-week" role="tabpanel" aria-labelledby="next-week-tab">
                  <!-- List Group -->
                  <ul class="list-group list-group-flush list-group-start-bordered">
                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-info" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">04:30 - 04:50 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Project tasks</h5>
                            <span class="text-body small">30 May, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img7.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-danger">
                                <span class="avatar-initials">A</span>
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                      </a>
                      <!-- End Row -->
                    </li>

                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-primary" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">12:00 - 03:00 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Weekly overview</h5>
                            <span class="text-body small">1 June, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-dark">
                                <span class="avatar-initials">A</span>
                              </span>
                              <span class="avatar avatar-soft-info">
                                <span class="avatar-initials">S</span>
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                        <!-- End Row -->
                      </a>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-warning" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">02:00 - 03:00 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Monthly reports to the client</h5>
                            <span class="text-body small">2 June, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-dark">
                                <span class="avatar-initials">B</span>
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                        <!-- End Row -->
                      </a>
                    </li>
                    <!-- End Item -->

                    <!-- Item -->
                    <li class="list-group-item">
                      <a class="list-group-item-action border-danger" href="#">
                        <div class="row">
                          <div class="col-sm mb-2 mb-sm-0">
                            <h2 class="fw-normal mb-1">12:00 - 03:00 <span class="fs-5 text-body text-uppercase">pm</span></h2>
                            <h5 class="text-inherit mb-0">Monthly reports</h5>
                            <span class="text-body small">4 June, 2020</span>
                          </div>

                          <div class="col-sm-auto align-self-sm-end">
                            <!-- Avatar Group -->
                            <div class="avatar-group avatar-group-sm avatar-circle">
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                              </span>
                              <span class="avatar avatar-soft-dark">
                                <span class="avatar-initials">B</span>
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                              </span>
                              <span class="avatar">
                                <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                              </span>
                            </div>
                            <!-- End Avatar Group -->
                          </div>
                        </div>
                        <!-- End Row -->
                      </a>
                    </li>
                    <!-- End Item -->
                  </ul>
                  <!-- End List Group -->
                </div>
              </div>
              <!-- End Tab Content -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->

      <!-- Card -->
      <div class="card overflow-hidden">
        <!-- Header -->
        <div class="card-header card-header-content-between">
          <h4 class="card-header-title">Hours spent <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="This report is based on 100% of sessions."></i></h4>

          <!-- Daterangepicker -->
          <button id="js-daterangepicker-predefined" class="btn btn-ghost-secondary btn-sm dropdown-toggle">
            <i class="tio-date-range"></i>
            <span class="js-daterangepicker-predefined-preview ms-1"></span>
          </button>
          <!-- End Daterangepicker -->
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="card-body">
          <!-- Matrix Chart -->
          <div class="chartjs-matrix-custom mb-3" style="min-width: 100%; width: 700px;">
            <canvas class="js-chart-matrix" style='min-height: 150px;' data-hs-chartjs-options='{
              "options": {
                "matrixBackgroundColord": {
                   "color": "#377dff",
                   "accent": 50,
                   "additionToValue": 2
                },
                "matrixLegend": {
                  "container": "#matrixLegend"
                }
              }
            }'></canvas>
          </div>
          <!-- End Matrix Chart -->

          <!-- Matrix Legend -->
          <ul id="matrixLegend" class="mb-0"></ul>
          <!-- End Matrix Legend -->
        </div>
        <!-- End Body -->

        <hr class="my-0">

        <div class="row">
          <div class="col-lg-4">
            <!-- Body -->
            <div class="card card-centered bg-light h-100 rounded-0 shadow-none">
              <div class="card-body text-center">
                <div class="mb-3">
                  <img class="avatar avatar-xxl avatar-4x3" src="assets/svg/illustrations/oc-chatting.svg" alt="Image Description" data-hs-theme-appearance="default">
                  <img class="avatar avatar-xxl avatar-4x3" src="assets/svg/illustrations-light/oc-chatting.svg" alt="Image Description" data-hs-theme-appearance="dark">
                </div>

                <span class="display-3 d-block text-dark">256.4</span>

                <span class="d-block">
                  &mdash; Total hours
                  <span class="badge bg-soft-dark text-dark rounded-pill ms-1">+7 today</span>
                </span>
              </div>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Col -->

          <div class="col-lg-8">
            <!-- Body -->
            <div class="card-body card-body-height">
              <ul class="list-group list-group-flush list-group-no-gutters">
                <!-- List Item -->
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-sm mb-3 mb-sm-0">
                      <a class="d-flex align-items-center" href="user-profile.html">
                        <div class="flex-shrink-0">
                          <div class="avatar avatar-sm avatar-circle">
                            <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <h5 class="text-inherit">Amanda Harvey</h5>
                        </div>
                      </a>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Days</span>
                      <span class="fw-semibold text-dark">38</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Hours</span>
                      <span class="fw-semibold text-dark">45:12</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Tasks</span>
                      <span class="fw-semibold text-dark">35</span>
                    </div>
                    <!-- End Col -->
                  </div>
                </li>
                <!-- End List Item -->

                <!-- List Item -->
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-sm mb-3 mb-sm-0">
                      <a class="d-flex align-items-center" href="user-profile.html">
                        <div class="flex-shrink-0">
                          <div class="avatar avatar-sm avatar-soft-info avatar-circle">
                            <span class="avatar-initials">S</span>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <h5 class="text-inherit">Sara Iwens</h5>
                        </div>
                      </a>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Days</span>
                      <span class="fw-semibold text-dark">15</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Hours</span>
                      <span class="fw-semibold text-dark">24:06</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Tasks</span>
                      <span class="fw-semibold text-dark">31</span>
                    </div>
                    <!-- End Col -->
                  </div>
                </li>
                <!-- End List Item -->

                <!-- List Item -->
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-sm mb-3 mb-sm-0">
                      <a class="d-flex align-items-center" href="user-profile.html">
                        <div class="flex-shrink-0">
                          <div class="avatar avatar-sm avatar-circle">
                            <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <h5 class="text-inherit">David Harrison</h5>
                        </div>
                      </a>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Days</span>
                      <span class="fw-semibold text-dark">22</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Hours</span>
                      <span class="fw-semibold text-dark">67:38</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Tasks</span>
                      <span class="fw-semibold text-dark">76</span>
                    </div>
                    <!-- End Col -->
                  </div>
                </li>
                <!-- End List Item -->

                <!-- List Item -->
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-sm mb-3 mb-sm-0">
                      <a class="d-flex align-items-center" href="user-profile.html">
                        <div class="flex-shrink-0">
                          <div class="avatar avatar-sm avatar-circle">
                            <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <h5 class="text-inherit">Ella Lauda</h5>
                        </div>
                      </a>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Days</span>
                      <span class="fw-semibold text-dark">35</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Hours</span>
                      <span class="fw-semibold text-dark">53:31</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Tasks</span>
                      <span class="fw-semibold text-dark">42</span>
                    </div>
                    <!-- End Col -->
                  </div>
                </li>
                <!-- End List Item -->

                <!-- List Item -->
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-sm mb-3 mb-sm-0">
                      <a class="d-flex align-items-center" href="user-profile.html">
                        <div class="flex-shrink-0">
                          <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                            <span class="avatar-initials">B</span>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <h5 class="text-inherit">Bob Dean</h5>
                        </div>
                      </a>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Days</span>
                      <span class="fw-semibold text-dark">5</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Hours</span>
                      <span class="fw-semibold text-dark">15:38</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Tasks</span>
                      <span class="fw-semibold text-dark">21</span>
                    </div>
                    <!-- End Col -->
                  </div>
                </li>
                <!-- End List Item -->

                <!-- List Item -->
                <li class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-sm mb-3 mb-sm-0">
                      <a class="d-flex align-items-center" href="user-profile.html">
                        <div class="flex-shrink-0">
                          <div class="avatar avatar-sm avatar-circle">
                            <img class="avatar-img" src="assets/img/160x160/img8.jpg" alt="Image Description">
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <h5 class="text-inherit">Linda Bates</h5>
                        </div>
                      </a>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Days</span>
                      <span class="fw-semibold text-dark">14</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Hours</span>
                      <span class="fw-semibold text-dark">16:29</span>
                    </div>
                    <!-- End Col -->

                    <div class="col">
                      <span class="text-cap text-body small mb-0">Tasks</span>
                      <span class="fw-semibold text-dark">9</span>
                    </div>
                    <!-- End Col -->
                  </div>
                </li>
                <!-- End List Item -->
              </ul>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
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
  <!-- End Share with people Modal -->
  <!-- ========== END SECONDARY CONTENTS ========== -->

  <!-- JS Implementing Plugins -->
  <script src="assets/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="assets/js/theme.min.js"></script>
  <script src="assets/js/hs.theme-appearance-charts.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF DATERANGEPICKER
      // =======================================================
      $('.js-daterangepicker').daterangepicker();

      $('.js-daterangepicker-times').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });

      var start = moment();
      var end = moment();

      function cb(start, end) {
        $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
      }

      $('#js-daterangepicker-predefined').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);

      cb(start, end);
    });
  </script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      window.onload = function () {
        

        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        new HSFormSearch('.js-form-search')


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF NAV SCROLLER
        // =======================================================
        new HsNavScroller('.js-nav-scroller')


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')


        // INITIALIZATION OF CIRCLES
        // =======================================================
        const colors = () => {
          return [HSThemeAppearance.getAppearance() === 'dark' ? '#34383b' : '#e7eaf3', '#377dff']
        }

        setTimeout(() => {
          document.querySelectorAll('.js-circle').forEach(item => {
            HSCore.components.HSCircles.init(item, {
              colors: colors()
            })
          })

          window.addEventListener('on-hs-appearance-change', () => {
            HSCore.components.HSCircles.getItems().forEach(circle => {
              circle.updateColors(colors())
            })
          })
        })


        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        HSCore.components.HSClipboard.init('.js-clipboard')


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart')


        // INITIALIZATION OF MATRIX CHARTJS WITH CHARTJS MATRIX PLUGIN
        // =======================================================
        function generateHoursData() {
          var data = [];
          var dt = moment().subtract(365, 'days').startOf('day');
          var end = moment().startOf('day');
          while(dt <= end) {
            data.push({
              x: dt.format('YYYY-MM-DD'),
              y: dt.format('e'),
              d: dt.format('YYYY-MM-DD'),
              v: Math.random() * 24
            });
            dt = dt.add(1, 'day');
          }
          return data;
        }

        HSCore.components.HSChartMatrixJS.init(document.querySelector('.js-chart-matrix'), {
          data: {
            datasets: [{
              label: 'Commits',
              data: generateHoursData(),
              width(c) {
                const a = c.chart.chartArea || {};
                return (a.right - a.left) / 70;
              },
              height(c) {
                const a = c.chart.chartArea || {};
                return (a.bottom - a.top) / 7;
              }
            }]
          },
          options: {
            aspectRatio: 5,
            plugins: {
              tooltip: {
                callbacks: {
                  title: function() { return '';},
                  label: function(item) {
                    var v = item.dataset.data[item.datasetIndex]

                    if (v.v.toFixed() > 0) {
                      return '<span class="fw-semibold">' + v.v.toFixed() + 'hours</span> on ' + v.d;
                    }  else {
                      return '<span class="fw-semibold">No time</span> on ' + v.d;
                    }
                  }
                }
              },
            },
            scales: {
              y: {
                type: 'time',
                offset: true,
                time: {
                  unit: 'day',
                  round: 'day',
                  isoWeekday: 1,
                  parser: 'i',
                  displayFormats: {
                    day: 'iiiiii'
                  }
                },
                reverse: true,
                ticks: {
                  font: {
                    size: 12,
                  },
                  maxTicksLimit: 5,
                  color: "rgba(22, 52, 90, 0.5)",
                  maxRotation: 0,
                  autoSkip: true
                },
                grid: {
                  display: false,
                  drawBorder: false,
                  tickLength: 0
                }
              },
              x: {
                type: 'time',
                position: 'bottom',
                offset: true,
                time: {
                  unit: 'week',
                  round: 'week',
                  isoWeekday: 1,
                  displayFormats: {
                    week: 'MMM dd'
                  }
                },
                ticks: {
                  font: {
                    size: 12,
                  },
                  maxTicksLimit: 5,
                  color: "rgba(22, 52, 90, 0.5)",
                  maxRotation: 0,
                  autoSkip: true
                },
                grid: {
                  display: false,
                  drawBorder: false,
                  tickLength: 0,
                }
              }
            }
          }
        })


        HSCore.components.HSChartJS.init('#updatingDoughnutChart')
        const updatingDoughnutChart = HSCore.components.HSChartJS.getItem('updatingDoughnutChart')

        // Datasets for chart, can be loaded from AJAX request
        const updatingDoughnutChartDatasets = [
          [
            [45, 25, 30]
          ],
          [
            [35, 50, 15]
          ]
        ]

        // Set datasets for chart when page is loaded
        const setDataChart = function () {
          updatingDoughnutChart.data.datasets.forEach(function (dataset, key) {
            dataset.data = updatingDoughnutChartDatasets[0][key];
          })

          updatingDoughnutChart.update()
        }

        setDataChart()

        window.addEventListener('on-hs-appearance-change', e => {
          setDataChart()
        })

        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart-doughnut"]').forEach(item => {
          item.addEventListener('click', e => {
            let keyDataset = e.currentTarget.getAttribute('data-datasets')

            // Update datasets for chart
            updatingDoughnutChart.data.datasets.forEach(function (dataset, key) {
              dataset.data = updatingDoughnutChartDatasets[keyDataset][key]
            })
            updatingDoughnutChart.update()
          })
        })


        // INITIALIZATION OF FLATPICKR
        // =======================================================
        HSCore.components.HSFlatpickr.init('.js-flatpickr')
      }
    })()
  </script>

  <!-- Style Switcher JS -->

  <script>
      (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
          $variants.forEach($item => {
            if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
              $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
              return $item.classList.add('active')
            }

            $item.classList.remove('active')
          })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
          $item.addEventListener('click', function () {
            HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
          })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
          setActiveStyle()
        })
      })()
    </script>

  <!-- End Style Switcher JS -->
</body>

<!-- Mirrored from htmlstream.com/front-dashboard/project.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 09:38:57 GMT -->
</html>