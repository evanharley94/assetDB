<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include 'checkIfLoggedIn.php'?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Servers</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<script>sessionStorage.clear();  // this is needed to clear the local storage of the tab options so they load the first one 
</script>
</head>
<body>
<div id="logo">
	<h1><a href="#" class="icon icon-group"><span>ADC Asset Management System</span></a></h1>
	<h3 align="right">Welcome <?php echo $_SESSION['first_name'] ?> <a href=logout.php>(logout?)</a></h3>
</div>
<div id="header">
	<div id="menu" class="container">
		<ul>
			<li><a href="index.php" accesskey="1" title="">Homepage</a></li>
			<li><a href="servers.php" accesskey="2" title="">Servers</a></li>
			<li><a href="networks.php" accesskey="3" title="">Networks</a></li>
			<li class="current_page_item"><a href="#" accesskey="4" title="">Hardware</a></li>
			<li><a href="licenses.php" accesskey="5" title="">Licenses</a></li>
			<li><a href="reports.php" accesskey="6" title="">Reports</a></li>
			<li><a href="search.php" accesskey="7" title="">Search</a></li>
		</ul>
	</div>
</div>
<div id="featured-wrapper">
	<div id="featured" class="container">
		<div class="major">
			<h2>Hardware Assets</h2>
		</div>
		<div class="column1">
			<a href="hardware_asset.php"><span class="icon icon-laptop"></span></a>
			<div class="title">
				<h2><a href="assets.php">View Hardware Assets</a></h2>
				<span class="byline">View Hardware assets</span>
			</div>
		</div>
		<div class="column2">
			<a href=""><span class="icon icon-qrcode"></span></a>
			<div class="title">
				<h2><a href="">View deployed Hardware</a></h2>
				<span class="byline">View deployed hardware assets</span>
			</div>
		</div>
		<a href="#"><div id="" class="column3">
			<span class="icon icon-plus"></span>
			<div class="title">
				<h2>Add a New Hardware Asset</h2></a>
				<span class="byline">Add a new Hardware asset</span>
			</div>
		</div>
		<div class="column4">
			<a href=""><span class="icon icon-home"></span></a>
			<div class="title">
				<h2><a href="licenses.php">Deploy an Asset</a></h2>
				<span class="byline">Assign a Hardware Asset to a project / location</span>
			</div>
		</div>
	</div>
</div>

<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>