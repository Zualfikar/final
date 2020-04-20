<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';


// if session is not set this will redirect to login page

// select logged-in users details
$user=$_SESSION['user'];


$course_id=$_Post['course'];

echo $sql="INSERT INTO c_relation (user_id,course_id)VALUES($user,$course_id)";
 mysqli_query($conn,$sql);
 if(mysqli_query($conn,$sql)){
        echo "insert success";}







  
  
 ?>