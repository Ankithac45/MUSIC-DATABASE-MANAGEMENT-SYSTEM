<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JINGLES | Contact</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css" />
</head>

<body>

<div class="header_menu"><!--Start Menu-->
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
</div><!--End Menu-->
<div class="header_under"></div>
<div class="container_wrapper"><!--Start Container for the web content-->
    <div class="sidebar_menu"><!--Sidebar-->
    	<h3 class="header_1">JINGLES</h3>
            <ul>
            	<li><a href="History.php">About Project</a></li>
                <li><a href="Contacts.php">Submitted BY</a></li>
            </ul>
    </div><!--End sidebar-->
    <div class="col2"><!--Start second column-->
   
     	<div id="header_title">Contact</div>
		<div class="content1_info">
        	<h1>Name: Gagan Goutham</h1>
            <h1>SRN: PES1UG20CS550</h1>
            <h1>SECTION: I</h1>
            <h1>PROJECT TITLE: MUSIC DATABASE MANAGEMENT</h1>
            <h1>DATABASE NAME: JINGLES</h1>

        </div>
    </div><!--End second column-->
</div>
</body>
</html>