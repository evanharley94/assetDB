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
<script src="network_crud.js"></script>

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
			<li><a href="servers.php" accesskey="2" title="">Servers</a></li>
			<li class="current_page_item"><a href="#" accesskey="3" title="">Networks</a></li>
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
			<h2>Network Assets</h2>
		</div>
<div class="tab">
  <button class="tablinks" onclick="openTable(event, 'network_vlan')" id = "Btnnetwork_vlan">Network VLAN</button>
  <button class="tablinks" onclick="openTable(event, 'network')" id="Btnnetwork">Network</button>
  <button class="tablinks" onclick="openTable(event, 'maint')" id = "Btnmaint" >Maintenance</button>
</div>

		<div id="network_vlan" class="tabcontent">
		<table id="vlans" class="display">
    <thead>
        <tr>
        	<th style="display:none;"></th>
            <th bgcolor="#ffffff">VLAN Name</th>
            <th>Site</th>
            <th>Description</th>
            <th>Project</th>
            <th>IP Address Range</th>
            <th>Subnet Mask</th>
            <th>Gateway</th>
            <th bgcolor ="#ffffff"></th> <!-- headings have a background colour of white as datatables fixed colum is transaparent so you can see text behind without it -->
            <th bgcolor ="#ffffff"></th>
            <th bgcolor ="#ffffff"></th>
        </tr>
    </thead>
    <tbody>
    
    	<?php 
		$query = 'SELECT vlan,site,description,project,ip_range,subnet,gateway FROM network_vlan';
		
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row) 
            {
                ?>     
        <tr class="table-tr" id="row<?php echo $row['vlan'];?>">
        	<td style="display:none;"></td>
            <td id="vlan_val<?php echo $row['vlan'];?>"><?php echo($vlan = $row['vlan']) ?></td> <!-- x_val + primarykey is needed to make each id unique or it will fail -->
            <td id="site_val<?php echo $row['vlan'];?>"><?php echo($row['site'])?></td>  
            <td id="description_val<?php echo $row['vlan'];?>"><?php echo($row['description']) ?></td>
            <td id="project_val<?php echo $row['vlan'];?>"><?php echo($row['project']) ?></td>
            <td id="ip_range_val<?php echo $row['vlan'];?>"><?php echo($row['ip_range']) ?></td>
            <td id="subnet_val<?php echo $row['vlan'];?>"><?php echo($row['subnet']) ?></td>
            <td id="gateway_val<?php echo $row['vlan'];?>"><?php echo($row['gateway']) ?></td>
      		<td><input type='button' class="material-icons" id="edit_button<?php echo $row['vlan'];?>" value="edit" onclick="edit_row_vlan('<?php echo $row['vlan'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="save_button<?php echo $row['vlan'];?>" value="save" onclick="save_row_vlan('<?php echo $row['vlan'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="delete_button<?php echo $row['vlan'];?>" value="delete" onclick="delete_row_vlan('<?php echo $row['vlan'];?>');"/></td>   
      </tr>

			<?php }?> 
		<!----------- Too insert new row -------------->	
        <tr id="new_row">
        	<td style="display:none;"></td> 
			<td><input type="text" id="new_vlan" style="width:150px"/></td>
 			<td><input type="text" id="new_site" style="width:100px"/></td>
			<td><input type="text" id="new_description" style="width:150px"/></td>
			<td><input type="text" id="new_project" style="width:100px"/></td>
			<td><input type="text" id="new_ip_range" style="width:150px"/></td>
			<td><input type="text" id="new_subnet" style="width:120px"/></td>
			<td><input type="text" id="new_gateway" style="width:120px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row_vlan(document.getElementById('new_vlan').value);"/></td>
			<td></td>
			<td></td>
		</tr> 			

    </tbody>
</table>
</div>


<!-- ---------------NETWORK ------------------------>

		<div id="network" class="tabcontent">
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
            <th>U Size</th>
            <th>PO Number</th>
            <th bgcolor ="#ffffff"></th> <!-- headings have a background colour of white as datatables fixed colum is transaparent so you can see text behind without it -->
            <th bgcolor ="#ffffff"></th>
            <th bgcolor ="#ffffff"></th>
        </tr>
    </thead>
    <tbody>
    
    	<?php 
		$query = 'SELECT serial_no, vendor,model_no,type,purchase_date,misc_info,u_size,po_number FROM network';
		
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row) 
            {
                ?>     
        <tr class="table-tr" id="row<?php echo $row['serial_no'];?>">
        	<td style="display:none;"></td>
            <td id="serial_no_val<?php echo $row['serial_no'];?>"><?php echo($serial_no = $row['serial_no']) ?></td> <!-- x_val + serial_no is needed to make each id unique or it will fail -->
            <td id="vendor_val<?php echo $row['serial_no'];?>"><?php echo($row['vendor'])?></td>  
            <td id="model_no_val<?php echo $row['serial_no'];?>"><?php echo($row['model_no']) ?></td>
            <td id="type_val<?php echo $row['serial_no'];?>"><?php echo($row['type']) ?></td>
            <td id="purchase_date_val<?php echo $row['serial_no'];?>"><?php echo($row['purchase_date']) ?></td>
            <td id="misc_info_val<?php echo $row['serial_no'];?>"><?php echo($row['misc_info']) ?></td>
            <td id="u_size_val<?php echo $row['serial_no'];?>"><?php echo($row['u_size']) ?></td>
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
			<td><input type="number" id="new_u_size" style="width:100px"/></td>
			<td><input type="text" id="new_po_number" style="width:100px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row(document.getElementById('new_id').value);"/></td>
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
		$query = 'SELECT serial_no, company,reference,start_date,end_date FROM network_maintenance';
		
		require_once ('dbconnection.php'); //get database connection
            $data = $db->query($query);
            $data->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($data as $row)
            {
                ?>
        <tr class="table-tr" id="row<?php echo $row['serial_no'];?>">
            <td id="serial_no_val<?php echo $row['serial_no'];?>"><?php echo($serial_no = $row['serial_no']) ?></td> <!-- x_val + serial_no is needed to make each id unique or it will fail -->
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
			$query = 'SELECT serial_no FROM network WHERE serial_no NOT IN (SELECT serial_no FROM network_maintenance)';
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
$(document).ready( function () //initalise network data table
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

$(document).ready( function () //initalise network vlan data table
		{
	   		var table = $('#vlans').DataTable({
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
	if (seltab) 
	{
 		document.getElementById("Btn" + seltab).click();
	} 
	else 
	{
  		document.getElementById("Btnnetwork_vlan").click();
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