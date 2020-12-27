<?php 

require("header.php");
require("sidebar.php");

 ?>
				<!-- main content start -->
				<div class="col-sm-9 p-4">
					<div class="content">
						<h2 class="text-primary"><i class="fas fa-tachometer-alt mr-3" aria-hidden="true"></i>Dashboard <small class="text-secondary">Statistics Overview</small></h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tachometer-alt mr-3" aria-hidden="true"></i>Dashboard</li>
							</ol>
						</nav>
						<!-- fetch all data from admin, event, approved team,category, user, messages table -->
						<?php 

						$sql_user = "SELECT * FROM `users`";
						$user_result = mysqli_query($con,$sql_user) OR die("User Query Failed");
						$total_user = mysqli_num_rows($user_result);

						$sql_admin = "SELECT * FROM `admin`";
						$admin_result = mysqli_query($con,$sql_admin) OR die("admin Query Failed");
						$total_admin = mysqli_num_rows($admin_result);

						$sql_approved = "SELECT * FROM `approved_team`";
						$approved_result = mysqli_query($con,$sql_approved) OR die("approved Query Failed");
						$total_approved = mysqli_num_rows($approved_result);

						$sql_category = "SELECT * FROM `category`";
						$category_result = mysqli_query($con,$sql_category) OR die("approved Query Failed");
						$total_category = mysqli_num_rows($category_result);

						$sql_event = "SELECT * FROM `event`";
						$event_result = mysqli_query($con,$sql_event) OR die("event Query Failed");
						$total_event = mysqli_num_rows($event_result);

						$sql_message = "SELECT * FROM `contact_info`";
						$message_result = mysqli_query($con,$sql_message) OR die("message Query Failed");
						$total_message = mysqli_num_rows($message_result);
						 ?>
						<div class="row">
							<div class="col-md-4 card-section">
								<div class="card text-center" style="box-shadow: 0px 1px 6px rgba(0,0,0,0.3);">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="fa fa-users  mr-1" aria-hidden="true"></i></i> Users
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Users</h5>
										<p class="card-text">
										<?php 
										
										if($total_user < 10){
											$total_user = '0'.$total_user;
										}
										echo $total_user; 
										?>
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="all_users.php" class="btn btn-primary">View All Users <i class="fas fa-chevron-circle-right ml-auto"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 card-section">
								<div class="card text-center" style="box-shadow: 0px 1px 6px rgba(0,0,0,0.3);">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="fas fa-user-shield"></i> Admin
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Admins</h5>
										<p class="card-text">
										<?php 
										
										if($total_admin < 10){
											$total_admin = '0'.$total_admin;
										}
										echo $total_admin; 
										?>
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="all_admin.php" class="btn btn-primary">View All Admins <i class="fas fa-chevron-circle-right ml-auto"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 card-section">
								<div class="card text-center" style="box-shadow: 0px 1px 6px rgba(0,0,0,0.3);">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="fa fa-list-alt mr-1" aria-hidden="true"></i> Category
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Categories</h5>
										<p class="card-text">
											<?php 
										
										if($total_category < 10){
											$total_category = '0'.$total_category;
										}
										echo $total_category; 
										?>
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="category.php" class="btn btn-primary">View All Categories <i class="fas fa-chevron-circle-right ml-auto"></i></a>
									</div>
								</div>
							</div>
							
						</div>
						<hr class="my-4">
						<div class="row mt-4">
							<div class="col-md-4 card-section">
								<div class="card text-center" style="box-shadow: 0px 1px 6px rgba(0,0,0,0.3);">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="fas fa-clipboard-check  mr-1" aria-hidden="true"></i> Approved-Team
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Approved-Team</h5>
										<p class="card-text">
											<?php 
										
										if($total_approved < 10){
											$total_approved = '0'.$total_approved;
										}
										echo $total_approved; 
										?>
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="approved_team.php" class="btn btn-primary">All Approved-Team <i class="fas fa-chevron-circle-right ml-auto"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 card-section">
								<div class="card text-center" style="box-shadow: 0px 1px 6px rgba(0,0,0,0.3);">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="far fa-calendar-alt  mr-1" aria-hidden="true"></i> Event
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Events</h5>
										<p class="card-text">
											<?php 
										
										if($total_event < 10){
											$total_event = '0'.$total_event;
										}
										echo $total_event; 
										?>
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="all_event.php" class="btn btn-primary">View All Events <i class="fas fa-chevron-circle-right ml-auto"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 card-section">
								<div class="card text-center" style="box-shadow: 0px 1px 6px rgba(0,0,0,0.3);">
									<div class="card-header bg-primary text-white text-uppercase">
										<i class="fab fa-facebook-messenger  mr-1" aria-hidden="true"></i> Messages
									</div>
									<div class="card-body">
										<h5 class="card-title">Total Number Of Messages</h5>
										<p class="card-text">
											<?php 
										
										if($total_message < 10){
											$total_message = '0'.$total_message;
										}
										echo $total_message; 
										?>
										</p>
									</div>
									<div class="card-footer text-muted">
										<a href="contact_info.php" class="btn btn-primary">View All Messages <i class="fas fa-chevron-circle-right ml-auto"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr class="my-4">
					<h4>New Admin</h4>
					<div class="table-responsive">
						<table id="example" class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Username</th>
									<th>Photo</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$sql1 = "SELECT * FROM `admin` ORDER BY `id` DESC";
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
									<td><?php echo ucwords($row1['name']); ?></td>
									<td><?php echo $row1['email']; ?></td>
									<td><?php echo $row1['username']; ?></td>
									<td style="height: 100px; width: 100px;" class="text-center"><img style="width: 80%; height: 80%;" src="upload/<?php echo $row1['photo']; ?>" alt=""></td>
								</tr>

							<?php
							$i++; }
						}?>
							</tbody>
						</table>
					</div>

					<footer id="footer" class="mt-5">
						<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
					</footer>
				</div>
				<!-- main content end -->

<?php require("footer.php"); ?>