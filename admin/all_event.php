
<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="far fa-calendar-alt  mr-2" aria-hidden="true"></i>ALL EVENTS <small class="text-secondary">All Events</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="far fa-calendar-alt  mr-2" aria-hidden="true"></i>All Events</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-4"><a href="add_event.php"><i class="fa fa-plus-circle mr-1" aria-hidden="true"></i> Create Event</a></li>
			</ol>
		</nav>
		<div class="table-responsive" style="font-size: 14px;">
			<table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Title</th>
						<th>Category Name</th>
						<th>Description</th>
						<th>Starting Date</th>
						<th>Last Date</th>
						<th>Edit Action</th>
						<th>Delete Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT event.event_id, event.event_title,event.description,event.starting_date,event.ending_date,category.category_name FROM `event`
					LEFT JOIN `category` ON event.category = category.category_id  ORDER BY `event_id` DESC";
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
						<td><?php echo ucwords($row1['event_title']); ?></td>
						<td><?php echo ucwords($row1['category_name']); ?></td>
						<td><?php echo $row1['description']; ?></td>
						<td><?php echo $row1['starting_date']; ?></td>
						<td><?php echo $row1['ending_date']; ?></td>
						<td ><a style="font-size: 12px;" href="update_event.php?eid=<?php echo base64_encode($row1['event_id']); ?>" id="edit_btn" class="btn btn-success btn-xs mt-1"><i class="far fa-edit mr-2" aria-hidden="true"></i> Edit</a></td>
						<td ><a style="font-size: 12px;" href="delete_event.php?id=<?php echo base64_encode($row1['event_id']); ?>" id="delete_btn" onclick="return checkDelete()" class="btn btn-danger btn-xs mt-1"><i class="far fa-trash-alt mr-2" aria-hidden="true"></i> Delete</a></td>
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