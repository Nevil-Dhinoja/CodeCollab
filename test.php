<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Code Colab</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link href="//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/logo-mini.svg" />
  <style>
    /* Remove underline on hover for links within the button */
    .btn a {
      text-decoration: none;
      /* Remove underline */
    }

    .btn a:hover {
      text-decoration: none;
      /* Ensure no underline on hover */
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="assets/images/faces/admin.png" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Admin</h5>
                <span>Nevil Dhinoja</span>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="admin_dashboard.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
              <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                <input type="text" class="form-control" placeholder="Search products">
              </form>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-lg-block">
              <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+e Perform Task</a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                <h6 class="p-3 mb-0">Projects</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-file-outline text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Software Development</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-web text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">UI Development</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-layers text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">Software Testing</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">See all projects</p>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="assets/images/faces/admin.png" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Admin</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="logout.php">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <?php
                        include_once("create_database.php");
                        $q = "select * from users";
                        $result = mysqli_query($conn, $q);
                        ?>
                        <th>Profile</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr> <?php
                            while ($row = mysqli_fetch_array($result)) {
                              echo "<tr>";
                              echo "<td><img src='uploads/" . $row['profile'] . "' height='60px' width='65px'style='border-radius:100%'>" . "</td>";
                              echo "<td>" . $row['user_name'] . "</td>";
                              echo "<td>" . $row['user_email'] . "</td>";
                              echo "<td>" . $row['user_password'] . "</td>";
                              echo "<td>" . $row['Mobile_no'] . "</td>";
                              echo "<td>" . $row['Status'] . "</td>";
                              echo "<td><lable class='btn btn-outline-primary'><a href='edit.php?email=$row[user_email]'style='color:white'>Edit</a></lable>";
                              echo "<td><button class='btn btn-outline-danger' name='delete'><a href='admin_dashboard.php?email=$row[user_email]'style='color:white'>Delete</a></button>";
                              echo "<tr/>";
                            } ?></tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="below-section pt-lg-4 mt-5">
            <div class="row">
              <p class="copy-text col-lg-7">&copy; 2025 CodeColab. All rights reserved. Design by Nevil Dhinoja</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <?php
include_once("create_database.php");
if (isset($_POST['delete'])) {
  $email = $_GET['email'];
$m = "DELETE FROM users WHERE user_email='$email';";
if (mysqli_query($conn, $m)) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
        <strong>Success!</strong> User details have been updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        setTimeout(function() {
        }, 3000);
    </script>
<?php
} else {
?>
    <script>
        alert("error in deleting data..");
    </script>
<?php
}
}
?>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>

</html>