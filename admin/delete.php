<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';


// if session is not set this will redirect to login page

// select logged-in users details



$course_id=$_POST['course'];

  $sql1="DELETE FROM course WHERE course_id={$course_id}";
mysqli_query($conn,$sql1);
 // if(mysqli_query($conn,$sql)){
 //        echo "insert success";}
$sql2="SELECT * FROM course ";

$result=mysqli_query($conn,$sql2);
if ($result->num_rows == 0){
  echo "<h2>There are no Courses at the moment</h2>";
}elseif ($result->num_rows == 1) {
  $row=$result->fetch_assoc();
  echo '<div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card" style="background-image: url('.$row["course_img"].');">
              <div class="card-body">
                <h5 class="card-title"><a href="">'.$row["title"].'</a></h5>
                <p class="card-text">'.$row["description"].'</p>
                <div class="read-more"><a href="update.php?id='.$row["course_id"].'"><i class="icofont-arrow-right"></i> Update</a></div>
              </div>
            </div>
          </div>';
}else{
  $rows= $result->fetch_all(MYSQLI_ASSOC);
  foreach($rows as $key => $value){
echo '<div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" style="margin-top:50px;">
<div class="card" style="background-image: url('.$value["course_img"].');">
<div class="card-body">
                <h5 class="card-title"><a href="">'.$value["title"].'</a></h5>
                <p class="card-text">'.$value["description"].'</p>
                <div class="read-more"><a href="update.php?id='.$value["course_id"].'"><i class="icofont-arrow-right"></i> Update</a></div>
                  <input class="todo"  value="Delete"  type="submit" style="background-color: Tomato;  border-radius: 10px;">
                  <input  name="course"  value="'.$value["course_id"].'" type="hidden">
                  </div>
            </div>
          </div>';


  }}

  
 ?>