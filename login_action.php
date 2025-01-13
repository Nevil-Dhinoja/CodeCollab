<?php
session_start();
include_once("create_database.php");
if (isset($_POST['btn'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $q = "SELECT * FROM users WHERE user_email='$email' && user_password='$pass'";
  $result = mysqli_query($conn, $q);
  $total = mysqli_num_rows($result);
  $admin = "SELECT * FROM admin WHERE email='$email' && password='$pass'";
  $admin_result = mysqli_query($conn, $admin);
  $admin_total = mysqli_num_rows($admin_result);

  if ($total == 1) {
    while ($f = mysqli_fetch_assoc($result)) {
      if ($f['Status'] == 'Active') {
        $_SESSION['success'] = "login Successful";
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
?>
        <script>
          window.location = "my_profile.php";
        </script>
      <?php
      } else {
        $_SESSION['Activation_err'] = "Your account is not activated. Please activate your account using the account activation link sent to your registered email address.";
      ?>
        <script>
          window.location = "login_user.php";
        </script>
        <?php
      }
    }
  }
  elseif($admin_total == 1)
  {
    while ($f1 = mysqli_fetch_assoc($admin_result)) {
      if ($f1['status'] == 'Active') {
        $_SESSION['success'] = "login Successful";
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
      ?>
        <script>
          window.location = "admin_dashboard.php";
        </script>
      <?php
      } else {
        $_SESSION['Activation_err'] = "Your account is not activated. Please activate your accoount using the account activation link sent to your registered email address.";
      ?>
        <script>
          window.location = "login_user.php";
        </script>
      <?php
      }
    }
  }
    else {
      if ($email != "" && $pass != "") {
        $_SESSION['Activation_err'] = "Username or password is incorrect";
        ?>
        <script>
          window.location = "login_user.php";
        </script>
<?php
      }
    }
} 
?>