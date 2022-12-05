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
            <li><a href="AdminViewGenre.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbspView Genres</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Genre Record Section</h2>	
        	<div class="form">
            	<table width="650" border="0" cellpadding="1" cellspacing="0">
                	<tr>
                    	<th class="table">ID</th><th class="table">Genre</th><th class="table">Image</th><th class="table">Action</th>
                    </tr>
            	<?php
				require_once('connect.php');	
				error_reporting(E_ERROR);
				$line = 0;
				$page = 'AdminViewGenre.php';
				$dataperpage = mysqli_query($connect,"SELECT * FROM tblgenre");
				$numpage = mysqli_num_rows($dataperpage);
				$start = $_GET['start'];
				$eu = $start - 0;
				$limit = 10;
				$thisp= $eu + $limit;
				$back = $eu - $limit;
				$next = $eu + $limit;
				if(strlen($start) > 0 && !is_numeric($start)){
					echo 'Data Error';	
					exit();
				}
				
				$getGen = mysqli_query($connect,"SELECT * FROM tblgenre ORDER BY id ASC LIMIT $eu,$limit");
				while($rowGen = mysqli_fetch_array($getGen)){
					if($line == 1){
						$bgcolor = '#E0EEF8';
						$line = 0;
					}else{
						$bgcolor = '#FFFFFF';
						$line = 1;
					}
				?>
                	<tr align="center" bgcolor="<?php echo $bgcolor?>">
                    	<td align="center"><?php echo $rowGen['id']?></td>
                        <td align="center"><?php echo $rowGen['genname']?></td>
                        <td align="center"><?php echo "<img src=upload_images/genre/$rowGen[genimage] width=50 height=30"?></td>
                        <td align="center">
                        <a href="AdminEditGenre.php?id=<?php echo $rowGen['id']?>" class="link">Edit<a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="AdminDeleteGenre.php?id=<?php echo $rowGen['id']?>" class="link" onclick="return confirm('Do you want to delete this?')">Delete</a>
                        
                        </td>
                    </tr>
                <?php
				if($numpage>$limit){
							echo "<table><tr><td>";
							if($back>=0){
								echo "<a href=$page?start=$back><font size=5>PREV</font></a>";	
							}
							echo "</td><td align=center>";
								$l = 1;
								for($i = 0; $i < $numpage;$i = $i + $limit){
									if($i<>$eu){
										echo "<a href=$page?start=$i><font color=red size=5>$l</font></a>";	
									}else{
										echo "<font color=red>$l</font>";	
									}
									$l = $l + 1;
								}
							echo "</td><td>";
							if($thisp<$numpage){
								echo "<a href=$page?start=$next><font size=5>NEXT</font></a>";	
							}
							echo "</td></tr></table>";
						}
				}
				?>
                </table>
            </div><!--End Form-->
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
</body>
</html><?php }?>