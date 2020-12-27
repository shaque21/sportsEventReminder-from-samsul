<?php 

require("../db.inc.php");
if(isset($_POST['submit'])){
	$eid = $_POST['id'];
	$name =  mysqli_real_escape_string($con,$_POST['name']);
	$mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
	$email =  mysqli_real_escape_string($con,$_POST['email']);
	$dob =  mysqli_real_escape_string($con,$_POST['dob']);
	
	
	
		$sql = "UPDATE `users` SET `name` = '{$name}', `mobile` = '{$mobile}', `email` = '{$email}', `dob` = '{$dob}' WHERE `id` = '{$eid}'";
		$result = mysqli_query($con,$sql) OR die("Query Failed.");
		if($result){
			
			header("Location:http://localhost/sportsEventReminder/user/edit_user_profile.php?ok=1");
			exit;
			
		}
		mysqli_close($con);
		
}
 ?>