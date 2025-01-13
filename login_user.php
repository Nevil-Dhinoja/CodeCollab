<?php
include_once("create_database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>CodeColab Login</title>
    <link rel="shortcut icon" href="assets/images/logo-mini.svg" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>
<style>
      .links {
            text-align: center;
            margin-top: 10px;
        }
        .links a {
            color: #4e73df;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: none;
        }
</style>
<body class="my-login-page">
	<header><?php include_once("header1.php")?></header>
    <?php
      if (isset($_SESSION['Activation_succ'])) {
      ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertmsg"  width="100%">
              <strong>Success</strong> <?php echo $_SESSION['Activation_succ']; ?>
          </div>
          <script>
              setTimeout("", 5000);
          </script>
      <?php
          unset($_SESSION['Activation_succ']);
      }
      
      if (isset($_SESSION['Activation_err'])) {
      ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertmsg" width="100%">
              <strong>Error</strong> <?php echo $_SESSION['Activation_err']; ?>
          </div>
          <script>
              setTimeout("", 5000);
          </script>
      
      <?php
          unset($_SESSION['Activation_err']);
      }
      ?>
      <?php
include_once("create_database.php");
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
	<div class="register-form">
        <h2>Login</h2>
        <form action="login_action.php" onsubmit="return(validate_login());" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div><br>
            <button type="submit" class="btn btn-primary" name="btn">Login</button>
        </form>
        <div class="links">
            <a href="register.php">Don't have an account? Register Now</a><br>
            <a href="">or</a><br>
            <a href="forgot.php">Forgot My Password</a>
        </div>
    </div>
	<footer><?php include_once("footer1.php")?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>

