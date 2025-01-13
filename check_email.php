<?php
include_once('create_database.php');
$email = $_REQUEST['user_email'];
$q = "select * from users where user_email='$email'";
$count = mysqli_num_rows(mysqli_query($conn, $q));
if ($count == 1) {
    echo "present";
} else {
    echo "absent";
}