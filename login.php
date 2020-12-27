<?php 
	require('db.inc.php');
	$error_msg="";
	if(isset($_POST['user_login']) && isset($_POST['email']) && isset($_POST['password'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = $_POST['password'];
		$sql = "SELECT * FROM `users` WHERE `email` = '{$email}' AND `password` = '{$password}'";
		$result = mysqli_query($con, $sql) or die('Query Failed');
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
			    $_SESSION['EMAIL'] = $row['email'];
			    $_SESSION['USER_ID'] = $row['id'];
			    $_SESSION['USER_NAME'] = $row['name'];
			    $_SESSION['ROLE'] = $row['role'];
			    if(isset($_SESSION['USER_NAME'])){
		    	header("Location:http://localhost/sportsEventReminder/index.php");
		    	die();
		    	}   
			}
		}
		else{
			$error_msg = "Please insert valid email and password !";
		}
    }
	mysqli_close($con);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
	<style>
		#login-page .login-form input{
			color: #fff;
		}
	</style>
</head>
<body>
	<div class="container-fluid" id="login-page">
		<div class="login-form">
			<h2>login Form</h2>
			<!-- form input -->
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="form-group">
				    <label for="email">Email Address :</label>
				    <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" id="email" required>
				</div>
				<div class="form-group">
				    <label for="password">Password :</label>
				    <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" required>
				</div>
				<div class="login-btn d-flex justify-content-center align-items-center mt-5">
					<button type="submit" class="btn" name="user_login" >login</button>
					
				</div>
				<div class="login-btnn d-flex justify-content-center align-items-center mt-5">
					<a href="registration.php" class="btn">create new account</a>
				</div>
				<div class="text-danger mt-2 bg-white pl-3">
				  	<?php echo $error_msg; ?>
				 </div>
			</form>
			
	</div>
</body>
</html>