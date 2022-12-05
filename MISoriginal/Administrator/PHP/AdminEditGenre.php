<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JINGLES | Administrator Page</title>
<link rel="stylesheet" type="text/css" href="../css/AdminStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../Javascript/formvalidategenre.js"></script>
</head>

<script type="text/javascript">
function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
		document.getElementById('form').innerHTML='status';
	}	
}
window.onload='upload';
});
</script>
<body>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
        	<li><a href="AdminHome.php">HOME</a></li>
            <li><a href="AdminGenre.php">GENRES</a></li>
            <li><a href="AdminAlbum.php">ALBUMS</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
            <li><a><?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
				?></a></li>
    	</ul>
    </div>
</div>
<!--End Menu-->
<div class="header_under"></div>
<!--Start Container for the web content-->
<div class="container_wrapper">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<h4 class="header">JINGLES Menu</h4>
    	<ul>
        	<li><a href="AdminGenre.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Genre</a></li>
            <li><a href="AdminViewGenre.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Genres</a></li>
        </ul>
    </div> <!-- -->
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Song Genres</h2>	
        	<div class="form">
            	<div class="error">Error Message</div>
                <div class="success"></div>
                 <?php
				require_once('connect.php');
				$id = $_REQUEST['id'];
				$getGen = mysqli_query($connect,"SELECT * FROM tblgenre WHERE id='".$id."'");
				while($rowGen = mysqli_fetch_array($getGen)){
				?>
            	<form name="genre" method="post" id="form" action="AdminUpdateGenre.php" enctype="multipart/form-data"  target="uploadframe">
                	<div>
                         <iframe src="" id="uploadframe" name="uploadframe" 
                         style="width:0px; height:0px; border:0px;"></iframe>
                    </div>
                	<div>
                    	<label for="Genre">Song Genre</label>
                        <input type="text" name="txtgen" id="txtgen" placeholder="Genre" size="39" value="<?php echo $rowGen['genname']?>"/>
                    </div>
                    <input type="hidden" value="<?php echo $rowGen['id']?>" name="id"/>
                    <div>
                    	<label for="Description">Description</label>
                        <textarea rows="8" cols="50" placeholder="Song Description" name="txtdesc" id="txtdesc"><?php echo $rowGen['gendesc']?></textarea>
                    </div>
                    <div>
                    	<label for="Image">Song Image</label>
                        <input type="file" name="txtimage" id="txtimage"/>
                    </div>
                    <div>
                    	<input type="submit" value="Update Genre" id="button1"/>
                        <input type="button" value="Back" id="button2" onClick="window.location.href='AdminViewGenre.php'"/>
                    </div>
                </form>
                <?php
				}
				?>
            </div>
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
</body>
</html><?php } ?>