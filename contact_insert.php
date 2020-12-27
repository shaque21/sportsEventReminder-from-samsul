<?php 

	require("db.inc.php");
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$sql = "INSERT INTO `contact_info`(`name`, `mobile`, `email`, `message`) VALUES ('{$name}','{$mobile}','{$email}','{$message}')";

	if(mysqli_query($con, $sql)){
		echo 1;
	}else {
		echo 0;
	}

 ?>