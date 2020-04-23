<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: ../index.php");
 exit;
}
$user_id=$_SESSION['user'];
// select logged-in users details
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
  



 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>your cart</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Flexor - v2.1.1
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">codefactory@example.com</a></li>
          <li><i class="icofont-phone"></i> +43 666 6666 55</li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Mon-Fri 9am - 5pm</li>
        </ul>

      </div>
      <div class="cta">
        <a href="cart.php" class="scrollto">Go to card</a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>Code Factory</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="home.php">Go Back to Home</a></li>
         

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div  class="container">
        <ol>
          <li><a href="home.html">Home</a></li>
          </ol>
        <h2>Your Total is :<?php echo $total; ?> €</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div  class="row">
<?php 
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


  }} ?>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Code Factory</h3>
            <p>
              Springergasse 19 <br>
              Vienna, 1020<br>
              AUSTRIA <br><br>
              <strong>Phone:</strong> +1 666 66666 55<br>
              <strong>Email:</strong> zu_alfikar_hasan@outlook.sa<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php">Terms of service</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Zu Alfikar Hasan</h4>
            <p>We are here for you</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="mr-lg-auto text-center text-lg-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Code Factory</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">Zu alfikar</a>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
<script>
  var request;
  
$('.todo').click(function(event){
event.preventDefault();

   var $inputs = $(this).parent().find("input, select, button, textarea");
  // Serialize the data in the form
  var serializedData = $inputs.serialize();
    
   request = $.ajax({
       url: "delete.php",
      type: "post",
       data:serializedData
   });

   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
       console.log(response);
     document.getElementById("main").innerHTML=response;
  
   });

   // Callback handler that will be called on failure
   request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   }

)

 
})

</script>
</body>

</html>