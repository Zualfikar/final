<?php
ob_start();
session_start(); // start a new session or continues the previous

if( isset($_SESSION['user'])!="" ){
 header("Location: user/home.php" ); // redirects to home.php
}
include_once 'connect/dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {

 // sanitize user input to prevent sql injection
 $first_name = trim($_POST['first_name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $first_name = strip_tags($first_name);

  // strip_tags — strips HTML and PHP tags from a string

  $first_name = htmlspecialchars($first_name);
 // htmlspecialchars converts special characters to HTML entities
$last_name = trim($_POST['last_name']);
$last_name = strip_tags($last_name);
$last_name = htmlspecialchars($last_name);


$phone = trim($_POST[ 'phone']);
 $phone = strip_tags($phone);
 $phone = htmlspecialchars($phone);



 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

//image
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
//image

  // basic name validation
 if (empty($first_name)) {
  $error = true ;
  $first_nameError = "Please enter your full name.";
 } else if (strlen($first_name) < 3) {
  $error = true;
  $first_nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
  $error = true ;
  $first_nameError = "Name must contain alphabets and space.";
 }

 if (empty($last_name)) {
  $error = true ;
  $last_nameError = "Please enter your full name.";
 } else if (strlen($last_name) < 3) {
  $error = true;
  $last_nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
  $error = true ;
  $last_nameError = "Name must contain alphabets and space.";
 }

 if (empty($phone)) {
  $error = true ;
  $phoneError = "Please enter your number.";
 } else if (strlen($phone) < 6) {
  $error = true;
  $phoneError = "Number must have at least 6 numbers.";
 } 


 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT email FROM user WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);
$image;
 if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  }else {
    $error=true;
    $imageError="make sure that your image has extention as(jpg or jpeg or png or gif)";
  }


 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO user(first_name,last_name,email,password,phone,user_img,status,active) VALUES('$first_name','$last_name','$email','$password','$phone','$image','user','yes')";

  $res = mysqli_query($conn, $query);
  

 
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($first_name);
   unset($last_name);
   unset($phone);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }

 
 }


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet"  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"  crossorigin="anonymous">

</head>
<body>
  <div class="container ">
    <div>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" enctype='multipart/form-data' >
 
     
            <h2>Sign Up.</h2>
            <hr />
         
            <?php
   if ( isset($errMSG) ) {
 
   ?>
           <div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       </div>

<?php
  }
  ?>
         
     
         

            <input type ="text"  name="first_name"  class ="form-control"  placeholder ="Enter your first Name"  maxlength ="50"   value = "<?php echo $first_name ?>"  />
     
               <span   class = "text-danger" > <?php   echo  $first_nameError; ?> </span >
         
                  <input type ="text"  name="last_name"  class ="form-control"  placeholder ="Enter your last Name"  maxlength ="50"   value = "<?php echo $last_name ?>"  />
     
               <span   class = "text-danger" > <?php   echo  $last_nameError; ?> </span >
            
            <input   type = "email"   name = "email"   class = "form-control"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>"  />
   
               <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
     
         
     
           
       
            <input   type = "password"   name = "pass"   class = "form-control"   placeholder = "Enter Password"   maxlength = "15" value = "<?php echo $password ?>" />
           
               <span   class = "text-danger" > <?php   echo  $passError; ?> </span >


               <input   type = "text"   name = "phone"   class = "form-control"   placeholder = "Enter Your phone number"   maxlength = "40"   value = "<?php echo $phone ?>"  />
   
               <span   class = "text-danger" > <?php   echo  $phoneError; ?> </span >

               <p>uploaud your photo</p><input type='file' name='file' value="upload photo" />
              <span   class = "text-danger" > <?php   echo  $imageError; ?> </span >




            <hr />
 
         
            <button   type = "submit"   class = "btn btn-block btn-primary"   name = "btn-signup" >Sign Up</button >
            <hr  />
         
            <a   href = "index.php" >Sign in Here...</a>
   
 
   </form >
 </div>
 <div>
  <?php
if ( isset($_POST['btn-signup']) ) {
$sql = "SELECT user_img FROM user WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$image = $row['name'];
$image_src = "upload/".$image;}?>
<img src='<?php echo $image_src;  ?>' >


 </div>
 </div>
</body >
</html >

<?php  ob_end_flush(); ?>