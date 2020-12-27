<?php 

	require("db.inc.php");
	session_start();
	session_unset();

  	session_destroy();

	header("Location:http://localhost/sportsEventReminder/index.php");
	die();

 ?>