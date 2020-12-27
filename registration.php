<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
</head>
<body>
	<div class="container-fluid" id="registration-page">
		<div class="registration-form">
			<h2>User Registration Form</h2>
			<!-- form input -->
			<form action="insert_registration.php" method="POST" enctype="multipart/form-data" id="registration_form">
				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label for="name">Full Name :</label>
					    <input type="text" style="color: #fff;" name="name" class="form-control" placeholder="Enter Your Name" id="name" required >
					</div>
					<div class="form-group">
					    <label for="email">Email Address :</label>
					    <input type="email" style="color: #fff;" name="email" class="form-control" placeholder="Enter Your Email Address" id="email" required >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="mobile">Mobile No :</label>
					    <input type="text" style="color: #fff;" name="mobile" class="form-control" placeholder="Enter Your Mobile Number" id="mobile" required >
					</div>
					<div class="form-group">
					    <label for="password">Password :</label>
					    <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" required style="color: #fff;" >
					</div>
				</div>
			</div>
			<div class="form-group">
              <label for="gender">Gender :</label>
              <select name="gender" style="color: #fff;background-color: transparent;" class="form-control" required id="gender">
                  <option style="color: #fff;background-color: #ff5e57;" disabled selected> Select Gender</option>
                  <option style="color: #fff;background-color: #ff5e57;" value="male"> Male</option>
                  <option style="color: #fff;background-color: #ff5e57;" value="female"> Female</option>
                  <option style="color: #fff;background-color: #ff5e57;" value="other"> Others</option>
              </select>
          	</div>
			<div class="form-group mt-3">
              <label for="fileToUpload">Upload Your Image :</label>
              <input type="file" name="fileToUpload" id="image" required style="background-color: #ff5e57;color: #fff;" required>
          	</div>
          	<div class="form-group mt-3">
			    <label for="dob">Date Of Birth :</label>
			    <input type="date" name="dob" class="form-control" placeholder="Enter Date" id="dob" style="
    				background-color: #fff;" >
			</div>
			<div class="register-btn d-flex justify-content-center align-items-center mt-5">
				<button class="btn mr-3" id="save_btn" name="submit">Register</button>
				<button type="reset"  class="btn ml-3" name="submit">Reset</button>
			</div>
			</form>
			<p>Already Have An Account ? <span ><a href="login.php" style="color: #000;font-weight: 700;">Click Here...</a></span></p>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 	<script src="js/main.js"></script>

</body>
</html>