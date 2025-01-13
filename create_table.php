<?php
include_once("create_database.php");
$q = "create table users(
        user_name char(20),
        Mobile_no int(10),
        user_email varchar(30),
        user_password varchar(16)
      );";

if(mysqli_query($conn,$q))
{
    echo "<h1 style='color:green;'>Table is created successfully</h1>";
}
else
{
    echo "<h1 style='color:red;'>Error in creating table</h1>";
}
?>