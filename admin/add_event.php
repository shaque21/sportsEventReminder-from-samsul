<?php
require("header.php");
require("sidebar.php");
$error_msg = "";
$error_msg_user = "";
$success_msg = "";
if(isset($_POST['submit'])){
	$title =  mysqli_real_escape_string($con,$_POST['title']);
	$description =  mysqli_real_escape_string($con,$_POST['description']);
	$date =  mysqli_real_escape_string($con,$_POST['date']);
	$category =  mysqli_real_escape_string($con,$_POST['category']);
	if (isset($_FILES['photo'])) {
	  $errors= array();
	  $file_name = $_FILES['photo']['name'];
	  $file_size =$_FILES['photo']['size'];
	  $file_tmp =$_FILES['photo']['tmp_name'];
	  $file_type=$_FILES['photo']['type'];
	  $file_name = strtolower($file_name);
	  $file_ext=explode('.',$file_name);
	  $file_ext = end($file_ext);
	  $extensions= array("jpeg","jpg","png");
	  $file_name = $title.'.'.$file_name;

	  if(in_array($file_ext,$extensions) === false){
	     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	  }

	  if($file_size > 2097152){
	     $errors[]='File size must be excately 2 MB';
	  }

	  if(empty($errors) == true){
	     move_uploaded_file($file_tmp,"upload/".$file_name);
	  }else{
	     print_r($errors);
	     die();
	  }
	}
	
	$sql = "INSERT INTO `event`(`event_title`, `category`, `ending_date`, `description`, `image`) VALUES (
		'{$title}','{$category}','{$date}','{$description}','{$file_name}')";
	$result = mysqli_query($con,$sql) OR die("Query Failed.");
	if($result){
		
		header("Location:add_event.php?ok=1");
		exit;
		
	}
	mysqli_close($con);
		
}
?>
<!-- main content start -->
<!-- main content start -->
<div class="col-sm-9 p-4">
	<div class="content">
		<h2 class="text-primary"><i class="fa fa-plus-circle  mr-3" aria-hidden="true"></i>CREATE EVENT <small class="text-secondary">Create an event</small></h2>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-plus-circle  mr-1" aria-hidden="true"></i>Create Event</li>
				<li class="ml-4"><a href="index.php"><i class="fas fa-tachometer-alt mr-1" aria-hidden="true"></i> Dashboard</a></li>
				<li class="ml-4"><a href="all_event.php"><i class="far fa-calendar-alt mr-1" aria-hidden="true"></i> All Events</a></li>
			</ol>
		</nav>

				<?php
				//Check for success flag in get query param
				$ok = isset($_GET['ok']);
				//Insert this code where you wanted to show the msg
				if($ok)  {
				echo '<div class="alert alert-success" role="alert">
					Data Inserted Successfully..
				</div>';
				}
				?>
		<div class="row">
			<div class="col-sm-9 offset-sm-1 form-section" style="
				display: flex;
				justify-content: center;
				align-items: center;
				">

				<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" style="
					padding: 30px;
					box-shadow: 1px 1px 6px rgba(0,0,0,0.3);
					">
					<h2 class="text-center text-primary mb-2">Create Tournament Event</h2>
					<div  class="form-group">
						<label class="font-weight-bold" for="title">Event Title : </label>
						<input type="text" name="title" placeholder="Event title" class="form-control" required id="title">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="category">Select Category : </label>
						<?php
                            $query = "SELECT * FROM category";
                            $result = mysqli_query($con,$query) or die("Query Unsuccessful.");
                            if(mysqli_num_rows($result) > 0){
                              echo '<select name="category" class="form-control">
                              <option value="" disabled> Select Category</option>';
                              while ($row = mysqli_fetch_assoc($result)) {

                                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>"
                           ?>

                          <?php
                                }
                                echo "</select>";
                              }
                           ?>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="date">Last Date Of Registration : </label>
						<input type="date" name="date" class="form-control" required id="date">
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="description">Description : </label>
						<textarea name="description" placeholder="Enter event description" class="form-control" required id="description"></textarea>
					</div>
					<div  class="form-group">
						<label class="font-weight-bold" for="photo">Photo : </label>
						<input type="file" name="photo" class="form-control" required id="photo">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Add Event" class="btn btn-primary btn-block text-uppercase" style="letter-spacing: 1px;">
					</div>
				</form>
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