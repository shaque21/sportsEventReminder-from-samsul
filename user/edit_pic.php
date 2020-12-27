<?php 
require("../db.inc.php");
				if(isset($_POST['submit'])){
					$name = $_SESSION['USER_NAME'];
					if (isset($_FILES['image'])) {
					  $errors= array();
					  $file_name = $_FILES['image']['name'];
					  $file_size =$_FILES['image']['size'];
					  $file_tmp =$_FILES['image']['tmp_name'];
					  $file_type=$_FILES['image']['type'];
					  $file_name = strtolower($file_name);
					  $file_ext=explode('.',$file_name);
					  $file_ext = end($file_ext);
					  $extensions= array("jpeg","jpg","png");
					  $file_name = $name.'.'.$file_ext;

					  if(in_array($file_ext,$extensions) === false){
					     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
					  }

					  if($file_size > 2097152){
					     $errors[]='File size must be excately 2 MB';
					  }

					  if(empty($errors) == true){
					     move_uploaded_file($file_tmp,"../upload/".$file_name);
					  }else{
					     print_r($errors);
					     die();
					  }
					}
					$pic_sql = "UPDATE `users` SET `image`='{$file_name}' WHERE `name` = '{$name}'";
					$result_pic = mysqli_query($con,$pic_sql) OR die("Query Failed.");
					if($result_pic){
						header("Location:http://localhost/sportsEventReminder/user/user_profile.php");
					}
				}

				 ?>