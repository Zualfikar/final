<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';


// if session is not set this will redirect to login page

// select logged-in users details


$user_id=$_SESSION['user'];
$course_id=$_POST['course'];

$sql="DELETE FROM `c_relation` WHERE course_id=$course_id AND user_id=user_id";
 mysqli_query($conn,$sql);
 // if(mysqli_query($conn,$sql)){
 //        echo "insert success";}
$sql1="SELECT * FROM course WHERE course_id = ANY (SELECT course_id FROM c_relation WHERE user_id=$user_id)";
$result=mysqli_query($conn,$sql1);

$sql2="SELECT * FROM course WHERE course_id = ANY (SELECT course_id FROM c_relation WHERE user_id=$user_id)";
$res=mysqli_query($conn,$sql2);

    $total;
if ($res->num_rows == 0){
  $total=0;

}elseif ($res->num_rows == 1) {
  $roww=$res->fetch_assoc();
  $total=$roww["price"];
  
}else{
  $rowss= $res->fetch_all(MYSQLI_ASSOC);
  foreach($rowss as $key => $value){
  $total=$total+$value["price"];
  
  }} 


  echo '<section id="breadcrumbs" class="breadcrumbs">
      <div  class="container">
        <ol>
          <li><a href="home.html">Home</a></li>
          </ol>
        <h2>Your Total is :'.$total.' €</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div  class="row">';

        if ($result->num_rows == 0){
  echo "<h2>Your Cart is empty</h2>";
}elseif ($result->num_rows == 1) {
  $row=$result->fetch_assoc();
  echo ' <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">
              <div class="entry-img">
                <img src="'.$row["course_img"].'" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">'.$row["title"].'</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">'.$row["teachers"].'</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">von '.$row["start_date"].' bis '.$row["end_date"].'</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>'.$row["description"].'</p>
                <div class="read-more">
                   <input class="todo"  value="Delete"  type="submit">
            <input  name="course"  value="'.$row["course_id"].'" type="hidden">
                </div>
              </div>
            </article><!-- End blog entry -->
          </div>';
}else{
  $rows= $result->fetch_all(MYSQLI_ASSOC);

  foreach($rows as $key => $value){
echo '<div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <article class="entry">
              <div class="entry-img">
                <img src="'.$value["course_img"].'" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">'.$value["title"].'</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">'.$value["teachers"].'</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">von '.$value["start_date"].' bis '.$value["end_date"].'</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>'.$value["description"].'</p>
                <div class="read-more">
                   <input class="todo"  value="Delete"  type="submit">
            <input  name="course"  value="'.$value["course_id"].'" type="hidden">
                </div>
              </div>
            </article><!-- End blog entry -->
          </div>';


  }}
  echo '</div>
    </section><!-- End Blog Section -->
  </main>';

 ?>