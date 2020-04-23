<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';

// select logged-in users details


if($_POST){
	$id=$_POST["course_id"];
$title=$_POST["title"];
$type=$_POST["type1"];
$level=$_POST["type2"];
$term=$_POST["type3"];
$place=$_POST["place"];
$price=$_POST["price"];
$capacity=$_POST["capacity"];
$image=$_POST["image"];
$duration=$_POST["duration"];
$times=$_POST["times"];
$teachers=$_POST["teachers"];
$benefits=$_POST["benefits"];
$method=$_POST["method"];
$requirments=$_POST["requirments"];
$description=$_POST["description"];
$content=$_POST["content"];
$long_des=$_POST["long_des"];
$start_date=$_POST["start_date"];
$end_date=$_POST["end_date"];

  
    $sql="UPDATE `course` SET `title`='$title',`type`='$type',`level`='$level',`term`='$term',`place`='$place',`price`='$price',`capacity`='$capacity',`course_img`='$image',`duration`='$duration',`times`='$times',`teachers`='$teachers',`benefits`='$benefits',`method`='$method',`requirements`='$requirments',`description`='$description',`content`='$content',`long_des`='$long_des',`start_date`='$start_date',`end_date`='$end_date' WHERE course_id=$id";
  // $sql2="INSERT INTO location (location_name,address,city,image_location,zip_code) VALUES ('$location_name','$address','$city','$image_location','$zip_code')";
  mysqli_query($conn,$sql);
  if(mysqli_query($conn,$sql)){
        echo "insert success";}

}


?>