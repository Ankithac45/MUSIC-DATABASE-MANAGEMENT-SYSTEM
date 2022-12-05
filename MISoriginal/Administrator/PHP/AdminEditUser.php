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
</head>

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
            <li><a href="AddUser.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add User</a></li> 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Add New User</h2>	
        	<div class="form">
            	<form  method="post" id="form" action="AdminUpdateUser.php" />
                <?php 
				require_once('connect.php');
				$id = $_REQUEST['id'];
				$getUser = mysqli_query($connect,"SELECT * FROM tblusers WHERE user_id = '$id'");
				while($row = mysqli_fetch_array($getUser)){
				?>
                    <div>
                    	<label for="Name">Name</label>
                        <input type="hidden" name="id" value="<?php echo $row['user_id']?>" />
                        <input type="text" name="txtname" value="<?php echo $row['name']?>" placeholder="Complete Name" size="39"/>
                    </div>
                    <div>
                    	<label for="username">Username</label>
                        <input type="text" name="txtusername" value="<?php echo $row['username']?>" placeholder="Username" size="39"/>
                    </div>
                    <div>
                    	<label for="password">Password</label>
                        <input type="text" name="txtpass" value="<?php echo $row['password']?>" placeholder="Password" size="39"/>
                    </div>
                    <div>
                    	<input type="submit" value="Update" id="button1" name="add"/>
                        <input type="button" value="Back" id="button2" onclick="window.location.href='AddUser.php'"/>
                    </div>  
                    <?php }?>                
                </form>        
            </div>
        
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
</body>
</html><?php } ?>