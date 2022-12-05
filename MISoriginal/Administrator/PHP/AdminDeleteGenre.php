<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
	require_once('connect.php');
	$id = $_REQUEST['id'];
	$getimage = mysqli_query($connect,"SELECT genimage FROM tblgenre WHERE id = '".$id."'");
	while($rowImage = mysqli_fetch_array($getimage)){
		  $image = $rowImage['genimage'];	
	}
	unlink("upload_images/genre/".$image);
	$delete = mysqli_query($connect,"DELETE FROM tblgenre WHERE id = '".$id."'") or die ('An error occured '.mysqli_error());
	$delete = mysqli_query($connect,"DELETE FROM tblalbum WHERE albumgen = '".$id."'")or die ('An error occured '.mysqli_error());
	header("Location:AdminViewGenre.php");
}
?>	