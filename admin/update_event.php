<?php
require("header.php");
require("sidebar.php");
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> UPDATE EVENT <small class="text-secondary">Update Event</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Update Event</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-3"><a href="all_event.php"><i class="far fa-calendar-alt  mr-1" aria-hidden="true"></i> All Events</a></li>
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
					$sql1 = "SELECT * FROM `event` WHERE `event_id` = '{$id}'";
					$result1 = mysqli_query($con,$sql1) or die("Query Unsuccessful.");
					if(mysqli_num_rows($result1) > 0){
						while ($row = mysqli_fetch_assoc($result1)) {
						
				?>
				<form action="save_update_event.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					
					<div  class="form-group">
						<label class="font-weight-bold" for="title">Event Title : </label>
						<input type="text" value="<?php echo $row['event_title']; ?>" name="title" placeholder="Event title" class="form-control" required id="title">
						<input type="hidden" name="event_id" hidden value="<?php echo $row['event_id']; ?>" placeholder="Enter Student Name" class="form-control" required id="event_id">
					</div>
					<?php
					$sql_cat = "SELECT * FROM `category`";
					$result_cat = mysqli_query($con, $sql_cat) OR die("Query Unsuccessful.");
					if(mysqli_num_rows($result_cat) > 0){
						echo '<select name="category" class="form-control">
                    <option value="" disabled> Select Category</option>';
                    while ($row_cat = mysqli_fetch_assoc($result_cat)) {
                        if($row['category'] == $row_cat['category_id']){
                        	$selected = "selected";
                        }else{
                        	$selected = "";
                        }
                        echo "<option {$selected} value='{$row_cat['category_id']}'>{$row_cat['category_name']}</option>";
                    }
                    echo "</select>";
					}
                 ?>
					<div  class="form-group">
						<label class="font-weight-bold" for="date">Last Date Of Registration : </label>
						<input type="date" value="<?php echo $row['ending_date']; ?>" name="date" class="form-control" required id="date">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="description">Description : </label>
						<textarea name="description" placeholder="Enter event description" class="form-control" required id="description"><?php echo $row['description']; ?></textarea>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="photo">Photo : </label>
						<input type="file" name="new-image" class="form-control" required id="new-image">
						<img  src="upload/<?php echo $row['image']; ?>" height="150px">
						<input type="file" name="old-image" class="form-control" hidden id="old-image">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Update Event" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
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