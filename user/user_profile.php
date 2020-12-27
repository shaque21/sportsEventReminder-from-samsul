<?php
require("header.php");
$uid = $_SESSION['USER_ID'];

?>
<!-- end menu -->
    <!-- header section end -->
		<!-- content section start -->
		<div id="main-content" class="container mt-5 bg-white">
			<div class="row">
				<!-- side bar end -->
<!-- main content start -->
<!-- main content end -->
<!-- main content start -->
<div class="col-sm-10 offset-sm-1 p-4" style="margin-top: 0px;">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-user mr-2 text-primary" aria-hidden="true"></i></i>USER PROFILE <small class="text-secondary">My Profile</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user mr-2" aria-hidden="true"></i>My Profile</li>
				<li class="ml-4"><a href="../index.php"><i class="fa fa-home mr-1 text-primary" aria-hidden="true"></i> Home</a></li>
				<li class="ml-4"><a href="notification.php"><i class="fa fa-bell mr-1 text-primary" aria-hidden="true"></i> Notification</a></li>
				<li class="ml-4"><a href="user_update_pass.php?pid=<?php echo base64_encode($_SESSION['USER_ID']) ; ?>"><i class="fa fa-key text-primary mr-1" aria-hidden="true"></i> Update Password</a></li>
			</ol>
		</nav>
		<?php
					
			$sql1 = "SELECT * FROM `users` WHERE `id` = '{$uid}'";
			$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
			$row1 = mysqli_fetch_assoc($result1);
		?>
		<div class="row">
			<!-- Profile Info  -->
			<div class="col-sm-6">
				<div style="height: 200px; width: 200px;">
					<img style="height: 100%; width: 100%;" src="../upload/<?php echo $row1['image']; ?>" class="img-thumbnail" alt="">
				</div>
				
				<form class="mt-3" action="edit_pic.php" method="POST" enctype="multipart/form-data">
					<div  class="form-group">
						<label class="font-weight-bold" for="new-image">Profile Picture : </label>
						<input type="file" name="image" class="form-control" required id="photo">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Change profile picture" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px; font-weight: 600;">
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<div class="table-responsive">
					
					<table class="table table-bordered">
						<form action="">
						<tr>
							<td style="font-weight:600;">User ID</td>
							<td>
								<?php
								if($row1['id'] < 10){
									$row1['id'] = '0'.$row1['id'];
								}
								echo $row1['id'];
								?>
							</td>
						</tr>
						<tr>
							<td style="font-weight:600;">Full Name</td>
							<td><?php echo ucwords($row1['name']);  ?></td>
						</tr>
						<tr>
							<td style="font-weight:600;">Mobile</td>
							<td><?php echo $row1['mobile']; ?></td>
						</tr>
						<tr>
							<td style="font-weight:600;">Email</td>
							<td><?php echo $row1['email']; ?></td>
						</tr>
						<tr>
							<td style="font-weight:600;">Registration Date</td>
							<td><?php echo $row1['date']; ?></td>
						</tr>
						<tr>
							<td style="font-weight:600;">Date Of Birth</td>
							<td><?php echo $row1['dob']; ?></td>
						</tr>
					</table>
					<a href="edit_user_profile.php?eid=<?php echo base64_encode($row1['id']); ?>" class="btn btn-primary float-right">Edit Profile</a>
				</div>
			</div>
			<!-- Upload Photo Section -->
			
			
		</div>
	</div>
	
	<footer id="footer" class="mt-5">
		<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
	</footer>
</div>