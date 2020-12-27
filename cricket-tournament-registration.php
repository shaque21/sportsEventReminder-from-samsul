<?php include "header.php"; 

$error_msg = "";
$error_msg_user = "";
$success_msg = "";
if(isset($_POST['submit'])){
	$teamname =  mysqli_real_escape_string($con,$_POST['teamname']);
	$college =  mysqli_real_escape_string($con,$_POST['college']);
	$mobile =  mysqli_real_escape_string($con,$_POST['mobile']);
	$captain =  mysqli_real_escape_string($con,$_POST['captain']);
	$player1 =  mysqli_real_escape_string($con,$_POST['player1']);
	$player2 =  mysqli_real_escape_string($con,$_POST['player2']);
	$player3 =  mysqli_real_escape_string($con,$_POST['player3']);
	$player4 =  mysqli_real_escape_string($con,$_POST['player4']);
	$player5 =  mysqli_real_escape_string($con,$_POST['player5']);
	$player6 =  mysqli_real_escape_string($con,$_POST['player6']);
	$player7 =  mysqli_real_escape_string($con,$_POST['player7']);
	$player8 =  mysqli_real_escape_string($con,$_POST['player8']);
	$player9 =  mysqli_real_escape_string($con,$_POST['player9']);
	$player10 =  mysqli_real_escape_string($con,$_POST['player10']);
	$status = $_POST['status'];
	
	$sql1 = "SELECT * FROM `cricket` WHERE `team_name` = '{$teamname}'";
	$result_sql1 = mysqli_query($con, $sql1) OR die("Team Query Failed.");
	if(mysqli_num_rows($result_sql1) > 0){
		$error_msg = '<div class="alert alert-danger text-center" role="alert">
						**This teamname already taken! Please try with another teamname.
				</div>';

	}else{
		$sql = "INSERT INTO `cricket`(`team_name`, `college_name`, `mobile`, `captain_name`, `player_1`, `player_2`, `player_3`, `player_4`, `player_5`, `player_6`, `player_7`, `player_8`, `player_9`, `player_10`, `status`) VALUES (
		'{$teamname}','{$college}','{$mobile}','{$captain}','{$player1}','{$player2}','{$player3}','{$player4}','{$player5}','{$player6}','{$player7}','{$player8}','{$player9}','{$player10}','{$status}')";
	$result = mysqli_query($con,$sql) OR die("Query Failed.");
	if($result){
		
		header("Location:http://localhost/sportsEventReminder/cricket-tournament-registration.php?ok=1");
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
			<h2 class="text-danger">Cricket Tournament Registration Form</h2>
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
						<div class="form-group">
						    <label for="captain">Captain Name :</label>
						    <input type="text" name="captain" class="form-control" placeholder="Captain name" id="captain" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						    <label for="player1">Player1 Name :</label>
						    <input type="text" name="player1" class="form-control" placeholder="Player1 name" id="player1" required>
						</div>
						<div class="form-group">
						    <label for="player3">Player3 Name :</label>
						    <input type="text" name="player3" class="form-control" placeholder="Player3 name" id="player3" required>
						</div>
						<div class="form-group">
						    <label for="player5">Player5 Name :</label>
						    <input type="text" name="player5" class="form-control" placeholder="Player5 name" id="player5" required>
						</div>
						<div class="form-group">
						    <label for="player7">Player7 Name :</label>
						    <input type="text" name="player7" class="form-control" placeholder="Player7 name" id="player7" required>
						</div>
						<div class="form-group">
						    <label for="player9">Player9 Name :</label>
						    <input type="text" name="player9" class="form-control" placeholder="Player9 name" id="player9" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <label for="player2">Player2 Name :</label>
						    <input type="text" name="player2" class="form-control" placeholder="Player2 name" id="player2" required>
						</div>
						<div class="form-group">
						    <label for="player4">Player4 Name :</label>
						    <input type="text" name="player4" class="form-control" placeholder="Player4 name" id="player4" required>
						</div>
						<div class="form-group">
						    <label for="player6">Player6 Name :</label>
						    <input type="text" name="player6" class="form-control" placeholder="Player6 name" id="player6" required>
						</div>
						<div class="form-group">
						    <label for="player8">Player8 Name :</label>
						    <input type="text" name="player8" class="form-control" placeholder="Player8 name" id="player8" required>
						</div>
						<div class="form-group">
						    <label for="player10">Player10 Name :</label>
						    <input type="text" name="player10" class="form-control" placeholder="Player10 name" id="player10" required>
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