<?php 
require("db.con.php");
$id = base64_decode($_GET['id']);

// first of all unlink the image from the upload folder then delete the record.
$img_sql = "SELECT * FROM `users` WHERE id = '{$id}'";
$img_result = mysqli_query($con, $img_sql) OR die("Image Query Failed.");
$img_row = mysqli_fetch_assoc($img_result);

unlink("upload/".$img_row['photo']);
// delete record
$sql = "DELETE FROM `users` WHERE id = '{$id}'";

$result = mysqli_query($con, $sql) OR die("Query Failed.");
if($result){
	header("Location:http://localhost/sportsEventReminder/admin/all_users.php");
}else{
	echo '<div class="alert alert-danger">
		<p>Can\'t delete records.</p>
	</div>';
}

 ?>
