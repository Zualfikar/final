<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php'; 
if( !isset($_SESSION['user' ]) ) {
 header("Location: ../index.php");
 exit;
}

// select logged-in user details
$user=mysqli_query($conn, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);


$userRow=mysqli_fetch_array($user, MYSQLI_ASSOC);
if($userRow["status"] == 'user'){
  header("Location: ../user/home.php");
  exit;
}



if($_GET["id"]){
	$id=$_GET["id"];
	$sql="SELECT * FROM course WHERE course_id=$id";
	$result= mysqli_query($conn,$sql);
	$row= $result->fetch_assoc();
}

 ?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




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
  <link rel="stylesheet" type="text/css" href="../assets/css/form.css">


</head>
<body>

 <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">codefactory@example.com</a></li>
          <li><i class="icofont-phone"></i> +1 666 6666 55</li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Mon-Fri 9am - 5pm</li>
        </ul>

      </div>
      <div class="cta">
        <a href="../user/home.php" class="scrollto">User Home</a>
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
          
          <li><a href="home.php">Back to Home</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <div class="container" >
 <form id="foo"  method="post" >
 	<input type="hidden" name="course_id" value="<?php echo $row['course_id'] ?>">
  <div class="row m-4 p-4 bg-light rounded" style="opacity: 0.9;">
    <div class="col-6 border rounded" >
  <div class="form-group">
    <label for="exampleInputEmail1">Course Title</label>
    <input type="title" value="<?php echo $row['title'] ?>" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" >
  <!--   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
   <div class="form-group">
     <label for="exampleInputEmail1">Course Type</label>
  <input list="type1" class="form-control" value="<?php echo $row['type'] ?>" name="type1">

<datalist id="type1">
  <option value="full-stack">
  <option value="front-end">
  <option value="back-end">
  <option value="javascript">
    <option value="paython">
      <option value="seminar">
        <option value="html-css">
          <option value="ux-design">
            <option value="java">
</datalist>
  </div>
  <div class="form-group">
     <label for="exampleInputEmail1">Course Level</label>
  <input list="type2" value="<?php echo $row['level'] ?>" class="form-control" name="type2">

<datalist id="type2">
  <option value="Beginners">
  <option value="Advanced">
  
</datalist>
  </div>
  <div class="form-group">
     <label for="exampleInputEmail1">Course term</label>
  <input list="type3" value="<?php echo $row['term'] ?>" class="form-control" name="type3">

<datalist id="type3">
  <option value="Ausbeldung">
  <option value="Wochenende-kurs">
  
</datalist>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Place</label>
    <input type="text" value="<?php echo $row['place'] ?>" class="form-control" name="place" id="exampleInputPassword1">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="text" value="<?php echo $row['price'] ?>" class="form-control" name="price" id="exampleInputPassword1" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Capacity</label>
    <input type="text" class="form-control" name="capacity" id="exampleInputPassword1" value="<?php echo $row['capacity'] ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="text" class="form-control" name="image" id="exampleInputPassword1" value="<?php echo $row['course_img'] ?>">
  </div>
</div>
 <div class="col-6" style="">
  <img src="<?php echo $row['course_img'] ?>" width="480px" height="400pxpx" alt="">
<div class="form-group" style="margin-top: 65px;">
    <label for="exampleInputPassword1">Duration</label>
    <input type="text" class="form-control" name="duration" id="exampleInputPassword1" value="<?php echo $row['duration'] ?>">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Times</label>
    <input type="text" class="form-control" name="times" id="exampleInputPassword1" value="<?php echo $row['times'] ?>">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Teachers</label>
    <input type="text" class="form-control" name="teachers" id="exampleInputPassword1" value="<?php echo $row['teachers'] ?>">
  </div>
</div>
</div>
<div class="row bg-light rounded m-4 p-4" style="opacity: 0.9;">
  <div class="col-6 border ">
   
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Benefits</label>
    <textarea class="form-control" name="benefits" id="exampleFormControlTextarea1" placeholder="<?php echo $row['benefits'] ?>" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Method</label>
    <textarea class="form-control" name="method" id="exampleFormControlTextarea1" placeholder="<?php echo $row['method'] ?>" rows="3"></textarea>
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Requirments</label>
    <textarea class="form-control" name="requirments" id="exampleFormControlTextarea1" placeholder="<?php echo $row['requirements'] ?>" rows="3"></textarea>
  </div>
</div>
<div class="col-6 border">
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="<?php echo $row['description'] ?>" rows="3"></textarea>
  </div>
   

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" placeholder="<?php echo $row['content'] ?>" rows="3"></textarea>
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlTextarea1">More details</label>
    <textarea class="form-control" name="long_des" id="exampleFormControlTextarea1" placeholder="<?php echo $row['long_des'] ?>" rows="3"></textarea>
  </div>
</div>
</div>
<div class="row">
  <div class="col-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Start date</label>
    <input type="date" class="form-control" name="start_date" id="exampleInputPassword1" value="<?php echo $row['start_date'] ?>">
  </div>
</div>
<div class="col-6">
   <div class="form-group">
    <label for="exampleInputPassword1">End date</label>
    <input type="date" class="form-control" name="end_date" id="exampleInputPassword1" value="<?php echo $row['end_date'] ?>">
  </div>
</div>

  
 
</div>

<div class="row justify-content-center ">
  
  <input type="submit" value="Update" style="background-color: Tomato;width:100px;height:50px;border-radius: 5px;">
</div>
</form>
</div>



<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Code Factory</h3>
            <p>
               GmbH Kettenbrückengasse 23/2/12 <br>
               , 1050 Wien<br>
             AUSTRIA <br><br>
              <strong>Phone:</strong> +43 66666 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Courses</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">large portfolio</a></li>
              
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p></p>
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
          Designed by <a href="">Zu alfikar Hasan</a>
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
  
// Variable to hold request
var request;

// Bind to the submit event of our form
$("#foo").click(function(event){

   // Prevent default posting of form - put here to work in case of errors
  event.preventDefault();

   // Abort any pending request
   
   // setup some local variables
   var $form = $(this);

   // Let's select and cache all the fields
   var $inputs = $form.find("input, select, button, textarea");

   // Serialize the data in the form
   var serializedData = $inputs.serialize();

   
   request = $.ajax({
       url: "a_update.php",
       type: "post",
       data: serializedData
   });

   // Callback handler that will be called on success
   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
       console.log("response");
   });

   // Callback handler that will be called on failure
   request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });

   // Callback handler that will be called regardless
   // if the request failed or succeeded
   
});


</script>
</body>
</html>