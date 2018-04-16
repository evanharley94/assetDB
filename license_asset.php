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
<script src="license_crud.js"></script>

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
			<li><a href="assets.php" accesskey="2" title="">Servers</a></li>
			<li><a href="network_asset.php" accesskey="3" title="">Networks</a></li>
			<li><a href="hardware_asset.php" accesskey="4" title="">Hardware</a></li>
			<li class="current_page_item"><a href="license_asset.php" accesskey="5" title="">Licenses</a></li>
			<li><a href="reports.php" accesskey="6" title="">Reports</a></li>
			<li><a href="search.php" accesskey="7" title="">Search</a></li>
		</ul>
	</div>
</div>
<div id="featured-wrapper">
	<div id="featured" class="container2">
		<div class="major">
			<h2>Licenses</h2>
		</div>
<div class="tab">
  <button class="tablinks" onclick="openTable(event, 'license')" id = "Btnlicense">License</button>
  <button class="tablinks" onclick="openTable(event, 'licenseusage')" id="Btnlicenseusage">License Usage</button>
</div>

		<div id="license" class="tabcontent">
		<table id="licenses" class="display">
    <thead>
        <tr>
        	<th style="display:none;"></th>
            <th bgcolor="#ffffff">License</th>
            <th>Quantity</th>
            <th>In Use</th>
            <th>Description</th>
            <th>Purchase Date</th>
            <th>Maintenance End Date</th>
            <th>PO Number</th>
            <th>Supplier</th>
            <th>Total Cost</th>
            <th>Renewal Info</th>
            <th bgcolor ="#ffffff"></th> <!-- headings have a background colour of white as datatables fixed colum is transaparent so you can see text behind without it -->
            <th bgcolor ="#ffffff"></th>
            <th bgcolor ="#ffffff"></th>
        </tr>
    </thead>
    <tbody>
    
    	<?php 
    	// if user clicks on an asset, load only that asset in JQUERY table
    	if (isset($_GET['id']))
    	{
    	    $license = $_GET['id'];
    	    $query = "SELECT license_id, license,quantity,description,purchase_date,m_date,po_number,supplier,cost, renewal_info FROM license WHERE license = '$license'";
    	}
    	
    	else if (isset($_GET['expiry'])) // if expired / nearing expiry load only these, onclick from reports
    	{
    	    $query = "SELECT license_id, license,quantity,description,purchase_date,m_date,po_number,supplier,cost, renewal_info FROM license WHERE m_date <= now() ";
    	}
    	
    	else if (isset($_GET['expirying']))
    	{
    	    $query = "SELECT license_id, license,quantity,description,purchase_date,m_date,po_number,supplier,cost, renewal_info FROM license WHERE m_date BETWEEN now() AND now() + interval 30 day ";
    	}
    	
    	else
    	{
		$query = 'SELECT license_id, license,quantity,description,purchase_date,m_date,po_number,supplier,cost, renewal_info FROM license';
    	}
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row) 
            {
                ?>     
        <tr class="table-tr" id="row<?php echo $row['license_id'];?>">
        	<td style="display:none;"></td>
            <td id="license_val<?php echo $row['license_id'];?>"><a href='license_asset.php?id=<?php echo $row['license']?>'><?php echo($license = $row['license']) ?></a></td> <!-- x_val + primarykey is needed to make each id unique or it will fail -->
            <td id="quantity_val<?php echo $row['license_id'];?>"><?php echo($row['quantity'])?></td> 
            <td id="in_use_val<?php echo $row['license_id'];?>"><?php $inUseQuery = $db->query("SELECT SUM(quantity) FROM license_usage WHERE license='$license'");$inUse = $inUseQuery->fetch(PDO::FETCH_ASSOC); foreach ($inUse as $key => $val) {echo $val;};?></td>
            <td id="description_val<?php echo $row['license_id'];?>"><?php echo($row['description']) ?></td>
            <td id="purchase_date_val<?php echo $row['license_id'];?>"><?php echo($row['purchase_date']) ?></td>
            <td id="m_date_val<?php echo $row['license_id'];?>"><?php echo($row['m_date']) ?></td>
            <td id="po_number_val<?php echo $row['license_id'];?>"><?php echo($row['po_number']) ?></td>
            <td id="supplier_val<?php echo $row['license_id'];?>"><?php echo($row['supplier']) ?></td>
            <td id="cost_val<?php echo $row['license_id'];?>"><?php echo($row['cost']) ?></td>
            <td id="renewal_info_val<?php echo $row['license_id'];?>"><?php echo($row['renewal_info']) ?></td>
      		<td><input type='button' class="material-icons" id="edit_button<?php echo $row['license_id'];?>" value="edit" onclick="edit_row_license('<?php echo $row['license_id'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="save_button<?php echo $row['license_id'];?>" value="save" onclick="save_row_license('<?php echo $row['license_id'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="delete_button<?php echo $row['license_id'];?>" value="delete" onclick="delete_row_license('<?php echo $row['license_id'];?>');"/></td>   
      </tr>

			<?php }?> 
		<!----------- Too insert new row -------------->	
        <tr id="new_row">
        	<td style="display:none;"></td> 
			<td><input type="text" id="new_license" style="width:150px"/></td>
 			<td><input type="number" id="new_quantity" style="width:100px"/></td>
 			<td></td>
			<td><input type="text" id="new_description" style="width:150px"/></td>
			<td><input type="date" id="new_purchase_date" style="width:130px"/></td>
			<td><input type="date" id="new_m_date" style="width:130px"/></td>
			<td><input type="text" id="new_po_number" style="width:100px"/></td>
			<td><input type="text" id="new_supplier" style="width:100px"/></td>
			<td><input type="text" id="new_cost" style="width:120px"/></td>
			<td><input type="text" id="new_renewal_info" style="width:160px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row_license();"/></td>
			<td></td>
			<td></td>
		</tr> 			

    </tbody>
</table>
</div>


<!-- ---------------LICENSE USAGE------------------------>

		<div id="licenseusage" class="tabcontent">
		<table id="usage" class="display">
    <thead>
        <tr>
        	<th style="display:none;"></th>
            <th bgcolor="#ffffff">License</th>
            <th>Hostname</th>
            <th>Quantity</th>
            <th>Start Date</th>
            <th>Expected End Date</th>
            <th>Project</th>
            <th>Details</th>
            <th bgcolor ="#ffffff"></th> <!-- headings have a background colour of white as datatables fixed colum is transaparent so you can see text behind without it -->
            <th bgcolor ="#ffffff"></th>
            <th bgcolor ="#ffffff"></th>
        </tr>
    </thead>
    <tbody>
    
    	<?php 
    	// if user clicks on an asset, load only that asset in JQUERY table
    	if (isset($_GET['id']))
    	{
    	    $license = $_GET['id'];
    	    $query = "SELECT license_id, license, hostname,quantity,start_date,end_date,project,details FROM license_usage WHERE license = '$license'";
    	}
    	
    	else
    	{
		$query = 'SELECT license_id, license, hostname,quantity,start_date,end_date,project,details FROM license_usage';
    	}
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row) 
            {
                ?>     
        <tr class="table-tr" id="row<?php echo $row['license_id'];?>">
        	<td style="display:none;"></td>
            <td id="license_val<?php echo $row['license_id'];?>"><a href='license_asset.php?id=<?php echo $row['license']?>'><?php echo($license = $row['license']) ?></a></td> <!-- x_val + serial_no is needed to make each id unique or it will fail -->
            <td id="hostname_val<?php echo $row['license_id'];?>"><?php echo($row['hostname'])?></td>  
            <td id="quantity_val<?php echo $row['license_id'];?>"><?php echo($row['quantity']) ?></td>
            <td id="start_date_val<?php echo $row['license_id'];?>"><?php echo($row['start_date']) ?></td>
            <td id="end_date_val<?php echo $row['license_id'];?>"><?php echo($row['end_date']) ?></td>
            <td id="project_val<?php echo $row['license_id'];?>"><?php echo($row['project']) ?></td>
            <td id="details_val<?php echo $row['license_id'];?>"><?php echo($row['details']) ?></td>
      		<td><input type='button' class="material-icons" id="edit_button<?php echo $row['license_id'];?>" value="edit" onclick="edit_row_license_usage('<?php echo $row['license_id'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="save_button<?php echo $row['license_id'];?>" value="save" onclick="save_row_license_usage('<?php echo $row['license_id'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="delete_button<?php echo $row['license_id'];?>" value="delete" onclick="delete_row_license_usage('<?php echo $row['license_id'];?>');"/></td>   
      </tr>

			<?php }?> 
		<!----------- Too insert new row -------------->	
        <tr id="new_row">
        	<td style="display:none;"></td> 
        	<td><select id = "new_use_license" style="width:150px"/>
			<?php 
			require_once ('dbconnection.php'); //get database connection
			$query = 'SELECT license FROM license';
			$result = $db->query($query);
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
			{
			    echo "<option value='" . $row['license'] ."'>" . $row['license'] ."</option>";
			}
			
			?>
			</select></td>
			<td><input type="text" id="new_use_hostname" style="width:150px"/></td>
 			<td><input type="number" id="new_use_quantity" style="width:130px"/></td>
			<td><input type="date" id="new_use_start_date" style="width:130px"/></td>
			<td><input type="date" id="new_use_end_date" style="width:130px"/></td>
			<td><input type="text" id="new_use_project" style="width:100px"/></td>
			<td><input type="text" id="new_use_details" style="width:150px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row_license_usage();"/></td>
			<td></td>
			<td></td>
		</tr> 			

    </tbody>
</table>
</div>

</div>
</div>
<!-- --------------------------------------- Initalise data tables ------------------------------------------- -->
<script>
$(document).ready( function () //initalise network data table
	{
   		var table = $('#licenses').DataTable({
      	 scrollX: true, //enable table to scroll horizontally
         fixedColumns:   { // fix serial_no column and edit/delete/save options
             leftColumns: 1,
             rightColumns: 3
         }}); 
   		table
   	    .column( '1:visible' ) // order colum serial_no ascending
   	    .order( 'asc' )
   	    .draw();
	} );

$(document).ready( function () //initalise network vlan data table
		{
	   		var table = $('#usage').DataTable({
	      	// scrollX: true, //enable table to scroll horizontally
	         fixedColumns:   { // fix serial_no column and edit/delete/save options
	             leftColumns: 1,
	             rightColumns: 3
	         }}); 
	   		table
	   	    .column( '1:visible' ) // order colum vlan ascending
	   	    .order( 'asc' )
	   	    .draw();
		} );


//***************************************************
// Tab options

var seltab = sessionStorage.getItem('sel_tab');
	if (seltab == "licenseusage") 
	{
 		document.getElementById("Btn" + seltab).click();
	} 
	else 
	{
  		document.getElementById("Btnlicense").click();
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

<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>