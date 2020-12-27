
<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fas fa-sitemap mr-3"></i></i>ALL TEAM LIST<small class="text-secondary">All Team List</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-sitemap mr-1"></i>All Team List</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-4"><a href="approved_team.php"><i class="fas fa-check-circle mr-1"></i> All Approved Team</a></li>
			</ol>
		</nav>
		
		<div id="accordion">
			<?php 

			$sql = "SELECT * FROM `category`";
			$result = mysqli_query($con,$sql) or die("Query Unsuccessful.");
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					$category_name = strtolower($row['category_name']);
					if($category_name == 'badminton'){
			 ?>
				
		  <div class="card">
		    <div class="card-header">
		      <a class="card-link" data-toggle="collapse" href="#collapseOne">
		        <i class="fas fa-quidditch mr-2"></i>Badminton Team List
		      </a>
		    </div>
		    <div id="collapseOne" class="collapse show" data-parent="#accordion">
		      <div class="card-body">
		        <table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
		        	<caption class="text-danger font-weight-bold text-center">Badminton Team List</caption>
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Team Name</th>
						<th>College Name</th>
						<th>Captain Name</th>
						<th>Contact No.</th>
						<th>Registration Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT * FROM `badminton`  ORDER BY `id` DESC";
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
						<td><?php echo $row1['mobile']; ?></td>
						<td><?php echo $row1['date']; ?></td>
						<td class="text-center">

							<?php 
							if($row1['status'] == 1){
								echo '<i class="fas fa-check-circle text-success font-weight-bold" style="font-size:22px;"></i>';
							}else{

							 ?>
							<a style="font-size: 12px;" href="con_team.php?bid=<?php echo base64_encode($row1["id"]); ?>& b_catid=<?php echo base64_encode($row["category_id"]); ?>& id=<?php echo base64_encode($row1["id"]); ?>" id="delete_btn" onclick="return checkDelete()" class="btn btn-danger btn-xs mt-1"><i class="fas fa-exclamation-circle mr-3"></i> Pending</a>
						<?php } ?>
						</td>
								
							
					</tr>
					<?php
					$i++; }
					}?>
				</tbody>
			</table>
		      </div>
		    </div>
		  </div>
		  <?php }elseif ($category_name == 'football') {
		  	
		  ?>
		  <div class="card">
		    <div class="card-header">
		      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
		        <i class="fas fa-futbol mr-2"></i>Football Team List
		      </a>
		    </div>
		    <div id="collapseTwo" class="collapse" data-parent="#accordion">
		      <div class="card-body">
		        <table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
		        	<caption class="text-danger font-weight-bold text-center">Football Team List</caption>
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Team Name</th>
						<th>College Name</th>
						<th>Captain Name</th>
						<th>Contact No.</th>
						<th>Registration Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT * FROM `football`  ORDER BY `id` DESC";
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
						<td><?php echo $row1['mobile']; ?></td>
						<td><?php echo $row1['date']; ?></td>
						<td class="text-center">

							<?php 
							if($row1['status'] == 1){
								echo '<i class="fas fa-check-circle text-success font-weight-bold" style="font-size:22px;"></i>';
							}else{

							 ?>
							<a style="font-size: 12px;" href="con_team.php?fid=<?php echo base64_encode($row1["id"]); ?>& f_catid=<?php echo base64_encode($row["category_id"]); ?>& id=<?php echo base64_encode($row1["id"]); ?>" id="delete_btn" onclick="return checkDelete()" class="btn btn-danger btn-xs mt-1"><i class="fas fa-exclamation-circle mr-3"></i> Pending</a>
						<?php } ?>
						</td>
					</tr>
					<?php
					$i++; }
					}?>
				</tbody>
			</table>
		      </div>
		    </div>
		  </div>
		  <?php }else{ ?>
		  <div class="card">
		    <div class="card-header">
		      <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
		        <i class="fas fa-table-tennis mr-2"></i> Cricket Team List
		      </a>
		    </div>
		    <div id="collapseThree" class="collapse" data-parent="#accordion">
		      <div class="card-body">
		       <table id="example" class="table table-hover table-bordered table-striped" style="width:100%">
		       	<caption class="text-danger font-weight-bold text-center">Cricket Team List</caption>
				<thead>
					<tr>
						<th>SL NO.</th>
						<th>Team Name</th>
						<th>College Name</th>
						<th>Captain Name</th>
						<th>Contact No.</th>
						<th>Registration Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql1 = "SELECT * FROM `cricket`  ORDER BY `id` DESC";
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
						<td><?php echo $row1['mobile']; ?></td>
						<td><?php echo $row1['date']; ?></td>
						<td class="text-center">

							<?php 
							if($row1['status'] == 1){
								echo '<i class="fas fa-check-circle text-success font-weight-bold" style="font-size:22px;"></i>';
							}else{

							 ?>
							<a style="font-size: 12px;" href="con_team.php?cid=<?php echo base64_encode($row1["id"]); ?>& c_catid=<?php echo base64_encode($row["category_id"]); ?>& id=<?php echo base64_encode($row1["id"]); ?>" id="delete_btn" onclick="return checkDelete()" class="btn btn-danger btn-xs mt-1"><i class="fas fa-exclamation-circle mr-3"></i> Pending</a>
						<?php } ?>
						</td>
					</tr>
					<?php
					$i++; }
					}?>
				</tbody>
			</table>
		      </div>
		    </div>
		  </div>
		<?php }}} ?>
		</div>
	</div>
	<script language="JavaScript" type="text/javascript">
	function checkDelete(){
	return confirm('Do you agree to confirm this team ?');

	}
	</script>
	<footer id="footer" class="mt-5">
		<p>Copyright &copy; <?php echo Date('Y') ?> All Rights Reserved.  </p>
	</footer>
</div>
<!-- main content end -->
<?php require("footer.php"); ?>