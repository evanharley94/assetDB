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
<script src="hardware_crud.js"></script>

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
			<li class="current_page_item"><a href="hardware_asset.php" accesskey="4" title="">Hardware</a></li>
			<li><a href="license_asset.php" accesskey="5" title="">Licenses</a></li>
			<li><a href="reports.php" accesskey="6" title="">Reports</a></li>
			<li><a href="search.php" accesskey="7" title="">Search</a></li>
		</ul>
	</div>
</div>
<div id="featured-wrapper">
	<div id="featured" class="container2">
		<div class="major">
			<h2>Hardware Assets</h2>
		</div>
<div class="tab">
  <button class="tablinks" onclick="openTable(event, 'hardware')" id="Btnhardware">Hardware</button>
  <button class="tablinks" onclick="openTable(event, 'hardware_usage')" id = "Btnhardware_usage">Hardware Usage</button>
  <button class="tablinks" onclick="openTable(event, 'maint')" id = "Btnmaint" >Maintenance</button>
</div>

		<div id="hardware" class="tabcontent">
		<table id="assets" class="display">
    <thead>
        <tr>
        	<th style="display:none;"></th>
            <th bgcolor="#ffffff">Serial Number</th>
            <th>Vendor</th>
            <th>Model</th>
            <th>Type</th>
            <th>Purchase Date</th>
            <th>Information</th>
            <th>PO Number</th>
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
    	    $serial_no = $_GET['id'];
    	    $query = "SELECT serial_no, vendor,model_no,type,purchase_date,misc_info,po_number FROM hardware WHERE serial_no = '$serial_no'";
    	}
    	
    	else if (isset($_GET['expiry'])) // if expired / nearing expiry load only these, onclick from reports
    	{
    	    $query = "SELECT serial_no, vendor,model_no,type,purchase_date,misc_info,po_number FROM hardware WHERE serial_no IN (SELECT serial_no FROM hardware_maintenance WHERE end_date <= now())  ";
    	}
    	
    	else if (isset($_GET['expirying']))
    	{
    	    $query = "SELECT serial_no, vendor,model_no,type,purchase_date,misc_info,po_number FROM hardware WHERE serial_no IN (SELECT serial_no FROM hardware_maintenance WHERE (end_date BETWEEN now() AND now() + interval 30 day))  ";
    	}
    	
    	else
    	{
		$query = 'SELECT serial_no, vendor,model_no,type,purchase_date,misc_info,po_number FROM hardware';
    	}
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row) 
            {
                ?>     
        <tr class="table-tr" id="row<?php echo $row['serial_no'];?>">
        	<td style="display:none;"></td>
            <td id="serial_no_val<?php echo $row['serial_no'];?>"><a href='hardware_asset.php?id=<?php echo $row['serial_no']?>'><?php echo($serial_no = $row['serial_no']) ?></a></td> <!-- x_val + serial_no is needed to make each id unique or it will fail -->
            <td id="vendor_val<?php echo $row['serial_no'];?>"><?php echo($row['vendor'])?></td>  
            <td id="model_no_val<?php echo $row['serial_no'];?>"><?php echo($row['model_no']) ?></td>
            <td id="type_val<?php echo $row['serial_no'];?>"><?php echo($row['type']) ?></td>
            <td id="purchase_date_val<?php echo $row['serial_no'];?>"><?php echo($row['purchase_date']) ?></td>
            <td id="misc_info_val<?php echo $row['serial_no'];?>"><?php echo($row['misc_info']) ?></td>
            <td id="po_number_val<?php echo $row['serial_no'];?>"><?php echo($row['po_number']) ?></td>
      		<td><input type='button' class="material-icons" id="edit_button<?php echo $row['serial_no'];?>" value="edit" onclick="edit_row('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="save_button<?php echo $row['serial_no'];?>" value="save" onclick="save_row('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="delete_button<?php echo $row['serial_no'];?>" value="delete" onclick="delete_row('<?php echo $row['serial_no'];?>');"/></td>   
      </tr>

			<?php }?> 
		<!----------- Too insert new row -------------->	
        <tr id="new_row">
        	<td style="display:none;"></td> 
			<td><input type="text" id="new_id" style="width:100px"/></td>
			<td><input type="text" id="new_vendor" style="width:100px"/></td>
 			<td><input type="text" id="new_model" style="width:100px"/></td>
			<td><input type="text" id="new_type" style="width:100px"/></td>
			<td><input type="date" id="new_purchase_date" style="width:130px"/></td>
			<td><input type="text" id="new_misc_info" style="width:100px"/></td>
			<td><input type="text" id="new_po_number" style="width:100px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row(document.getElementById('new_id').value);"/></td>
			<td></td>
			<td></td>
		</tr> 			

    </tbody>
</table>
</div>
<!--------------------------- Hardware USAGE ------------------------------>
<div id="hardware_usage" class="tabcontent">
		<table id="usage" class="display">
    <thead>
        <tr>
            <th>Serial Number</th>
            <th>Hostname</th>
            <th>IP Address</th>
            <th>Project</th>
            <th>Start Date</th>
            <th>Expected End Date</th>
            <th>Location</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    	<?php 
    	// if user clicks on an asset, load only that asset in JQUERY table
    	if (isset($_GET['id']))
    	{
    	    $serial_no = $_GET['id'];
    	    $query = "SELECT serial_no, hostname,ip_address,project,start_date,expected_end_date,location FROM hardware_usage WHERE serial_no = '$serial_no'";
    	}
    	
    	else if (isset($_GET['expiry'])) // if expired / nearing expiry load only these, onclick from reports
    	{
    	    $query = "SELECT serial_no, hostname,ip_address,project,start_date,expected_end_date,location FROM hardware_usage WHERE serial_no IN (SELECT serial_no FROM hardware_maintenance WHERE end_date <= now())  ";
    	}
    	
    	else if (isset($_GET['expirying']))
    	{
    	    $query = "SELECT serial_no, hostname,ip_address,project,start_date,expected_end_date,location FROM hardware_usage WHERE serial_no IN (SELECT serial_no FROM hardware_maintenance WHERE (end_date BETWEEN now() AND now() + interval 30 day))  ";
    	}
    	
    	else
    	{
		$query = 'SELECT serial_no, hostname,ip_address,project,start_date,expected_end_date,location FROM hardware_usage';
    	}
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row)
            {
                ?>
        <tr class="table-tr" id="row<?php echo $row['serial_no'];?>">
            <td id="serial_no_val<?php echo $row['serial_no'];?>"><a href='hardware_asset.php?id=<?php echo $row['serial_no']?>'><?php echo($serial_no = $row['serial_no']) ?></a></td> <!-- x_val + serial_no is needed to make each id unique or it will fail -->
            <td id="hostname_val<?php echo $row['serial_no'];?>"><?php echo($row['hostname'])?></td>  
            <td id="ip_address_val<?php echo $row['serial_no'];?>"><?php echo($row['ip_address']) ?></td>
            <td id="project_val<?php echo $row['serial_no'];?>"><?php echo($row['project']) ?></td>
            <td id="start_date_val<?php echo $row['serial_no'];?>"><?php echo($row['start_date']) ?></td>
            <td id="expected_end_date_val<?php echo $row['serial_no'];?>"><?php echo($row['expected_end_date']) ?></td>
            <td id="location_val<?php echo $row['serial_no'];?>"><?php echo($row['location']) ?></td>
      		<td><input type='button' class="material-icons" id="edit_button<?php echo $row['serial_no'];?>" value="edit" onclick="edit_row_usage('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="save_button<?php echo $row['serial_no'];?>" value="save" onclick="save_row_usage('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="delete_button<?php echo $row['serial_no'];?>" value="delete" onclick="delete_row_usage('<?php echo $row['serial_no'];?>');"/></td>   
      </tr>
    		<?php }?>
    		
    				<!----------- Too insert new row -------------->	
        <tr id="new_row">
        	<td style="display:none;"></td> 
			<td><select id = "new_serial_no" style="width:100px"/>
			<?php 
			require_once ('dbconnection.php'); //get database connection
			$query = 'SELECT serial_no FROM hardware WHERE serial_no NOT IN (SELECT serial_no FROM hardware_usage)';
			$result = $db->query($query);
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
			{
			    echo "<option value='" . $row['serial_no'] ."'>" . $row['serial_no'] ."</option>";
			}
			?>
			</select></td>
			<td><input type="text" id="new_hostname" style="width:200px"/></td>
 			<td><input type="text" id="new_ip_address" style="width:100px"/></td>
			<td><input type="text" id="new_project" style="width:100px"/></td>
			<td><input type="date" id="new_start_date" style="width:130px"/></td>
			<td><input type="date" id="new_expected_end_date" style="width:130px"/></td>
			<td><input type="text" id="new_location" style="width:100px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row_usage(document.getElementById('new_serial_no').value);"/></td>
			<td></td>
			<td></td>
		</tr>
    </tbody>
    </table>
</div>


<!-------------------------------- MAINTENANCE ------------------------------------------------>
<div id="maint" class="tabcontent">
		<table id="m1" class="display">
    <thead>
        <tr>
            <th>Serial Number</th>
            <th>Maintenance Provider</th>
            <th>Maintenance Reference</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <tbody>
    	<?php 
    	// if user clicks on an asset, load only that asset in JQUERY table
    	if (isset($_GET['id']))
    	{
    	    $serial_no = $_GET['id'];
    	    $query = "SELECT serial_no, company,reference,start_date,end_date FROM hardware_maintenance WHERE serial_no = '$serial_no'";
    	}
    	
    	else if (isset($_GET['expiry'])) // if expired / nearing expiry load only these, onclick from reports
    	{
    	    $query = "SELECT serial_no, company,reference,start_date,end_date FROM hardware_maintenance WHERE end_date <= now()  ";
    	}
    	
    	else if (isset($_GET['expirying']))
    	{
    	    $query = "SELECT serial_no, company,reference,start_date,end_date FROM hardware_maintenance WHERE end_date BETWEEN now() AND now() + interval 30 day  ";
    	}
    	
    	else
    	{
    	
		$query = 'SELECT serial_no, company,reference,start_date,end_date FROM hardware_maintenance';
		
    	}
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row)
            {
                ?>
        <tr class="table-tr" id="row<?php echo $row['serial_no'];?>">
            <td id="serial_no_val<?php echo $row['serial_no'];?>"><a href='hardware_asset.php?id=<?php echo $row['serial_no']?>'><?php echo($serial_no = $row['serial_no']) ?></a></td> <!-- x_val + serial_no is needed to make each id unique or it will fail -->
            <td id="company_val<?php echo $row['serial_no'];?>"><?php echo($row['company'])?></td>  
            <td id="reference_val<?php echo $row['serial_no'];?>"><?php echo($row['reference']) ?></td>
            <td id="s_date_val<?php echo $row['serial_no'];?>"><?php echo($row['start_date']) ?></td>
            <td id="end_date_val<?php echo $row['serial_no'];?>"><?php echo($row['end_date']) ?></td>
      		<td><input type='button' class="material-icons" id="edit_button<?php echo $row['serial_no'];?>" value="edit" onclick="edit_row_main('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="save_button<?php echo $row['serial_no'];?>" value="save" onclick="save_row_main('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="delete_button<?php echo $row['serial_no'];?>" value="delete" onclick="delete_row_main('<?php echo $row['serial_no'];?>');"/></td>   
      </tr>
    		<?php }?>
    		
    				<!----------- Too insert new row -------------->	
        <tr id="new_row">
        	<td style="display:none;"></td> 
			<td><select id = "main_serial_no" style="width:100px"/>
			<?php 
			require_once ('dbconnection.php'); //get database connection
			$query = 'SELECT serial_no FROM hardware WHERE serial_no NOT IN (SELECT serial_no FROM hardware_maintenance)';
			$result = $db->query($query);
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
			{
			    echo "<option value='" . $row['serial_no'] ."'>" . $row['serial_no'] ."</option>";
			}
			?>
			</select></td>
			<td><input type="text" id="new_company" style="width:170px"/></td>
 			<td><input type="text" id="new_reference" style="width:170px"/></td>
			<td><input type="date" id="main_start_date" style="width:130px"/></td>
			<td><input type="date" id="new_end_date" style="width:130px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row_main(document.getElementById('main_serial_no').value);"/></td>
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
$(document).ready( function () //initalise hardware data table
	{
   		var table = $('#assets').DataTable({
      	 //scrollX: true, //enable table to scroll horizontally
         fixedColumns:   { // fix serial_no column and edit/delete/save options
             leftColumns: 1,
             rightColumns: 3
         }}); 
   		table
   	    .column( '1:visible' ) // order colum serial_no ascending
   	    .order( 'asc' )
   	    .draw();
	} );

$(document).ready( function () //initalise hardware usage data table
		{
	   		var table = $('#usage').DataTable({
	      	// scrollX: true, //enable table to scroll horizontally
	         fixedColumns:   { // fix serial_no column and edit/delete/save options
	             leftColumns: 1,
	             rightColumns: 3
	         }}); 
	   		table
	   	    .column( '0:visible' ) // order colum serial_no ascending
	   	    .order( 'asc' )
	   	    .draw();
		} );

$(document).ready( function () //initalise maintenance data table
		{
	   		var table = $('#m1').DataTable({
	      	// scrollX: true, //enable table to scroll horizontally
	         fixedColumns:   { // fix serial_no column and edit/delete/save options
	             leftColumns: 1,
	             rightColumns: 3
	         }}); 
	   		table
	   	    .column( '0:visible' ) // order colum serial_no ascending
	   	    .order( 'asc' )
	   	    .draw();
		} );

//***************************************************
// Tab options

var seltab = sessionStorage.getItem('sel_tab');
	if (seltab == "hardware_usage") 
	{
 		document.getElementById("Btn" + seltab).click();
	} 
	else if (seltab == "maint") 
	{
 		document.getElementById("Btn" + seltab).click();
	} 
	else 
	{
  		document.getElementById("Btnhardware").click();
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