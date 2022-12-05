<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JINGLES | Song Genres</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css" />
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<style type="text/css">
#sub{ cursor:pointer; width:70px; font-family:"Courier New", Courier, monospace; font-weight:600;height:30px; margin-top:0}
#sub:hover,#can:hover{
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
			<li><a href="../loginpage.php">LOGIN</a></li>
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
        	<form name="search" id="search" method="post" action="Search.php" onsubmit="return validate()">
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
		$id = $_GET['id'];
		$line = 0;
		$page = 'Genre.php';
		$dataperpage = mysqli_query($connect,"SELECT * FROM tblalbum WHERE albumgen = '$id'");
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
        $getAlbum = mysqli_query($connect,"SELECT * FROM tblalbum  WHERE albumgen = '$id' ORDER BY id LIMIT $eu,$limit");
        while($rowAlbum = mysqli_fetch_array($getAlbum)){
       	?>	
     		<div class="content_holder"><!--Start content holder for the album-->
            	<div class="info">
                	<?php echo "<img src=../Administrator/PHP/upload_images/album/$rowAlbum[albumimage] height=70 width=70/>"; ?> 
                	<div class="info1">
                    	<?php
						$album = strtoupper($rowAlbum['albumname']);
						echo '<table cellpadding=0 cellspacing=0>';
							echo '<tr>';
								echo '<td><label id=album>Album:</label></td>';
								echo "<td><a href='ViewSongs.php?id=".$rowAlbum['id']."' id=link>".$album."</td>";
							echo '</tr>';
							echo '<tr>';
								echo '<td><label id=a1>Singer:</label></td>';
								echo '<td><label id=a2>'.$rowAlbum['albumsinger'].'</label></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td><label id=a1>Writer:</label></td>';
								echo '<td><label id=a2>'.$rowAlbum['albumwriter'].'</label></td>';
							echo '</tr>';
						echo '</table>';
						?>
                    </div>
                </div>
            </div><!--End content holder for the album-->
        <?php
			} //End row album
			//////////////////
			//
			//Start Pagination
			if($numpage>$limit){
				echo "<table align=center><tr><td align=left>";
					if($back>=0){
						echo "<a href=$page?start=$back>PREV</a>";	
					}
						echo "</td><td align=center width=200>";
							$l = 1;
								for($i = 0; $i < $numpage;$i = $i + $limit){
									if($i<>$eu){
										echo "<a href=$page?start=$i><font color=red>$l</font></a>";	
									}else{
										echo "<font color=red>$l</font>";	
									}		
										$l = $l + 1;
									}
						echo "</td><td align=right>";
							if($thisp<$numpage){
								echo "<a href=$page?start=$next>NEXT</a>";	
							}
				echo "</td></tr></table>";
			}
		?>  
    </div><!--End second column-->
</div><!--End Container-->
</body>
</html>
