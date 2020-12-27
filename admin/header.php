<?php require("db.con.php");

if(!isset($_SESSION['AD_USER_NAME'])){
	header("Location:http://localhost/sportsEventReminder/admin/login.php");
	die();
}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SMS Dashboard</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
		<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<!-- header section start -->
		<section id="header" class="container">
			<nav style="background-color: #dfe4ea;" class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" style="    text-transform: uppercase;
					font-weight: 600;
					letter-spacing: 1px;
					color: #fff;
					background-color: #007bff;
					padding: 5px 15px;
					box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
				}" href="index.php">Sports event reminder</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active mr-2 ml-2">
							<a class="nav-link btn btn-outline-primary" href="profile.php">
								<i class="far fa-user mr-2"></i>Welcome to <?php echo $_SESSION['AD_USER_NAME']; ?>
							</a>
						</li>
						<li class="nav-item active mr-2 ml-2">
							<a class="nav-link btn btn-outline-primary text-danger" href="logout.php">
								<i class="fa fa-power-off mr-2 text-danger" aria-hidden="true"></i>
								Logout
							</a>
						</li>
						
					</ul>
				</div>
			</nav>
		</section>
		<!-- header section end -->
		<!-- content section start -->
		<div id="main-content" class="container">
			<div class="row">