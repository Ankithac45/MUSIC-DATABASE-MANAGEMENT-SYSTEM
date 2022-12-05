<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JINGLES | History</title>
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
                <li><a href="Contacts.php">Contact Us</a></li>
            </ul>
    </div><!--End sidebar-->
    <div class="col2"><!--Start second column-->
   
     	<div id="header_title">JINGLES MUSIC DATABASE MANAGEMENT SYSTEM</div>
        	<div class="content1_info">
				<p>JINGLES music database website has a user side and an admin side, where a user can easily see the available albums and play the music. Furthermore, the admin is crucial to the management of this system. All of the primary tasks in this project must be completed by the user from the admin side.
</p>	
                <p>The user can view all of the most recent releases, the top 10 songs with rankings, news, and highlighted music. They can also vote for and listen to their favorite songs. The customers have the option to view every album and select any one to listen to its tracks.
</p>
                <p>The admin has total access to the system from the admin panel. Each music record can be managed by him or her. The administrator must choose a genre, name, performer, writer, description, and cover photo before adding albums. Admins have the ability to add album genres. Additionally, he or she can just add songs to the album recordings that already exist. </p>
        	</div>
    </div><!--End second column-->
</div>
</body>
</html>