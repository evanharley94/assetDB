<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include 'checkIfLoggedIn.php'?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assets</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css"/>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.3/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
<body>
<div id="logo">
	<h1><a href="#" class="icon icon-group"><span>ADC Asset Management System</span></a></h1>
	<h3 align="right">Welcome <?php echo $_SESSION['first_name'] ?> <a href='logout.php'>(logout?)</a></h3>
</div>
<div id="header">
	<div id="menu" class="container">
		<ul>
			<li><a href="index.php" accesskey="1" title="">Homepage</a></li>
			<li class="current_page_item"><a href="servers.php" accesskey="2" title="">Servers</a></li>
			<li><a href="networks.php" accesskey="3" title="">Networks</a></li>
			<li><a href="hardware.php" accesskey="4" title="">Hardware</a></li>
			<li><a href="licenses.php" accesskey="5" title="">Licenses</a></li>
			<li><a href="reports.php" accesskey="6" title="">Reports</a></li>
			<li><a href="search.php" accesskey="7" title="">Search</a></li>
		</ul>
	</div>
</div>
<div id="featured-wrapper">
	<div id="featured" class="container2">
		<div class="major">
			<h2>Reports</h2>
		</div>
<h2>Server Reports</h2>
<div class="containerR">
  <div class="centerR">
  <br>
  <button class="buttonR" onClick="window.location.href='assets.php?expiry=1'">Maintenance Expired</button>
  <button class="buttonR" onClick="window.location.href='assets.php?expirying=1'">Maintenance Expiring 30 days</button>
  </div>
</div>
<br></br>
<h2>Network Reports</h2>
<div class="containerR">
  <div class="centerR">
  <br>
  <button class="buttonR" onClick="window.location.href='network_asset.php?expiry=1'">Maintenance Expired</button></a>
  <button class="buttonR" onClick="window.location.href='network_asset.php?expirying=1'">Maintenance Expiring 30 days</button>
  </div>
</div>
<br></br>
<h2>Hardware Reports</h2>
<div class="containerR">
  <div class="centerR">
  <br>
  <button class="buttonR" onClick="window.location.href='hardware_asset.php?expiry=1'">Maintenance Expired</button>
  <button class="buttonR" onClick="window.location.href='hardware_asset.php?expirying=1'">Maintenance Expiring 30 days</button>
  </div>
</div>
<br></br>
<h2>License Reports</h2>
<div class="containerR">
  <div class="centerR">
  <br>
  <button class="buttonR" onClick="window.location.href='license_asset.php?expiry=1'">Maintenance Expired</button>
  <button class="buttonR" onClick="window.location.href='license_asset.php?expirying=1'">Maintenance Expiring 30 days</button>
  </div>
</div>
<br></br>

</div>
</div>	

<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>