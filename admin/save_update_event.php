<?php 

require("db.con.php");
if(isset($_POST['submit'])){
	$eid = $_POST['event_id'];
	$title =  mysqli_real_escape_string($con,$_POST['title']);
	$description =  mysqli_real_escape_string($con,$_POST['description']);
	$last_date =  mysqli_real_escape_string($con,$_POST['date']);
	$category =  mysqli_real_escape_string($con,$_POST['category']);

  if(empty($_FILES['new-image']['name'])){
    $file_name = $_POST['old-image'];
  }
  else {
    $errors= array();
    $file_name = $_FILES['new-image']['name'];
    $file_size =$_FILES['new-image']['size'];
    $file_tmp =$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
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
	
	$sql ="UPDATE `event` SET `event_title`='{$title}',`category`='{$category}',`description`='{$description}',`ending_date`='{$last_date}',`image`='{$file_name}' WHERE `event_id` = '{$eid}' ";
	$result = mysqli_query($con,$sql) OR die("Query Failed.");
	if($result){
		
		header("Location:http://localhost/sportsEventReminder/admin/update_event.php?ok=1");
		exit;
		
	}
	mysqli_close($con);
		
}
 ?>