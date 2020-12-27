<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> UPDATE NOTICE <small class="text-secondary">Update Notice</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Update Notice</li>
				<li class="ml-4"><a href="index.php"><i class="fa fa-tachometer mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-3"><a href="all_notice.php"><i class="fas fa-bell mr-1" aria-hidden="true"></i> All Notice</a></li>
			</ol>
		</nav>
		<?php
				//Check for success flag in get query param
				if(isset($_GET['ok'])){
				$ok = $_GET['ok'];
				//Insert this code where you wanted to show the msg
				if($ok)  {
				echo '<div class="alert alert-success text-center" role="alert">
						Data Updated Successfully.
				</div>';
				}
			}
		?>
		<div class="row">
			<div class="col-sm-9 offset-sm-1 form-section" style="
				display: flex;
				justify-content: center;
				align-items: center;
				">
				<!-- fetch data from database and show on input field -->
				<?php
					if(isset($_GET['eid'])){
					$id = base64_decode($_GET['eid']);
					$sql1 = "SELECT * FROM `notice` WHERE `notice_id` = '{$id}'";
					$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
					if(mysqli_num_rows($result1) > 0){
						while ($row = mysqli_fetch_assoc($result1)) {
				?>
				<form action="save_edit_notice.php" method="POST" accept-charset="utf-8" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					
					<div  class="form-group">
						<label class="font-weight-bold" for="title">Title : </label>
						<input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Notice title" class="form-control" required id="title">
						<input type="text" name="notice_id" hidden value="<?php echo $row['notice_id']; ?>" placeholder="Notice title" class="form-control" required id="notice_id">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="description">Description : </label>
						<textarea name="description"  placeholder="Enter notice description" class="form-control" required id="description"><?php echo $row['description']; ?></textarea>
					</div>
					<?php 

					$sql = "SELECT * FROM `users` ";
					$result = mysqli_query($con, $sql) OR die("Query Failed.");
					if(mysqli_num_rows($result) > 0){

					 ?>
					<div  class="form-group">
						<label class="font-weight-bold" for="user">Select User : </label>
						<select class="form-control" name="user" id="user" required>
							<option value="">Select User</option>
							<?php while ($row1 = mysqli_fetch_assoc($result)) {
								if($row1['user_email'] == $row['email']){
									$selected = "selected";
								}
							    echo "<option ".$selected." value='".$row1['email']."'>".$row1['name']."</option>";
							} ?>
						</select>
					</div>
				<?php } ?>
					
					<div class="form-group">
						<input type="submit" name="submit" value="Update Notice" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
					</div>
					
				</form>
				<?php
				}
				}
				} ?>
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