<?php
session_start();
include_once("create_database.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email = $_SESSION['email'];
  $pass = $_SESSION['password'];
?><!DOCTYPE html>
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
<?php include_once("admin_header.php"); ?>

      <div class="main-panel">
        <div class="content-wrapper">
        <?php 
        if (isset($_SESSION['reg_success'])) 
{
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
            }, 5000);
        </script>
    <?php
        unset($_SESSION['reg_success']);
}
?>
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
                              echo "<td><button class='btn btn-outline-danger' name='delete'><a href='delete.php?email=$row[user_email]'style='color:white'>Delete</a></button>";
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
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>
<?php }
else{
  ?>
<script>window.location="login_user.php"</script>
<?php } ?>
</html>