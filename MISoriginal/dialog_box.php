<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JINGLES</title>
<link rel="stylesheet"  type="text/css" href="CSS/index.css" />
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.error').delay(1200).fadeOut('normal');
	$('.success').delay(1200).fadeOut('normal');	
});
</script>
<script type="text/javascript">

function slideSwitch() {
    var $active = $('#slideshow DIV.active');

    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');

    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');

    // uncomment below to pull the divs randomly
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<!--CSS Style-->
<style type="text/css">
#slideshow {
    position:relative;
    height:272px;
}

#slideshow DIV {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
    height: 272px;
    background-color: #FFF;
}

#slideshow DIV.active {
    z-index:10;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:9;
}

#slideshow DIV IMG {
    height: 272px;
	width:630px;
    display: block;
    border: 0;
    margin-bottom: 10px;
}

.news_content ul{ padding:0px; margin:0px;}
.news_content ul li{
	padding-top:10px;
	padding-left:5px;
	list-style:none; 
	font-size:11px;
}
.news_content ul li a{
	text-decoration:none;
	color:#7E7E7E;
	font-family:Georgia, "Times New Roman", Times, serif;
}
.news_content ul li a:hover{
	text-decoration:underline;
	color:#09F;
}
#table{
	color:#7E7E7E;
	font-family:Georgia, "Times New Roman", Times, serif; font-size:11px;}

#apDiv1 {
	position:absolute;
	width:630px;
	height:272px;
	z-index:1;
	border:1px solid #FFF;
	left: 31px;
	top: 23px;
}
</style>
</head>

<body>
<!--Start Menu-->
<div class="header_menu">
	<div class="menu">
    	<ul>
            <li><a href="loginpage.php">LOGIN</a></li>
        	<li><a href="index.php">HOME</a></li>
            <li><a href="Frontend/Albums.php">ALBUMS</a></li>
            <li><a href="Frontend/AboutUs.php">ABOUT US</a></li>   
			<li><a href="Frontend/Songs.php">VOTE</a></li>
            <li><a href="dialog_box.php">QUERY</a></li>			
            <li><a><?php
				$today = date('F j, Y');
				echo '&nbsp;Today is '.$today;
				?></a></li>
    	</ul>
    </div>
</div>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JINGLES</title>
    <!-- <?php include 'includes/_links.php'; ?> -->
</head>



<!-- <?php include 'includes/_navbar.php'; ?> -->
    <main>

    <div >
    <form id="checkoutForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
    <div style="margin-left: 170px;margin-top:150px"> 
    <input type="text"  style="height:150px;width:1000px;background-color:black;color:white" name="query_name" id="query_name" class="form-control" >
    </div>
    <div style="margin-left: 620px;margin-top:40px">
    <button type="submit" style="background-color:black;color:white">Results</button>
    <br>
    <br>    
    </div>
    </form>
    </div>

    <?php
        include 'Administrator/PHP/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['query_name']!=""){
        $query_name = $_POST['query_name'];
        $getQuery = mysqli_query($connect,$query_name) or die(mysqli_error());
        while($row = mysqli_fetch_array($getQuery)){
            echo json_encode($row);
            echo "<br>";
            echo "<br>";
        }
    }}

        

         ?>
    <!-- <?php include 'includes/_error_toast.php'; ?> -->
    </main>
    <!-- <?php include 'includes/_scripts.php'; ?> -->

</body>
