<?php
require("header.php");
require("sidebar.php");
$error_msg = "";
$error_msg_user = "";
$success_msg = "";
if(isset($_POST['submit'])){
	$title =  mysqli_real_escape_string($con,$_POST['title']);
	$description =  mysqli_real_escape_string($con,$_POST['description']);
	$user =  mysqli_real_escape_string($con,$_POST['user']);

	$to_email = $user;
	$subject = $title;
	$body = $description;
	$headers = "From: hshamsul894@gmail.com";

	mail($to_email, $subject, $body, $headers);
$sql = "INSERT INTO `notice`(`title`, `description`, `user_email`) VALUES (
		'{$title}','{$description}','{$user}')";
		$result = mysqli_query($con,$sql) OR die("Query Failed.");
		if($result){
			
			header("Location:add_notice.php?ok=1");
			exit;
			
		}
		mysqli_close($con);
	
		
}
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-plus-circle  mr-3" aria-hidden="true"></i>ADD NOTICE <small class="text-secondary">Add Notice</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-plus-circle  mr-3" aria-hidden="true"></i>Add Notice</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-4"><a href="all_notice.php"><i class="fa fa-globe mr-1" aria-hidden="true"></i> All Notice</a></li>
			</ol>
		</nav>

				<?php
				//Check for success flag in get query param
				$ok = isset($_GET['ok']);
				//Insert this code where you wanted to show the msg
				if($ok)  {
				echo '<div class="alert alert-success" role="alert">
					Data Inserted Successfully..
				</div>';
				}
				if (isset($error_msg)) {
					echo $error_msg;
				}
				?>
		<div class="row">
			<div class="col-sm-9 offset-sm-1 form-section" style="
				display: flex;
				justify-content: center;
				align-items: center;
				">
				<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					<div  class="form-group">
						<label class="font-weight-bold" for="title">Title : </label>
						<input type="text" name="title" placeholder="Notice title" class="form-control" required id="title">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="description">Description : </label>
						<textarea name="description" placeholder="Enter notice description" class="form-control" required id="description"></textarea>
					</div>
					<?php 

					$sql1 = "SELECT * FROM `users` ";
					$result1 = mysqli_query($con, $sql1) OR die("Query Failed.");
					if(mysqli_num_rows($result1) > 0){

					 ?>
					<div  class="form-group">
						<label class="font-weight-bold" for="user">Select User : </label>
						<select class="form-control" name="user" id="user" required>
							<option value="">Select User</option>
							<?php while ($row1 = mysqli_fetch_assoc($result1)) {
							    echo "<option value='".$row1['email']."'>".$row1['name']."</option>";
							} ?>
						</select>
					</div>
				<?php } ?>
					<div class="form-group">
						<input type="submit" name="submit" value="Add Notice" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
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