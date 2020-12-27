<?php 
	include 'header.php';
 ?>

<div class="container-fluid mb-4" id="profile-page">
	<div class="row">
		<!-- profile sidebar -->
		<?php include 'sidebar.php'; ?>
		<!-- profile content -->
		<div class="col-md-10 col-sm-12 profile-content p-5">
			<h2>Update Your Profile Picture</h2>
			<div class="pic-content" style="font-weight: 500;letter-spacing: 1px;">
				<?php 

				$sql = "SELECT * FROM `users` WHERE id = '{$_SESSION['USER_ID']}'";
				$result = mysqli_query($con, $sql) OR die("Query Failed.");
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
					
				 ?>
				<form action="img-update.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					    <input type="text" name="id" class="form-control" placeholder="Enter Your Name" id="id" hidden required value="<?php echo $row['id']; ?>">
					</div>
					<div class="form-group">
		                <label for="">Upload Your Image : </label>
		                <input type="file" name="new-image" style="background-color: #ff5e57"><br>
		                <img class="mt-4" src="../upload/<?php echo $row['image']; ?>" height="150px">
		                <input type="hidden" name="old-image" value="<?php echo $row['image']; ?>">
		            </div>
		            <input type="submit" name="submit" class="btn btn-success" value="Update">
				</form>
			<?php }
			} ?>
			</div>
		</div>
	</div>
</div>
 <?php 
	include 'footer.php';
 ?>
 </body>
</html>