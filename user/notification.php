<?php
require("header.php");
$uid = $_SESSION['USER_ID'];
$u_email = $_SESSION['EMAIL'];

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
		<h2 class="text-primary"><i class="fa fa-bell mr-2 text-primary" aria-hidden="true"></i></i>NOTIFICATION <small class="text-secondary">My Notifications</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-bell mr-2" aria-hidden="true"></i>My Notifications</li>
				<li class="ml-4"><a href="../index.php"><i class="fa fa-home mr-1 text-primary" aria-hidden="true"></i> Home</a></li>
				<li class="ml-3"><a href="user_profile.php"><i class="fa fa-user mr-1 text-primary" aria-hidden="true"></i> Profile</a></li>
			</ol>
		</nav>
		<div class="row">
			<!-- Profile Info  -->
			<div class="col-sm-10 offset-1">
				<div class="table-responsive" style="font-size: 14px;">
			<table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Title</th>
						<th>Description</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT * FROM `notice` WHERE `user_email` = '{$u_email}' ORDER BY `notice_id` DESC";
					$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
					if(mysqli_num_rows($result1) > 0){
						$i=1;
					?>
					<tr>
						<?php while ($row1 = mysqli_fetch_assoc($result1)) {
						?>
						<td><?php
								if($i < 10){
									$i = '0'.$i;
								}
								echo $i;
						?></td>
						<td><?php echo ucwords($row1['title']); ?></td>
						<td><?php echo $row1['description']; ?></td>
						<td><?php echo $row1['date']; ?></td>
						
						
					</tr>
					<?php
					$i++; }
					}?>
				</tbody>
			</table>
		</div>
			</div>
			
			<!-- Upload Photo Section -->
			
			
		</div>
	</div>
	
	<footer id="footer" class="mt-5">
		<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
	</footer>
	<!-- content section end -->
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="../admin/js/jquery.dataTables.min.js"></script>
		<script src="../admin/js/dataTables.bootstrap4.min.js"></script>
		<script src="../admin/js/main.js"></script>
</div>