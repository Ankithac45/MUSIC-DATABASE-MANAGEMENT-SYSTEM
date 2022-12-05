<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
require_once('connect.php');
	if(($_FILES['txtimage']['type'] == "image/jpeg")
		||($_FILES['txtimage']['type'] == "image/pjpeg")
		||($_FILES['txtimage']['type'] == "image/png")
		||($_FILES['txtimage']['type'] == "image/gif"))
	{
			//Check errors first
			if($_FILES['txtimage']['error'] > 0){
				echo 'Error occured while processing the form';	
			}
			else{		
				$txtimage = basename(mysqli_real_escape_string($connect,$_FILES['txtimage']['name']));
				$txtalbum = mysqli_real_escape_string($connect,$_POST['txtalbum']);
				$txtsinger = mysqli_real_escape_string($connect,$_POST['txtsinger']);
				$txtwriter = mysqli_real_escape_string($connect,$_POST['txtwriter']);
				$txtdesc = mysqli_real_escape_string($connect,$_POST['txtdesc']);
				$txtgen = mysqli_real_escape_string($connect,$_POST['txtgen']);
				if(move_uploaded_file($_FILES['txtimage']['tmp_name'], 
						"upload_images/album/".$_FILES['txtimage']['name'])){
					$sqlalbum = mysqli_query($connect,"INSERT INTO tblalbum(albumgen,albumname,
											albumsinger,albumwriter,albumdesc,albumimage)
					VALUES ('".$txtgen."','".$txtalbum."','".$txtsinger."',
							'".$txtwriter."','".$txtdesc."','".$txtimage."')") or die 
							('An error occured whileprocessing the form ' . mysqli_error());	
					$status = 'Success';
				}else{
					$status = 'Failed: Something went wrong';	
				}
				echo returnStatus($status);	
			}
	}else{
		echo 'Invalid image format';	
	}
	function returnStatus($status)
				{
					return "<html><body>
					<script type='text/javascript'>
						function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}
						window.onload=init;
					</script></body></html>";
				}
}
?>