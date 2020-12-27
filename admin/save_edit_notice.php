<?php 

require("db.con.php");
if(isset($_POST['submit'])){
	$eid = $_POST['notice_id'];
	$title =  mysqli_real_escape_string($con,$_POST['title']);
	$description =  mysqli_real_escape_string($con,$_POST['description']);
	$user_email =  mysqli_real_escape_string($con,$_POST['user']);
	
	
	$sql ="UPDATE `notice` SET `title`='{$title}',`description`='{$description}',`user_email`='{$user_email}' WHERE `notice_id` = '{$eid}' ";
	$result = mysqli_query($con,$sql) OR die("Query Failed.");
	if($result){
		
		header("Location:http://localhost/sportsEventReminder/admin/edit_notice.php?ok=1");
		exit;
		
	}
	mysqli_close($con);
		
}
 ?>