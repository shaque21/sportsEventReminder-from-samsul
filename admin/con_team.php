<?php 
require("db.con.php");
if(isset($_GET['bid']) && isset($_GET['b_catid']) && isset($_GET['id'])){
	$id = base64_decode($_GET['bid']);
	$table_id = base64_decode($_GET['id']);
	$cat_id = base64_decode($_GET['b_catid']);
	$b_sql = "SELECT * FROM `badminton`  WHERE `id` = {$id}";
	$b_res = mysqli_query($con,$b_sql) or die("Query Unsuccessful.");
	if(mysqli_num_rows($b_res) > 0){
		while ($b_row = mysqli_fetch_assoc($b_res)) {
		    $team_name = $b_row['team_name'];
		    $college_name = $b_row['college_name'];
		    $captain_name = $b_row['captain_name'];
		    $mobile = $b_row['mobile'];
		}
	}
	$cat_sql = "SELECT * FROM `category`  WHERE `category_id` = {$cat_id}";
	$cat_res = mysqli_query($con,$cat_sql) or die("Query Unsuccessful.");
	if(mysqli_num_rows($cat_res) > 0){
		while ($cat_row = mysqli_fetch_assoc($cat_res)) {
		    $table_name = strtolower($cat_row['category_name']);

		}
	}

}

if(isset($_GET['cid']) && isset($_GET['c_catid']) && isset($_GET['id'])){
	$id = base64_decode($_GET['cid']);
	$table_id = base64_decode($_GET['id']);
	$cat_id = base64_decode($_GET['c_catid']);
	$c_sql = "SELECT * FROM `cricket`  WHERE `id` = {$id}";
	$c_res = mysqli_query($con,$c_sql) or die("Query Unsuccessful.");
	if(mysqli_num_rows($c_res) > 0){
		while ($b_row = mysqli_fetch_assoc($c_res)) {
		    $team_name = $b_row['team_name'];
		    $college_name = $b_row['college_name'];
		    $captain_name = $b_row['captain_name'];
		    $mobile = $b_row['mobile'];
		}
	}
	$cat_sql = "SELECT * FROM `category`  WHERE `category_id` = {$cat_id}";
	$cat_res = mysqli_query($con,$cat_sql) or die("Query Unsuccessful.");
	if(mysqli_num_rows($cat_res) > 0){
		while ($cat_row = mysqli_fetch_assoc($cat_res)) {
		    $table_name = strtolower($cat_row['category_name']);

		}
	}

}

if(isset($_GET['fid']) && isset($_GET['f_catid']) && isset($_GET['id'])){
	$id = base64_decode($_GET['fid']);
	$table_id = base64_decode($_GET['id']);
	$cat_id = base64_decode($_GET['f_catid']);
	$f_sql = "SELECT * FROM `football`  WHERE `id` = {$id}";
	$f_res = mysqli_query($con,$f_sql) or die("Query Unsuccessful.");
	if(mysqli_num_rows($f_res) > 0){
		while ($b_row = mysqli_fetch_assoc($f_res)) {
		    $team_name = $b_row['team_name'];
		    $college_name = $b_row['college_name'];
		    $captain_name = $b_row['captain_name'];
		    $mobile = $b_row['mobile'];
		}
	}
	$cat_sql = "SELECT * FROM `category`  WHERE `category_id` = {$cat_id}";
	$cat_res = mysqli_query($con,$cat_sql) or die("Query Unsuccessful.");
	if(mysqli_num_rows($cat_res) > 0){
		while ($cat_row = mysqli_fetch_assoc($cat_res)) {
		    $table_name = strtolower($cat_row['category_name']);

		}
	}

}
if (isset($team_name) && isset($cat_id)) {
	$check_sql = "SELECT * FROM `approved_team` WHERE `team_name` = '{$team_name}' AND `category` = {$cat_id}";
	$check_res = mysqli_query($con, $check_sql) OR die("Check Query Failed.");
	if(mysqli_num_rows($check_res) > 0){
		echo '<div style="color:tomato;background-color: lightgray;padding: 15px;border-radius: 5px;width: 80%;font-size: 18px;font-family: monospace;text-align:center;">
			<p>This team is already approved.</p>
		</div>';
	}else{
		// insert data into approved table.

		$sql = "INSERT INTO `approved_team`(`team_name`, `college_name`, `captain_name`, `mobile`, `category`) VALUES('{$team_name}','{$college_name}','{$captain_name}','{$mobile}','{$cat_id}');";
		$sql .= "UPDATE $table_name SET `status` = 1 WHERE `id` = {$table_id}";

		$result = mysqli_multi_query($con, $sql) OR die("Query Failed.");
		if($result){
			header("Location:http://localhost/sportsEventReminder/admin/pending_team.php");
		}else{
			echo '<div class="alert alert-danger">
				<p>Can\'t delete records.</p>
			</div>';
		}

	}
}


 ?>
