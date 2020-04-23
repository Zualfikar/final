<?php
ob_start();
session_start();
require_once '../connect/dbconnect.php';

// select logged-in users details


if($_POST){
$title=$_POST["title"];
$type=$_POST["type1"];
$level=$_POST["type2"];
$term=$_POST["type3"];
$place=$_POST["place"];
$price=$_POST["price"];
$capacity=$_POST["capacity"];
$image=$_POST["image"];
//image
  $name = $_FILES['file']['name'];
  echo $name;
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
echo $target_file;
  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo $imageFileType;
  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
//image

  
  
 if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image2 = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    echo $image2;
  }

//image



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

  $sql="INSERT INTO course (title,type,level,term,place,price,capacity,course_img,duration,times,teachers,benefits,method,requirements,description,content,long_des,start_date,end_date,long_img) VALUES ('$title','$type','$level','$term','$place','$price','$capacity','$image','$duration','$times','$teachers','$benefits','$method','$requirments','$description','$content','$long_des','$start_date','$end_date','$image2')";
  
  mysqli_query($conn,$sql);
  

}


?>