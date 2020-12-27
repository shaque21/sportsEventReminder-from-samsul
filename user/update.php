<?php 

  require("../db.inc.php");

 
 $id = $_POST['id'];
 $name = $_POST['name'];
 $mobile = $_POST['mobile'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $dob = $_POST['dob'];
 
 $sql = "UPDATE `users` SET `name`='{$name}',`mobile`='{$mobile}',`email`='{$email}',`gender`='{$gender}',`dob`='{$dob}' WHERE `id`={$id}";

  if(mysqli_query($con, $sql)){
  	echo "<div class='alert alert-success'>
  		Data Updated successfully !!!
  	</div>";
  }else {
  	echo "<div class='alert alert-danger'>
  		Something Went Wrong. Please Try Again Later !!!
  	</div>";
  }
  ?>