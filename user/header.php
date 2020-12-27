<?php 
require('../db.inc.php');
if(!isset($_SESSION['ROLE'])){
	header("Location:http://localhost/../sportsEventReminder/index.php");
	die();
 
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sports Event Reminder</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="dataTables.bootstrap4.min.css.css">
	<link rel="stylesheet" href="../css/slick.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="../css/tournament.css">
	<link rel="stylesheet" href="../css/profile.css">
	<link rel="stylesheet" href="../css/custom1.css">
	<style>
		.cat-btn{
			font-size: 16px;
			color: #fff;
		}
		.cat-btn:hover,
		.cat-btn:focus{
			color: #fff;
			background-color: #f53b57;
		}
	</style>
</head>
<body>
	<!-- start menu -->
	<nav class="navbar navbar-expand-lg navbar-light  full-menu">
        <div class="container">
            <a class="navbar-brand nav-logo" href="../index.php" style="box-shadow: 0px 2px 6px rgba(0,0,0,0.3);padding: 10px;">
                <span class="text-white">SPORTS EVENT</span>
                <span class="logo">REMINDER</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
                    </li>
                    <!-- Dropdown -->
                    <?php if (isset($_SESSION['ROLE'])) {?>
                    <div class="dropdown" style="    margin-left: 0px;
					    text-transform: uppercase;
					    font-family: 'Poppins', sans-serif;
					    font-weight: 400;
					    color: #fff;">
					    <button type="button" class="cat-btn btn  dropdown-toggle text-uppercase" data-toggle="dropdown">
					      Category
					    </button>
					    <div class="dropdown-menu log-link">
					    	<?php
                            $query = "SELECT * FROM category";
                            $result = mysqli_query($con,$query) or die("Query Unsuccessful.");
                            if(mysqli_num_rows($result) > 0){
                              while ($row = mysqli_fetch_assoc($result)) {
                           ?>
				        <a class="dropdown-item" href="../category.php?cid=<?php echo base64_encode($row['category_id']); ?>"><?php echo $row['category_name']; ?></a>
				        <?php 
                            }
                        } ?>
					    </div>
					</div>
				<?php } ?>
				    <!-- end dropdown -->
				    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php" style="letter-spacing: 1px">Profile</a>
                    </li>
                    <div class="dropdown log-div">
					    <button type="button" class="log-btn btn  dropdown-toggle text-uppercase" data-toggle="dropdown">
					      <?php if(isset($_SESSION['ROLE'])){
					      	echo $_SESSION['USER_NAME'];
					      }
					      else{
					      	echo "REGISTER / LOGIN";
					      } ?>
					    </button>
					    <div class="dropdown-menu log-link">
					    	<?php if(isset($_SESSION['ROLE'])){
					      	echo "<a class='dropdown-item' style='letter-spacing:1px;' href='../logout.php'>logout</a>";
					      }
					      else{
					      	echo "<a class='dropdown-item' href='../login.php'>login</a>
					      	<a class='dropdown-item' href='../registration.php'>Registration</a>";
					      } ?>
					    </div>
					</div>

                </ul>

            </div>
        </div>
    </nav>
