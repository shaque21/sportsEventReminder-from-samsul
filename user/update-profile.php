<?php 
	include 'header.php';
 ?>

<div class="container-fluid mb-4" id="profile-page">
	<div class="row">
		<!-- profile sidebar -->
		<?php include 'sidebar.php'; ?>
		<!-- profile content -->
		<div class="col-md-10 col-sm-12 profile-content p-4">
			<h2>Update Your Profile</h2>
			<div id="show_data"></div>
			<div class="form-data">
				<?php 

				$sql = "SELECT * FROM `users` WHERE id = '{$_SESSION['USER_ID']}'";
				$result = mysqli_query($con, $sql) OR die("Query Failed.");
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
					
				 ?>
				<form action="" method="POST"  id="update_form">
				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label for="name">Full Name :</label>
					    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" id="name" required value="<?php echo $row['name']; ?>">
					</div>
					<div class="form-group">
					    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" id="id" hidden required value="<?php echo $row['id']; ?>">
					</div>
					<div class="form-group">
					    <label for="email">Email Address :</label>
					    <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" id="email" required value="<?php echo $row['email']; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="mobile">Mobile No :</label>
					    <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile Number" id="mobile" required value="<?php echo $row['mobile']; ?>">
					</div>
					<div class="form-group">
		              <label for="gender">Gender :</label>
		              <select name="gender" class="form-control" required id="gender">
		                  <option disabled> Select Gender</option>
		                  
		                  	<?php 
		                  	if($row['gender'] == 'Male'){
		                  		$male = "selected";
		                  		echo '<option {$male} value="$row["gender"]" {$male}> Male</option>
		                  			<option value="Female" > Female</option>
		                  <option value="other" > Others</option>';
		                  	}
		                  	if($row['gender'] == 'Female'){
		                  		$female = "selected";
		                  		echo '<option {$female} value="$row["gender"]" {$female}> Female</option>
		                  		<option value="Male" > Male</option>
		                  <option value="Other" > Others</option>';
		                  	}
		                  	if($row['gender'] == 'Other'){
		                  		$other = "selected";
		                  		echo '<option {$other} value="$row["gender"]" {$other}> Others</option>
		                  		<option value="Male" > Male</option>
		                  		<option value="Female" > Female</option>
		                  ';
		                  	}

		                  	 ?>
		              </select>
		          	</div>
				</div>
			</div>
			
          	<div class="form-group mt-3">
			    <label for="dob">Date Of Birth :</label>
			    <input type="date" name="dob" class="form-control" placeholder="Enter Date" id="dob" style="
    				background-color: #fff;" value="<?php echo $row['dob']; ?>">
			</div>
			<div class="register-btn d-flex justify-content-center align-items-center mt-5">
				<button class="btn btn-success" id="edit_btn" name="submit">Save</button>
				<a href="profile.php" class="btn btn-success ml-3">Profile</a>
			</div>
			</form>
		<?php }
		} ?>
			</div>
			
		</div>
	</div>
</div>
 <?php 
	include 'footer.php';
 ?>
 <script>
 	$(document).ready(function(){
 		$(document).on("click","#edit_btn",function(e){
			// pick records every value from the load update form
			e.preventDefault();
			var id = $("#id").val();
			var name = $("#name").val();
			var mobile = $("#mobile").val();
			var email = $("#email").val();
			var gender = $("#gender").val();
			var dob = $("#dob").val();


			$.ajax({
				url: "update.php",
				type: "POST",
				data: {
					id: id,
					name: name,
					mobile: mobile,
					email: email,
					gender: gender,
					dob: dob,
				},
				success: function(data){
					$("#show_data").html(data);
					
				}
			});

		});
	});
 </script>
 </body>
</html>