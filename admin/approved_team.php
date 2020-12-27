
<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fas fa-clipboard-check mr-2"></i></i>ALL APPROVED TEAM <small class="text-secondary">All Approved Team</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-clipboard-check mr-1"></i>All Approved Team</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-4"><a href="pending_team.php"><i class="fas fa-sitemap mr-1"></i> All Category Team List</a></li>
			</ol>
		</nav>
		<div class="table-responsive" style="font-size: 14px;">
			<table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Team Name</th>
						<th>College Name</th>
						<th>Captain Name</th>
						<th>Category</th>
						<th>Contact NO.</th>
						<th>Reg. Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT approved_team.id,approved_team.team_name,approved_team.college_name,approved_team.captain_name,approved_team.mobile,approved_team.category,approved_team.date,category.category_name FROM `approved_team`
					LEFT JOIN `category` ON approved_team.category = category.category_id  ORDER BY `id` DESC";
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
						<td><?php echo ucwords($row1['team_name']); ?></td>
						<td><?php echo ucwords($row1['college_name']); ?></td>
						<td><?php echo ucwords($row1['captain_name']); ?></td>
						<td><?php echo ucwords($row1['category_name']); ?></td>
						<td><?php echo $row1['mobile']; ?></td>
						<td><?php echo $row1['date']; ?></td>
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