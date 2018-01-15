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
<script>sessionStorage.clear(); // this is needed to clear the local storage of the tab options so they load the first one 
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
			<li class="current_page_item"><a href="#" accesskey="2" title="">Servers</a></li>
			<li><a href="networks.php" accesskey="3" title="">Networks</a></li>
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
			<h2>Server Assets</h2>
		</div>
		<div class="column1">
			<a href="assets.php"><span class="icon icon-cloud"></span></a>
			<div class="title">
				<h2><a href="assets.php">View Server Assets</a></h2>
				<span class="byline">View current server assets</span>
			</div>
		</div>
		<div class="column2">
			<a href="network.php"><span class="icon icon-qrcode"></span></a>
			<div class="title">
				<h2><a href="networks.php">View deployed servers</a></h2>
				<span class="byline">View deployed server assets</span>
			</div>
		</div>
		<a href="#"><div id="addServerButton" class="column3">
			<span class="icon icon-plus"></span>
			<div class="title">
				<h2>Add a New Server</h2></a>
				<span class="byline">Add a new server asset</span>
			</div>
		</div>
		<div class="column4">
			<a href="licenses.php"><span class="icon icon-home"></span></a>
			<div class="title">
				<h2><a href="licenses.php">Deploy a server</a></h2>
				<span class="byline">Assign a server to a project / location</span>
			</div>
		</div>
	</div>
</div>

<!-- The Modal (pop up window) -->
<div id="addServer" class="modal">

  <div class="modal-content" align= "center">
    <span class="close">&times;</span>
    <h2>Add Server Asset Details</h2>
    <br>
		<form action="serverAdd.php" method="post">
			<table>
				<tr>
					<td align="left">Serial Number: *</td>
					<td align="left"><input type="text" name="serial_no" required/></td>
				</tr>
				<tr>
					<td align="left">Vendor:</td>
					<td align="left"><input type="text" name="vendor"/></td>
				</tr>
				<tr>
					<td align="left">Model Number:</td>
					<td align="left"><input type="text" name="model_no"/></td>
				</tr>
				<tr>
					<td align="left">Type:</td>
					<td align="left"><input type="text" name="type"/></td>
				</tr>
				<tr>
					<td align="left">Purchase Date:</td>
					<td align="left"><input type="date" name="purchase_date"/></td>
				</tr>
				<tr>
					<td align="left">Memory:</td>
					<td align="left"><input type="text" name="memory"/></td>
				</tr>
				<tr>
					<td align="left">Processor Type:</td>
					<td align="left"><input type="text" name="proc_type"/></td>
				</tr>
				<tr>
					<td align="left">Number of Processors:</td>
					<td align="left"><input type="number" name="no_of_procs"/></td>
				</tr>
				<tr>
					<td align="left">Processor Cores:</td>
					<td align="left"><input type="number" name="proc_cores"/></td>
				</tr>
				<tr>
					<td align="left">Processor Speed:</td>
					<td align="left"><input type="text" name="proc_speed"/></td>
				</tr>
				<tr>
					<td align="left">Information:</td>
					<td align="left"><input type="text" name="misc_info"/></td>
				</tr>
				<tr>
					<td align="left">U Size:</td>
					<td align="left"><input type="number" name="u_size"/></td>
				</tr>
				<tr>
					<td align="left">PO Number:</td>
					<td align="left"><input type="text" name="po_number"/></td>
				</tr>
				<tr>
					<td><br><input type="submit" name="addServer" value="Add Server" /></td>
					<td><input type="hidden" name="addServer" value="TRUE" /></td>
				</tr>
			</table>
		</form>
		</div>
 </div>
  
<script>

var modal = document.getElementById('addServer'); //get modal

var btn = document.getElementById("addServerButton"); // get element that uses modal

var span = document.getElementsByClassName("close")[0]; 

btn.onclick = function()  // onclick open modal
{
    modal.style.display = "block";
}

span.onclick = function() //close modal when pressing x
{
    modal.style.display = "none";
}

window.onclick = function(event) // close modal when you click outside the model
{
    if (event.target == modal) 
        {
        modal.style.display = "none";
    }
}
</script>

<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>