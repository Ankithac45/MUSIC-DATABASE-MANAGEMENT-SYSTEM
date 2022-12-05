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
<script type="text/javascript" src="../Javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Javascript/formvalidation.js"></script>
</head>

<body>

<div class="header_wrapper">
	<div class="header">
    	<!--for date and signout-->
    </div>
</div>
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
    	<div>
    		<h4 class="header">JINGLES Menu</h4>
        </div>
    	<ul>
            <li><a href="Adduser.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add/View User</a></li>
            <li><a href="#"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Feed Back</a></li>
            <li><a href="ViewVotes.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add/View Votes</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Add New User</h2>
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
</body>
</html>
<?php 	
}
?>