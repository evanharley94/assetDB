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
<script src="server_crud.js"></script>

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
			<h2>Server Details</h2>
		</div>

<?php 	
require_once ('dbconnection.php');
$serial_no = $_GET['id'];
?>
<b>Serial Number: <?php echo $serial_no;?></b>
<br></br>
<div class="tab">
  <button class="tablinks" onclick="openTable(event, 'server')" id="Btnserver">Server</button>
  <button class="tablinks" onclick="openTable(event, 'server_usage')" id = "Btnserver_usage">Server Usage</button>
  <button class="tablinks" onclick="openTable(event, 'maint')" id = "Btnmaint" >Maintenance</button>
</div>


<div id="server" class="tabcontent">
    
    	<?php 
		$query = "SELECT * FROM server WHERE serial_no = '$serial_no'";
		
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row) 
            {
                ?>  
                
                <b>Vendor:</b> <?php echo $row['vendor']?>
                <b>Model: <?php echo $row['model_no']?>
                <b>Type: <?php echo $row['type']?>
                <b>Purchase Date: <?php echo $row['purchase_date']?>
                <b>Memory: <?php echo $row['memory']?>
                <b>Processor Type: <?php echo $row['proc_type']?>
                <b>Cores: <?php echo $row['proc_cores']?>
                <b>Speed: <?php echo $row['proc_speed']?>
                <b>Information: <?php echo $row['misc_info']?>
                <b>U Size: <?php echo $row['u_size']?>
                <b>PO Number: <?php echo $row['po_number']?>
                
                
   

      <?php }?> 


</div>
</div>

<script>
//***************************************************
// Tab options

var seltab = sessionStorage.getItem('sel_tab');
	if (seltab) 
	{
 		document.getElementById("Btn" + seltab).click();
	} 
	else 
	{
  		document.getElementById("Btnserver").click();
	}

function openTable(evt, tableName) {
   
    var i, tabcontent, tablinks;
    sessionStorage.setItem('sel_tab', tableName);

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) 
    {
        tablinks[i].className = tablinks[i].className.replace(" active", ""); // remove active from tabs that are not opened
    }

    document.getElementById(tableName).style.display = "block"; // show current tab
    evt.currentTarget.className += " active"; // make tab active and open
}


</script>
</div>
<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>