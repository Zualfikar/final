<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: ../index.php");
 exit;
}
// select logged-in user details
$res=mysqli_query($conn, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);


$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
if($userRow["status"] == 'user'){
  header("Location: ../user/home.php");
  exit;
}

$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
if($userRow["status"] == 'admin'){
  header("Location: ../user/home.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Super Admin</title>
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
        <a href="../admin/home.php" class="scrollto">Admin Home</a>
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
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Courses</a></li>
          
          <li><a href="#team">Team</a></li>
          <li><a href="#pricing">Pricing</a></li>
         
          
          <li><a href="#contact">Contact</a></li>
          <li><a href="../admin/create.php">Create Course</a></li>
          <li><a href="../index.php">Sign out</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <h1>Welcome to Code Factory</h1>
      <h2>School of Development Courses</h2>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="#services" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-xl-4 col-lg-5" data-aos="fade-up">
            <div class="content">
              <h3>Why Should I Become a Full Stack Web Developer?</h3>
              <p>
                The efficiency of IT enables companies in all industries to be competitive and innovative. V.a. Since the GDPR came into force, every company has to deal professionally with the protection of its customer data.
              </p>
              <div class="text-center">
                <a href="#services" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>In 15 weeks to Junior developer</h4>
                    <p>Learn everything you need to start your career with web development and IT in just 15 weeks. Work hands-on on practical examples from day one!</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Hands-on learning </h4>
                    <p>
All of our courses are characterized by a maximum of practical work. We believe that programming can only be learned by programming. That is why we work from day one in teams of two and groups on project-related tasks</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Gain experience in real customer projects</h4>
                    <p>The final projects of our students come from real customers, from NGOs to medium-sized companies. With these references and job references in the portfolio, starting your career is easy.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" style="background: url('../assets/img/video_box.jpg'); center center no-repeat;
  background-size: cover;
  min-height: 500px;" data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=LK3cLNexNFk" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h4 data-aos="fade-up">About us</h4>
            <h3 data-aos="fade-up">History</h3>
            <p data-aos="fade-up">Founded in 2016, CodeFactory Vienna follows the concept of programming boot camps from the Anglo-American region. The goal is a time-efficient and very practical training with the aim of getting started as a junior developer as quickly as possible. The format is particularly aimed at career changers, people who want to change careers in the second or third educational path and people who are interested in application-oriented training.</p>

            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">large portfolio</a></h4>
              


            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href=""> celebrations and new friends</a></h4>
              <h4 class="title"><a href="">real customer projects
</a></h4>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Funding options
Fun</a></h4>
              <h4 class="title"><a href="">Networking with future employers
</a></h4>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>What distinguishes CodeFactory from other training programs and institutions?<br>
Because we know that programming languages ​​and technical skills alone are not enough, we attach great importance to holistic training, part-time skills and networking with the scene during the training. Training at CodeFactory includes the following.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="icofont-computer"></i></div>
              <h4 class="title"><a href="">Lunchspeaker</a></h4>
              <p class="description">Every Wednesday a professional from industry and practice comes to chat with you in a relaxed atmosphere about job opportunities, technical developments and trends and much more.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
              <h4 class="title"><a href="">Excursions</a></h4>
              <p class="description">There are 2 excursions to well-known IT companies per full stack course. Private tours and exclusive behind-the-scenes glimpses included.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="icofont-earth"></i></div>
              <h4 class="title"><a href="">Practical projects</a></h4>
              <p class="description"> Two large projects are worked out for each course, one in the frontend area and one towards the end of the course.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="icofont-image"></i></div>
              <h4 class="title"><a href="">International certifications</a></h4>
              <p class="description"> After completing the course, our students have the opportunity to acquire 2 internationally recognized certifications that are approved by an external partner. </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="icofont-settings"></i></div>
              <h4 class="title"><a href="">Large portfolio</a></h4>
              <p class="description"> From week one, our students build up their own portfolio and projects and practical demonstrations.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="icofont-tasks-alt"></i></div>
              <h4 class="title"><a href="">Application training</a></h4>
              <p class="description"> There is our Career Support Service for everyone who starts their career in IT uncertainties and questions.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
      <div class="container">
        <h1 style="text-align: center;">Users</h1>
        <div id="todo" class="row">
      <?php $sql="SELECT * FROM user WHERE status='user'";

$result=mysqli_query($conn,$sql);
if ($result->num_rows == 0){
  echo "<h2>There are no user at the moment</h2>";
}elseif ($result->num_rows == 1) {
  $row=$result->fetch_assoc();
  echo '<div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card" style="background-image: url('.$row["user_img"].');">
              <div class="card-body">
                <h5 class="card-title"><a href="">'.$row["first_name"].' '.$row["last_name"].'</a></h5>
                <p class="card-text">status: '.$row["status"].'</p>
                
                <input class="todo1"  value="Block"  type="submit"style="background-color: Tomato;  border-radius: 10px;">
                  <input  name="user"  value="'.$row["user_id"].'" type="hidden">
                   <input class="todo2"  value="As Admin"  type="submit"style="background-color: Tomato;  border-radius: 10px;">
                  <input  name="user"  value="'.$value["user_id"].'" type="hidden">
              </div>
            </div>
          </div>';
}else{
  $rows= $result->fetch_all(MYSQLI_ASSOC);
  foreach($rows as $key => $value){
echo '<div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" style="margin-top:50px;">
<div class="card" style="background-image: url('.$value["user_img"].');">
<div class="card-body">
                <h5 class="card-title"><a href="">'.$value["first_name"].' '.$value["last_name"].'</a></h5>
                <p class="card-text">status '.$value["status"].'</p>
                
                  <input class="todo1"  value="Block"  type="submit"style="background-color: Tomato;  border-radius: 10px;">
                  <input  name="user"  value="'.$value["user_id"].'" type="hidden">
                  <input class="todo2"  value="As Admin"  type="submit"style="background-color: Tomato;  border-radius: 10px;">
                  <input  name="user"  value="'.$value["user_id"].'" type="hidden">
                  </div>
            </div>
          </div>';


  }} ?>
       
         
        </div>

      </div>
    </section><!-- End Values Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="owl-carousel testimonials-carousel">

 <?php $sql="SELECT * FROM user WHERE status='admin'";

$result=mysqli_query($conn,$sql);
if ($result->num_rows == 0){
  echo "<h2>There are no admin at the moment</h2>";
}elseif ($result->num_rows == 1) {
  $row=$result->fetch_assoc();
  echo ' <div class="testimonial-item">
            <img src="'.$row["user_img"].'" class="testimonial-img" alt="">
            <h3>'.$row["first_name"].' '.$row["last_name"].'</h3>
            <h4>'.$row["email"].'</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              He is Admin in our website and teaches in our courses
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <input class="todo3"  value="As user"  type="submit"style="background-color: Tomato;  border-radius: 10px;">
                  <input  name="user"  value="'.$value["user_id"].'" type="hidden">
          </div>
';
}else{
  $rows= $result->fetch_all(MYSQLI_ASSOC);
  foreach($rows as $key => $value){
echo ' <div class="testimonial-item">
            <img src="'.$value["user_img"].'" class="testimonial-img" alt="">
            <h3>'.$value["first_name"].' '.$value["last_name"].'</h3>
            <h4>'.$value["email"].'</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              He is Admin in our website and teaches in our courses
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <input class="todo3"  value="As user"  type="submit"style="background-color: Tomato;  border-radius: 10px;">
                  <input  name="user"  value="'.$value["user_id"].'" type="hidden">
          </div>';


  }} ?>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

  
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Team</h2>
          <p data-aos="fade-up">Here you can see our team and some information about us.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="member">
              <div class="member-img">
                <img src="../assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Acilio</h4>
                <span>Front End</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="../assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Mariana</h4>
                <span>Back End</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="../assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Serri</h4>
                <span>Back End</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="../assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Theo</h4>
                <span>Front End</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Pricing</h2>
          <p data-aos="fade-up"></p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6" data-aos="fade-up">
            <div class="box">
              <h3>Free Siminar</h3>
              <h4><sup>$</sup>0<span> </span></h4>
              <ul>
                <li>Informations about courses</li>
                <li>How you can pay</li>
                <li>Take a look about the content</li>
                
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Bock Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
            <div class="box featured">
              <h3>Front End</h3>
              <h4><sup>€</sup>2450<span> </span></h4>
              <ul>
                <li>Version Control (Git -GitHub)</li>
                <li>HTML5</li>
                <li>CSS3 Bootstrap</li>
                <li>JavaScript jQuery</li>
                <li >TypeScript Angular 6.0</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Bock Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <h3>Back End</h3>
              <h4><sup>$</sup>2490<span> </span></h4>
              <ul>
                <li>SQL (MySQL)</li>
                <li>PHP</li>
                <li>Symfony PHP framework</li>
                <li>WordPress</li>
                <li>Software Testing</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Bock Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <span class="advanced">Advanced</span>
              <h3>Full Stack</h3>
              <h4><sup>$</sup>3990<span></span></h4>
              <ul>
                <li>HTML5 CSS3 JavaScript</li>
                <li>jQuery Bootstrap TypeScript</li>
                <li>Angular 6.0 SQL (MySQL)</li>
                <li>PHP AJAX Symfony</li>
                <li>WordPress Software Testing</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Bock Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

   

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Contact</h2>
          <p data-aos="fade-up">We are here for you contact us.</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>CodeFactory GmbH Kettenbrückengasse 23/2/12, 1050 Wien</p>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>info@example.com<br>contact@example.com</p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+43 666 6666<br>+43 555 55555 </p>
            </div>
          </div>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
  var request;
  
$('.todo1').click(function(event){
event.preventDefault();

   var $inputs = $(this).parent().find("input, select, button, textarea");
  // Serialize the data in the form
  var serializedData = $inputs.serialize();
    
   request = $.ajax({
       url: "block.php",
      type: "post",
       data:serializedData
   });

   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
       console.log(response);  
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



  
$('.todo2').click(function(event){
event.preventDefault();

   var $inputs = $(this).parent().find("input, select, button, textarea");
  // Serialize the data in the form
  var serializedData = $inputs.serialize();
    
   request = $.ajax({
       url: "as_admin.php",
      type: "post",
       data:serializedData
   });

   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
       console.log(response);   
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


  
$('.todo3').click(function(event){
event.preventDefault();

   var $inputs = $(this).parent().find("input, select, button, textarea");
  // Serialize the data in the form
  var serializedData = $inputs.serialize();
    
   request = $.ajax({
       url: "as_user.php",
      type: "post",
       data:serializedData
   });

   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
       console.log(response);   
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
<?php ob_end_flush(); ?>