<?php 
	session_start();
	$host ="localhost";
	$username ="root";
	$password ="";
	$dbname ="sportseventreminder";
	$con = mysqli_connect("$host", "$username", "$password", "$dbname") OR die("Connection failed." . mysqli_connect_error());

 ?>