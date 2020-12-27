<?php 
include "header.php";
$error_msg = "";
$error_msg_user = "";
$success_msg = "";
if(isset($_POST['submit'])){
	$teamname =  mysqli_real_escape_string($con,$_POST['teamname']);
	$college =  mysqli_real_escape_string($con,$_POST['college']);
	$mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
	$captain =  mysqli_real_escape_string($con,$_POST['captain']);
	$player1 =  mysqli_real_escape_string($con,$_POST['player1']);
	$status = $_POST['status'];

	$sql1 = "SELECT * FROM `badminton` WHERE `team_name` = '{$teamname}'";
	$result_sql1 = mysqli_query($con, $sql1) OR die("Team Query Failed.");
	if(mysqli_num_rows($result_sql1) > 0){
		$error_msg = '<div class="alert alert-danger text-center" role="alert">
						**This teamname already taken! Please try with another teamname.
				</div>';

	}else{
		$sql = "INSERT INTO `badminton`(`team_name`, `college_name`, `mobile`, `captain_name`, `player_1`, `status`) VALUES (
		'{$teamname}','{$college}','{$mobile}','{$captain}','{$player1}','{$status}')";	
	$result = mysqli_query($con,$sql) OR die("Query Failed.");
	if($result){
		
		header("Location:http://localhost/sportsEventReminder/badminton-tournament-registration.php?ok=1");
		exit;
		
	}
	mysqli_close($con);
	}
	
		
}

?>

<div class="container-fluid" id="tournament-registration-page" style="margin-top: 7%">
		<div class="tournament-registration-form">
			<?php
				//Check for success flag in get query param
				if(isset($_GET['ok'])){
				$ok = $_GET['ok'];
				//Insert this code where you wanted to show the msg
				if($ok)  {
				echo '<div class="alert alert-success text-center" role="alert">
						Data Inserted Successfully.
				</div>';
				}
			}
			if(isset($error_msg)){echo $error_msg;}
		?>
			<h2 class="text-danger">Badminton Tournament Registration Form</h2>
			<!-- form input -->
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
				<div class="row">
					<div class="col">
						<div class="form-group">
						    <label for="teamname">Team Name :</label>
						    <input type="text" name="teamname" class="form-control" placeholder="Team name" id="teamname" required>
						</div>
						<div class="form-group">
						    <label for="college">College Name :</label>
						    <input type="text" name="college" class="form-control" placeholder="College name" id="college" required>
						</div>
						<div class="form-group">
						    <label for="mobile">Mobile :</label>
						    <input type="text" name="mobile" placeholder="0 1 *********" class="form-control" required id="mobile" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						    <label for="captain">Captain Name :</label>
						    <input type="text" name="captain" class="form-control" placeholder="Captain name" id="captain" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <label for="player1">Player1 Name :</label>
						    <input type="text" name="player1" class="form-control" placeholder="Player1 name" id="player1" required>
						</div>
						<div class="form-group">
						    <input type="text" name="status" hidden class="form-control" placeholder="Player10 name" id="status">
						</div>
					</div>
				</div>
				<div class="tournament-register-btn d-flex justify-content-center align-items-center mt-5">
					<input type="submit" name="submit" value="Register" class="btn1 mr-3" style="letter-spacing: 1px;">
					<button type="reset" class="btn2 ml-3" name="submit">Reset</button>
				</div>
			</form>
	</div>
</div>






<?php include "footer.php"; ?>
</body>
</html>