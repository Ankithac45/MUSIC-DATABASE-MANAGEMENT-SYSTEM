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
<script type="text/javascript">

</script>
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
            	<form  method="post" action="AdminAddUser.php" name="myform"/>
                    <div>
                    	<label for="Name">Name</label>
                        <input type="text" name="txtname" id="txtname" placeholder="Complete Name" size="39"/>
                    </div>
                    <div>
                    	<label for="username">Username</label>
                        <input type="text" name="txtusername" id="txtusername" placeholder="Username" size="39"/>
                    </div>
                    <div>
                    	<label for="password">Password</label>
                        <input type="text" name="txtpass"  placeholder="Password" size="39"/>
                    </div>
                    <div>
                    	<input type="submit" value="Add User" id="button1" name="add"/>
                        <input type="reset" value="Cancel" id="button2"/>
                    </div>                  
                </form>
                <br /><br />
                <table  width="650" border="0" cellpadding="1" cellspacing="0">
                	<tr>
                    	<th class="table">Name</th><th class="table">Username</th><th class="table">Password</th><th class="table">Action</th>
                    </tr>
					<?php
                    require_once('connect.php');
					$line = 0;
                    $getUsers = mysqli_query($connect,"SELECT * FROM tblusers") or die(mysqli_error());
                    while($row = mysqli_fetch_array($getUsers)){
						if($line == 1){
							$bgcolor = '#E0EEF8';
							$line = 0;
						}else{
							$bgcolor = '#FFFFFF';
							$line = 1;
						}
                    ?>			
                    <tr align="center" bgcolor="<?php echo $bgcolor?>" height="30">
                    	<td align="center"><?php echo $row['name']?></td>
                        <td align="center"><?php echo $row['username']?></td>
                        <td align="center"><?php echo $row['password']?></td>
                        <td align="center" width="120"><a href="AdminEditUser.php?id=<?php echo $row['user_id']?>" class="link">EDIT</a>&nbsp;|&nbsp;<a href="AdminDeleteUser.php?id=<?php echo $row['user_id']?>" class="link" onclick="return confirm('Do you want to delete this?')">DELETE</a></td>
                    </tr>  
                    <?php } ?>
                </table>
            </div>
        
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
</body>
</html><?php } ?>