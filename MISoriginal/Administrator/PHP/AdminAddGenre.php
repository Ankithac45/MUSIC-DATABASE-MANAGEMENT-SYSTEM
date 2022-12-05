<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
require_once('connect.php');
if(($_FILES['txtimage']['type'] == "image/jpeg")
	||($_FILES['txtimage']['type'] == "image/pjpeg")
	||($_FILES['txtimage']['type'] = "image/gif")
	||($_FILES['txtimage']['type'] = "image/png"))
	{
		if($_FILES['txtimage']['error'] > 0){
			echo 'Error occured while processing the form';	
		}
		else{
			
			$txtgen = $_POST['txtgen'];
			$txtdesc = $_POST['txtdesc'];
			$txtimage = basename(mysqli_real_escape_string($connect,$_FILES['txtimage']['name']));
				if(move_uploaded_file($_FILES['txtimage']['tmp_name'],
					"upload_images/genre/".$_FILES['txtimage']['name'])){
					$sqlinsert = mysqli_query($connect,"INSERT INTO tblgenre(genname,gendesc,genimage)
									VALUES ('".$txtgen."','".$txtdesc."','".$txtimage."')") 
									or die ('An error occured ' .mysqli_error());
				$status = 'Success';
				}else{
					$status = 'Failed: Something went wrong';	
				}
		}
	}else{
		echo 'Invalid image format';	
	}
	function returnStatus($status){
		return "<html><body>
				<script type='text/javascript'>
				function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}
				window.onload=init;
				</script></body></html>";
	}
}
?>