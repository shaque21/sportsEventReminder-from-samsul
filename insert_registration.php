<?php 

include "db.inc.php";

if(isset($_FILES['fileToUpload'])){
      $errors= array();
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size =$_FILES['fileToUpload']['size'];
      $file_tmp =$_FILES['fileToUpload']['tmp_name'];
      $file_type=$_FILES['fileToUpload']['type'];
      $file_name = strtolower($file_name);
      $file_ext=explode('.',$file_name);
      $file_ext = end($file_ext);
      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions) === false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors) == true){
         move_uploaded_file($file_tmp,"upload/".$file_name);
      }else{
         print_r($errors);
         die();
      }
  }
  $name =  mysqli_real_escape_string($con,$_POST['name']);
  $mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
  $email =  mysqli_real_escape_string($con,$_POST['email']);
  $password =  mysqli_real_escape_string($con,$_POST['password']);
  $gender =  mysqli_real_escape_string($con,$_POST['gender']);
  $dob =  mysqli_real_escape_string($con,$_POST['dob']);


  $query = "SELECT `email` FROM `users` WHERE email = '{$email}'";
  $result1 = mysqli_query($con,$query) or die("Query unsuccessful.");
    if(mysqli_num_rows($result1) > 0){
      echo "<p style = 'color:red; text-align:center; margin:10px 0px; font-size: 18px;'>This email alreay exist. Please try with another email address !</p>
      	<a style = 'color:blue; text-align:center;' href='registration.php'>Go Back..</a>
      ";
    }
    else{
    	$sql = "INSERT INTO `users`(`name`, `mobile`, `email`, `password`, `gender`, `image`, `dob`) VALUES ('{$name}','{$mobile}','{$email}','{$password}','{$gender}','{$file_name}','{$dob}')";
  		$result = mysqli_query($con, $sql) OR die("Query Unsuccessfull.");
  		if($result){
		  	header("Location:login.php");
		 }
		 else{
		  	echo "<p>Can\'t save records.</p>";
		 }
		 mysqli_close($con);
    }
  
  

 ?>