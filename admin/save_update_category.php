<?php 

require("db.con.php");
if(isset($_POST['submit'])){
	$eid = $_POST['category_id'];
	$name =  mysqli_real_escape_string($con,$_POST['category_name']);
	
	$sql = "UPDATE `category` SET `category_name` = '{$name}' WHERE `category_id` = '{$eid}'";
	$result = mysqli_query($con,$sql) OR die("Query Failed.");
	if($result){
		
		header("Location:http://localhost/sportsEventReminder/admin/update_category.php?ok=1");
		exit;
		
	}
	mysqli_close($con);
		
}
 ?>