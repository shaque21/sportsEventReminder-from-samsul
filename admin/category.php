<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-list-alt mr-2" aria-hidden="true"></i>ALL CATEGORIES <small class="text-secondary">Category</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-list-alt mr-2" aria-hidden="true"></i>Category</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-4"><a href="add_category.php"><i class="fa fa-plus-circle mr-1" aria-hidden="true"></i> Add Category</a></li>
			</ol>
		</nav>
		<div class="table-responsive" style="font-size: 14px;">
			<table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Category ID</th>
						<th>Category Name</th>
						<th>Edit Action</th>
						<th>Delete Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT * FROM `category` ORDER BY `category_id` DESC";
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
						<td><?php echo $row1['category_id']; ?></td>
						<td><?php echo ucwords($row1['category_name']); ?></td>
						<td><a style="font-size: 14px;" href="update_category.php?eid=<?php echo base64_encode($row1['category_id']); ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> Edit</a></td>
						<td class="text-center">
							
							<a style="font-size: 14px;" href="delete_category.php?id=<?php echo base64_encode($row1['category_id']); ?>& category_name=<?php echo base64_encode($row1['category_name']); ?>" id="delete_btn" onclick="return checkDelete()" class="btn btn-danger btn-xs"><i class="far fa-trash-alt mr-2" aria-hidden="true"></i> Delete</a>
						</td>
					</tr>
					<?php
					$i++; }
					}?>
				</tbody>
			</table>
		</div>
	</div>
	<script language="JavaScript" type="text/javascript">
	function checkDelete(){
	return confirm('Are you sure?');
	}
	</script>
	<footer id="footer" class="mt-5">
		<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
	</footer>
</div>
<!-- main content end -->
<?php require("footer.php"); ?>