<?php 
	include 'header.php';
	$error_msg="";
	$success_msg = "";
	if(isset($_POST['save'])){
		$old = $_POST['oldp'];
		$new = $_POST['newp'];
		$cp = $_POST['cp'];

		if($old == "" || $new == "" || $cp == ""){
			$error_msg= "All Fields are required !!";
		}
		else{
			$sql = "SELECT `password` FROM `users` WHERE id = '{$_SESSION['USER_ID']}'";
			$result = mysqli_query($con, $sql) OR die("Query Failed.");
			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_assoc($result)) {
				    if($old == $row['password']){
				    	if($new == $cp){
							$query = "UPDATE `users` SET `password`='{$new}' WHERE `id`='{$_SESSION['USER_ID']}'";
							$result1 = mysqli_query($con, $query) OR die("Query Failed.");
							if($result1){
								$success_msg= "Password Updated Successfully !!.";
							}	
						}
						else{
								$error_msg="New and Confirm password is not matched !!.";
							}
				    }
				    else{
						$error_msg= "Wrong Old Password !!.";
					}
				}
				
			}
			
		}
	}
 ?>

<div class="container-fluid mb-4" id="profile-page">
	<div class="row">
		<!-- profile sidebar -->
		<?php include 'sidebar.php'; ?>
		<!-- profile content -->
		<div class="col-md-10 col-sm-12 profile-content p-5">
			<h2>Update Your Password</h2>
			<div class="pass-form" style="padding: 50px; font-weight: 500;">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
					<div class="form-group">
					    <label for="password">Enter Your Old Password :</label>
					    <input type="password" class="form-control" placeholder="Enter Password" id="old-password" name="oldp" required>
					</div>
					<div class="form-group">
					    <label for="password">Enter Your New Password :</label>
					    <input type="password" class="form-control" placeholder="Enter Password" id="new-password" required name="newp">
					</div>
					<div class="form-group">
					    <label for="password">Confirm Password :</label>
					    <input type="password" class="form-control" placeholder="Enter Password" id="con-password" required name="cp">
					</div>
					<input type="submit" value="Update Password" name="save" class="btn btn-success"/>
					<input type="reset" class="btn btn-success"/>
					<div class="alert alert-success text-danger mt-2 bg-transparent">
				  	<?php echo $error_msg; ?>
					 </div>
					 <div class="alert alert-success text-success mt-2 ">
					  	<?php echo $success_msg; ?>
					 </div>
				</form>
			</div>
		</div>
	</div>
</div>
 <?php 
	include 'footer.php';
 ?>
 </body>
</html>