<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include 'checkIfLoggedIn.php'?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="svg.js"></script>

</head>
<body>
<div id="logo">
	<h1><a href="#" class="icon icon-group"><span>ADC Asset Management System</span></a></h1>
	<h3 align="right">Welcome <?php echo $_SESSION['first_name'] ?> <a href=logout.php>(logout?)</a></h3>
</div>
<div id="header">
	<div id="menu" class="container">
		<ul>
			<li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>
			<li><a href="servers.php" accesskey="2" title="">Servers</a></li>
			<li><a href="#" accesskey="3" title="">Networks</a></li>
			<li><a href="#" accesskey="4" title="">Hardware</a></li>
			<li><a href="#" accesskey="5" title="">Licenses</a></li>
			<li><a href="#" accesskey="6" title="">Reports</a></li>
			<li><a href="#" accesskey="7" title="">Search</a></li>
		</ul>
	</div>
</div>
<div id="featured-wrapper">
	<div id="featured" class="container">
		<div class="major">
			<h2>Manage ADC Desks</h2>
		</div>
		
		<div id="drawing"></div>
		<script>
		var draw = SVG('drawing')

		// draw pod
		var polyline = draw.polyline('50,0 60,40 100,50 60,60 50,100 40,60 0,50 40,40')
		polyline.fill('none').move(20, 20)
		polyline.stroke({ color: '#f06', width: 4, linecap: 'round', linejoin: 'round' })

		


		</script>
	</div>
</div>
<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
