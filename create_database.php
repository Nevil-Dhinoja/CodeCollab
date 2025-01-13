<?php
$conn = mysqli_connect("localhost","root","") or die("Error in database connection");
mysqli_select_db($conn,"CodeColab");
// $q = "create database CodeColab";
// if(mysqli_query($conn,$q))
// {
//     echo "<h1 style='color:green;'>Database is created successfully</h1>";
// }
// else
// {
//     echo "<h1 style='color:red;'>Error in database creation</h1>";
// }
?>