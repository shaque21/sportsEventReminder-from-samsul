<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> UPDATE CATEGORY <small class="text-secondary">Update Category</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Update Category</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-3"><a href="category.php"><i class="fa fa-list-alt  mr-1" aria-hidden="true"></i> All Category</a></li>
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
				<?php
					if(isset($_GET['eid'])){
					$id = base64_decode($_GET['eid']);
					$sql1 = "SELECT * FROM `category` WHERE `category_id` = '{$id}'";
					$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
					if(mysqli_num_rows($result1) > 0){
						while ($row = mysqli_fetch_assoc($result1)) {
						
				?>
				<form action="save_update_category.php" method="POST" accept-charset="utf-8" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					
					<div  class="form-group">
						<label class="font-weight-bold" for="category_name">Categor- Name : </label>
						<input type="text" name="category_name" value="<?php echo $row['category_name']; ?>" placeholder="Enter Category-Name" class="form-control" required id="category_name">
						<input type="hidden" name="category_id" hidden value="<?php echo $row['category_id']; ?>" placeholder="Enter Student Name" class="form-control" required id="category_id">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Update Category" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
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