<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/index.css" />
<title>JINGLES | Search Albums</title>
<style type="text/css">
#f{ font-family:Arial, Helvetica, sans-serif; font-size:13px; font-weight:bold;}
#sub{ cursor:pointer; width:70px; font-family:"Courier New", Courier, monospace; font-weight:600; height:30px;}
#sub:hover{
	color:#06F;
	-moz-box-shadow:0px 0px 5px #B0B0B0;
	-webkit-box-shadow:0px 0px 5px #B0B0B0;
	-khtml-box-shadow:0px 0px 5px #B0B0B0;
	border:1.5em medium #B0B0B0;}
</style>
<script type="text/javascript">
function validate(){
	var searchdata = document.forms["search"]["search"].value;
	
	if(searchdata =="" || searchdata==null){
		alert("Enter album name!");
		return false;
	}
}
</script>
</head>

<body>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
		<ul>
			<li><a href="../loginpage.php">Login</a></li>
        	<li><a href="../index.php">HOME</a></li>
            <li><a href="Albums.php">ALBUMS</a></li>
            <li><a href="AboutUs.php">ABOUT US</a></li>
			<li><a href="Songs.php">VOTE</a></li>
			<li><a href="../dialog_box.php">QUERY</a></li>
            <li><a><?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
				?></a></li>
        </ul>
    </div>
</div>
<!--End Menu-->
<div class="header_under"></div>
<div class="container_wrapper"><!--Start Container for the web content-->
    <div class="sidebar_menu"><!--Sidebar-->
    	<h3 class="header_1">JINGLES</h3>
            <ul>
                <?php 
                require_once('../Administrator/PHP/connect.php');
                $getGen= mysqli_query($connect,"SELECT id,genname FROM tblgenre");
                while($rowGen = mysqli_fetch_array($getGen)){
                ?>
                <li>
                <a href="AlbumByGenre.php?id=<?php echo $rowGen['id']?>"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;<?php echo $rowGen['genname']?></a>
                </li>
                <?php } ?>
            </ul>
    </div><!--End Sidebar-->   
    <div class="col2"><!--Start second column-->
    	<div class="search_box"><!--Start search box container-->
        	<form name="search" id="search" method="post" onsubmit="return validate()">
            	<table>
                	<tr>
                    	<td>Genre</td>
                    	<td>
                        	<select name="genre">
                            <option value="SELECT" selected="selected">--SELECT GENRE--</option>
                            <?php 
							$getGen= mysqli_query($connect,"SELECT id,genname FROM tblgenre");
							while($rowGen = mysqli_fetch_array($getGen)){
							?>
                            	<option value="<?php echo $rowGen['id']?>"><?php echo $rowGen['genname']?></option>
                            <?php } ?>
                            </select>
                        </td>
                        <td>
                        	<input type="text" id="search" name="search" placeholder="Enter Album Name" size="39"/>
                        </td>
                        <td>
                        	<input type="submit" value="Search" id="sub"/>
                		</td>
                    </tr>
                </table>
            </form>
    	</div><!--End search box container-->
		<div id="header_title">Album List</div>
        <?php
		error_reporting(E_ERROR);
		$genre = $_POST['genre'];
		$search = $_POST['search'];
		$searchquery = mysqli_query($connect,"SELECT * FROM tblalbum WHERE albumgen = '".$genre."'
							AND albumname LIKE '%$search%' ORDER BY id LIMIT 10");
		while($rowSearch = mysqli_fetch_array($searchquery)){
       	?>	
     		<div class="content_holder"><!--Start content holder for the album-->
            	<div class="info">
                	<?php echo "<img src=../Administrator/PHP/upload_images/album/$rowSearch[albumimage] height=70 width=70/>"; ?> 
                	<div class="info1">
                    	<?php
						$album = strtoupper($rowSearch['albumname']);
						echo '<table cellpadding=0 cellspacing=0>';
							echo '<tr>';
								echo '<td><label id=album>Album:</label></td>';
								echo "<td><a href='ViewSongs.php?id=".$rowSearch['id']."' id=link>".$album."</td>";
							echo '</tr>';
							echo '<tr>';
								echo '<td><label id=a1>Singer:</label></td>';
								echo '<td><label id=a2>'.$rowSearch['albumsinger'].'</label></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td><label id=a1>Writer:</label></td>';
								echo '<td><label id=a2>'.$rowSearch['albumwriter'].'</label></td>';
							echo '</tr>';
						echo '</table>';
						?>
                    </div>
                </div>
            </div><!--End content holder for the album-->
        <?php
		} //End row album
		if(mysqli_num_rows($searchquery)==0){
			echo '<div class=error>';
				echo 'Search Result(0)';
			echo '</div>';
		}
		?>  
    </div><!--End second column-->
</div><!--End Container-->
</body>
</html>