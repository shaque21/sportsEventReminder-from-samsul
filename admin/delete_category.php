<?php 
require("db.con.php");
$id = base64_decode($_GET['id']);
$category_name = base64_decode($_GET['category_name']);
// delete record
$sql = "DELETE FROM `category` WHERE `category_id` = '{$id}';";
$sql .= "DELETE FROM `event` WHERE `category` = '{$id}';";
$sql .= "DELETE FROM `approved_team` WHERE `category` = '{$id}';";
$sql .= "DROP TABLE $category_name";
$result = mysqli_multi_query($con, $sql) OR die("Query Failed.");
if($result){
	header("Location:http://localhost/sportsEventReminder/admin/category.php");
}else{
	echo '<div class="alert alert-danger">
		<p>Can\'t delete records.</p>
	</div>';
}

 ?>
