<?php
require("header.php");
require("sidebar.php");
$error_msg = "";
if(isset($_POST['submit'])){
	$name =  mysqli_real_escape_string($con,$_POST['category_name']);
	
	$check_sql = "SELECT * FROM `category` WHERE `category_name` = '{$name}'";
	$check_res = mysqli_query($con,$check_sql) OR die("Query Failed.");
	if(mysqli_num_rows($check_res) > 0){
		$error_msg = '<div class="alert alert-danger text-center" role="alert">
						This category already exist! Please try another name.
				</div>';
	}else{
		$sql = "INSERT INTO `category`(`category_name`) VALUES ('{$name}')";
		if($name == 'Football' || $name == 'football' || $name == 'FOOTBALL'){
			$sql_table = "CREATE TABLE $name (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,team_name VARCHAR (255) UNIQUE,college_name VARCHAR (255),mobile VARCHAR (15),captain_name VARCHAR (50),player_1 VARCHAR (50),
			player_2 VARCHAR (50),player_3 VARCHAR (50),player_4 VARCHAR (50),player_5 VARCHAR (50),player_6 VARCHAR (50),player_7 VARCHAR (50),player_8 VARCHAR (50),player_9 VARCHAR (50),player_10 VARCHAR (50),`date` datetime NULL DEFAULT CURRENT_TIMESTAMP,`status` INT (1))";
		}
		if($name == 'Cricket' || $name == 'cricket' || $name == 'CRICKET'){
			$sql_table = "CREATE TABLE $name (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,team_name VARCHAR (255) UNIQUE,college_name VARCHAR (255),mobile VARCHAR (15),captain_name VARCHAR (50),player_1 VARCHAR (50),
			player_2 VARCHAR (50),player_3 VARCHAR (50),player_4 VARCHAR (50),player_5 VARCHAR (50),player_6 VARCHAR (50),player_7 VARCHAR (50),player_8 VARCHAR (50),player_9 VARCHAR (50),player_10 VARCHAR (50),`date` datetime NULL DEFAULT CURRENT_TIMESTAMP,`status` INT (1))";
		}
		if($name == 'Badminton' || $name == 'badminton' || $name == 'BADMINTON'){
			$sql_table = "CREATE TABLE $name (id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,team_name VARCHAR (255) UNIQUE,college_name VARCHAR (255),mobile VARCHAR (15),captain_name VARCHAR (50),player_1 VARCHAR (50),`date` datetime NULL DEFAULT CURRENT_TIMESTAMP,`status` INT (1))";
		}
		
		$table_res = mysqli_query($con,$sql_table) OR die("Query Failed.");
		$result = mysqli_query($con,$sql) OR die("Query Failed.");
		if($result && $table_res){
			
			header("Location:add_category.php?ok=1");
			exit;
			
		}
		mysqli_close($con);
	}
	
	
		
}
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> ADD CATEGORY <small class="text-secondary">Add Category</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>Add Category</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a></li>
				<li class="ml-3"><a href="category.php"><i class="fa fa-list-alt mr-1" aria-hidden="true"></i> All Category</a></li>
			</ol>
		</nav>
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
		<div class="row">
			<div class="col-sm-9 offset-sm-1 form-section" style="
				display: flex;
				justify-content: center;
				align-items: center;
				">
				
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" accept-charset="utf-8" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					<div  class="form-group">
						<label style="font-weight: 600;" for="category_name">Category-Name : </label>
						<input type="text" name="category_name" placeholder="Category-Name" class="form-control" required id="category_name">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Add Category" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<footer id="footer" class="mt-5">
		<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
	</footer>
</div>
<!-- main content end -->
<!-- main content end -->
<?php require("footer.php"); ?>