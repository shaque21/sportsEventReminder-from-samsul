<?php 
require("db.con.php");
$id = base64_decode($_GET['id']);
// delete record
$sql = "DELETE FROM `notice` WHERE `notice_id` = '{$id}'";

$result = mysqli_query($con, $sql) OR die("Query Failed.");
if($result){
	header("Location:http://localhost/sportsEventReminder/admin/all_notice.php");
}else{
	echo '<div class="alert alert-danger">
		<p>Can\'t delete records.</p>
	</div>';
}

 ?>
