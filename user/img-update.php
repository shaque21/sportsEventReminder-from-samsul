<?php 

require "../db.inc.php";

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

    if(in_array($file_ext,$extensions) === false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors) == true){
       move_uploaded_file($file_tmp,"../upload/".$file_name);
    }else{
       print_r($errors);
       die();
    }
  }
  $id = $_POST['id'];
  $sql = "UPDATE `users` SET `image`='{$file_name}' WHERE `id`={$id}";

  if(mysqli_query($con, $sql)){
    header("Location:update-profile-pic.php");
  }else {
    echo "<div class='alert alert-danger'>
      Something Went Wrong. Please Try Again Later !!!
    </div>";
  }


 ?>