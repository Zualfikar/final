<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';


// if session is not set this will redirect to login page

// select logged-in users details



$user_id=$_POST['user'];

echo $sql="UPDATE `user` SET `status`='admin' WHERE user_id=$user_id";
 mysqli_query($conn,$sql);
 if(mysqli_query($conn,$sql)){
        echo "insert success";}
  
 ?>