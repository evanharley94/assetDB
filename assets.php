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
			<li><a href="#" accesskey="3" title="">Networks</a></li>
			<li><a href="#" accesskey="4" title="">Hardware</a></li>
			<li><a href="#" accesskey="5" title="">Licenses</a></li>
			<li><a href="#" accesskey="6" title="">Reports</a></li>
			<li><a href="#" accesskey="7" title="">Search</a></li>
		</ul>
	</div>
</div>

<!-- The Modal for deployed assets -->
<div id="editDeployed" class="modal">

  <div class="modal-content" align= "center">
    <span class="close">&times;</span>
    <h2>Deployment Information</h2>
 
		<form action="updateDeployment.php" method="post">
			<table>
				<tr>
					<td align="left">Serial Number: *</td>
					<td align="left"><input type="text" value = "" name="serial_no" required/></td>
				</tr>
				<tr>
					<td align="left">Location:</td>
					<td align="left"><input type="text" value = "" name="location"/></td>
				</tr>
				<tr>
					<td align="left">Project:</td>
					<td align="left"><input type="text" value = "" name="project"/></td>
				</tr>
				<tr>
					<td><input type="submit" name="updateDeployment" value="Update" /></td>
					<td><input type="hidden" name="updateDeployment" value="TRUE" /></td>
				</tr>
			</table>
		</form>
		</div>
 </div>

<div id="featured-wrapper">
	<div id="featured" class="container2">
		<div class="major">
			<h2>Server Assets</h2>
		</div>
<div class="tab">
  <button class="tablinks" onclick="openTable(event, 'server')" id="defaultOpen">Server</button>
  <button class="tablinks" onclick="openTable(event, 'server_usage')">Server Usage</button>
  <button class="tablinks" onclick="openTable(event, 'software')">Software</button>
  <button class="tablinks" onclick="openTable(event, 'maintenance')">Maintenance</button>
</div>
		<div id="server" class="tabcontent">
		<table id="assets" class="display">
    <thead>
        <tr>
        	<th style="display:none;"></th>
            <th bgcolor="#ffffff">Serial Number</th>
            <th>Vendor</th>
            <th>Model</th>
            <th>Type</th>
            <th>Purchase Date</th>
            <th>Memory</th>
            <th>Processor Type</th>
            <th>Processors</th>
            <th>Cores</th>
            <th>Speed</th>
            <th>Information</th>
            <th>U Size</th>
            <th>PO Number</th>
            <th>Deployed</th>
            <th bgcolor ="#ffffff"></th> <!-- headings have a background colour of white as datatables fixed colum is transaparent so you can see text behind without it -->
            <th bgcolor ="#ffffff"></th>
            <th bgcolor ="#ffffff"></th>
        </tr>
    </thead>
    <tbody>
    
    	<?php 
		$query = 'SELECT serial_no, vendor,model_no,type,purchase_date,memory,proc_type,no_of_procs,proc_cores,proc_speed,misc_info,u_size,po_number,deployed FROM server';
		
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
            <td id="memory_val<?php echo $row['serial_no'];?>"><?php echo($row['memory']) ?></td>
            <td id="proc_type_val<?php echo $row['serial_no'];?>"><?php echo($row['proc_type']) ?></td>
            <td id="no_of_procs_val<?php echo $row['serial_no'];?>"><?php echo($row['no_of_procs']) ?></td>
            <td id="proc_cores_val<?php echo $row['serial_no'];?>"><?php echo($row['proc_cores']) ?></td>
            <td id="proc_speed_val<?php echo $row['serial_no'];?>"><?php echo($row['proc_speed']) ?></td>
            <td id="misc_info_val<?php echo $row['serial_no'];?>"><?php echo($row['misc_info']) ?></td>
            <td id="u_size_val<?php echo $row['serial_no'];?>"><?php echo($row['u_size']) ?></td>
            <td id="po_number_val<?php echo $row['serial_no'];?>"><?php echo($row['po_number']) ?></td>
            <!-- if asset deployed show yes for modal pop out, else no for modal pop out to add deployed information -->
            <td><?php if (($row['deployed']) == "Y") {?> <button id="<?php echo $serial_no;?>">Yes</button> <?php }  else { ?> <button id="<?php echo $serial_no;?>">No</button> <?php } ?></td>
      		<td><input type='button' class="material-icons" id="edit_button<?php echo $row['serial_no'];?>" value="edit" onclick="edit_row('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="save_button<?php echo $row['serial_no'];?>" value="save" onclick="save_row('<?php echo $row['serial_no'];?>');"/></td>
   			<td><input type='button' class="material-icons" id="delete_button<?php echo $row['serial_no'];?>" value="delete" onclick="delete_row('<?php echo $row['serial_no'];?>');"/></td>   
      </tr>
<script>

editModal('<?php echo $serial_no?>');

function editModal(serial_no)
{
	var modal = document.getElementById('editDeployed'); //get modal
	var button = document.getElementById(serial_no); // each Id must be unique or it fails
	var span = document.getElementsByClassName("close")[0]; 

	button.onclick = function()  // onclick open modal
	{
	    modal.style.display = "block";
	}

	span.onclick = function() //close modal when pressing exit
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
}
</script>
			<?php }?> 
		<!----------- Too insert new row -------------->	
        <tr id="new_row">
        	<td style="display:none;"></td> 
			<td><input type="text" id="new_id" style="width:100px"/></td>
			<td><input type="text" id="new_vendor" style="width:100px"/></td>
 			<td><input type="text" id="new_model" style="width:100px"/></td>
			<td><input type="text" id="new_type" style="width:100px"/></td>
			<td><input type="date" id="new_purchase_date" style="width:130px"/></td>
			<td><input type="text" id="new_memory" style="width:100px"/></td>
			<td><input type="text" id="new_proc_type" style="width:100px"/></td>
			<td><input type="number" id="new_no_of_procs" style="width:100px"/></td>
			<td><input type="number" id="new_proc_cores" style="width:100px"/></td>
			<td><input type="text" id="new_proc_speed" style="width:100px"/></td>
			<td><input type="text" id="new_misc_info" style="width:100px"/></td>
			<td><input type="number" id="new_u_size" style="width:100px"/></td>
			<td><input type="text" id="new_po_number" style="width:100px"/></td>
			<td><input type="text" id="new_deployed" style="width:50px"/></td>
			<td><input type="button" class="material-icons" value="add" onclick="insert_row(document.getElementById('new_id').value);"/></td>
			<td></td>
			<td></td>
		</tr> 			

    </tbody>
</table>
</div>
		</div>
</div>

<script>
$(document).ready( function () //initalise data table
	{
   		var table = $('#assets').DataTable({
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

//***************************************************
// Tab options JS 

function openTable(evt, tableName) {
   
    var i, tabcontent, tablinks;

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

document.getElementById("defaultOpen").click(); // open default tab servers

//**************************************
// edit table and save to DB using ajax

function edit_row(serial_no)
{
	
 var vendor = document.getElementById("vendor_val"+serial_no).innerHTML; //get current value of field
 var model_no = document.getElementById("model_no_val"+serial_no).innerHTML;
 var type = document.getElementById("type_val"+serial_no).innerHTML;
 var purchase_date = document.getElementById("purchase_date_val"+serial_no).innerHTML;
 var memory = document.getElementById("memory_val"+serial_no).innerHTML;
 var proc_type = document.getElementById("proc_type_val"+serial_no).innerHTML;
 var no_of_procs = document.getElementById("no_of_procs_val"+serial_no).innerHTML;
 var proc_cores = document.getElementById("proc_cores_val"+serial_no).innerHTML;
 var proc_speed = document.getElementById("proc_speed_val"+serial_no).innerHTML;
 var misc_info = document.getElementById("misc_info_val"+serial_no).innerHTML;
 var u_size = document.getElementById("u_size_val"+serial_no).innerHTML;
 var po_number = document.getElementById("po_number_val"+serial_no).innerHTML;

 document.getElementById("vendor_val"+serial_no).innerHTML = "<input type='text' id='vendor_text"+serial_no+"' value='"+vendor+"' style='width:100px'>"; //input current value into edit field
 document.getElementById("model_no_val"+serial_no).innerHTML = "<input type='text' id='model_text"+serial_no+"' value='"+model_no+"' style='width:100px'>";
 document.getElementById("type_val"+serial_no).innerHTML = "<input type='text' id='type_text"+serial_no+"' value='"+type+"' style='width:100px'>";
 document.getElementById("purchase_date_val"+serial_no).innerHTML = "<input type='date' id='purchase_date_text"+serial_no+"' value='"+purchase_date+"' style='width:130px'>";
 document.getElementById("memory_val"+serial_no).innerHTML = "<input type='text' id='memory_text"+serial_no+"' value='"+memory+"' style='width:100px'>";
 document.getElementById("proc_type_val"+serial_no).innerHTML = "<input type='text' id='proc_type_text"+serial_no+"' value='"+proc_type+"' style='width:100px'>";
 document.getElementById("no_of_procs_val"+serial_no).innerHTML = "<input type='number' id='no_of_procs_text"+serial_no+"' value='"+no_of_procs+"' style='width:100px'>";
 document.getElementById("proc_cores_val"+serial_no).innerHTML = "<input type='number' id='proc_cores_text"+serial_no+"' value='"+proc_cores+"' style='width:100px'>";
 document.getElementById("proc_speed_val"+serial_no).innerHTML = "<input type='text' id='proc_speed_text"+serial_no+"' value='"+proc_speed+"' style='width:100px'>";
 document.getElementById("misc_info_val"+serial_no).innerHTML = "<input type='text' id='misc_info_text"+serial_no+"' value='"+misc_info+"' style='width:100px'>";
 document.getElementById("u_size_val"+serial_no).innerHTML = "<input type='number' id='u_size_text"+serial_no+"' value='"+u_size+"' style='width:100px'>";
 document.getElementById("po_number_val"+serial_no).innerHTML = "<input type='text' id='po_number_text"+serial_no+"' value='"+po_number+"' style='width:100px'>";
	
 document.getElementById("edit_button"+serial_no).style.display = "none"; //hide edit button as already editing row
 document.getElementById("save_button"+serial_no).style.display = "block"; // show save button
 
}

function save_row(serial_no)
{
 var vendor = document.getElementById("vendor_text"+serial_no).value; // equals new edited value
 var model_no = document.getElementById("model_text"+serial_no).value;
 var type = document.getElementById("type_text"+serial_no).value;
 var purchase_date = document.getElementById("purchase_date_text"+serial_no).value;
 var memory = document.getElementById("memory_text"+serial_no).value;
 var proc_type = document.getElementById("proc_type_text"+serial_no).value;
 var no_of_procs = document.getElementById("no_of_procs_text"+serial_no).value;
 var proc_cores = document.getElementById("proc_cores_text"+serial_no).value;
 var proc_speed = document.getElementById("proc_speed_text"+serial_no).value;
 var misc_info = document.getElementById("misc_info_text"+serial_no).value;
 var u_size = document.getElementById("u_size_text"+serial_no).value;
 var po_number = document.getElementById("po_number_text"+serial_no).value;
  

	
 $.ajax //ajax to post values to update DB
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   edit_row:'edit_row',
   id:serial_no,
   vendor_val:vendor,
   model_no_val:model_no,
   type_val:type,
   purchase_date_val:purchase_date,
   memory_val:memory,
   proc_type_val:proc_type,
   no_of_procs_val:no_of_procs,
   proc_cores_val:proc_cores,
   proc_speed_val:proc_speed,
   misc_info_val:misc_info,
   u_size_val:u_size,
   po_number_val:po_number,
  },
  success:function(response) 
  {
	  if(response="success") //if return value from SQL Update query is success
	  {

    document.getElementById("vendor_val"+serial_no).innerHTML = vendor; //print the new value back on the page
    document.getElementById("model_no_val"+serial_no).innerHTML = model_no;
    document.getElementById("type_val"+serial_no).innerHTML = type;
    document.getElementById("purchase_date_val"+serial_no).innerHTML = purchase_date;
    document.getElementById("memory_val"+serial_no).innerHTML = memory;
    document.getElementById("proc_type_val"+serial_no).innerHTML = proc_type;
    document.getElementById("no_of_procs_val"+serial_no).innerHTML = no_of_procs;
    document.getElementById("proc_cores_val"+serial_no).innerHTML = proc_cores;
    document.getElementById("proc_speed_val"+serial_no).innerHTML = proc_speed;
    document.getElementById("misc_info_val"+serial_no).innerHTML = misc_info;
    document.getElementById("u_size_val"+serial_no).innerHTML = u_size;
    document.getElementById("po_number_val"+serial_no).innerHTML = po_number;
    document.getElementById("edit_button"+serial_no).style.display = "block"; // make edit button re-appear
	  } 
   }
 });
}

function delete_row(serial_no)
{
	var x = confirm("Are you sure you want to delete? All Maintenance, Warranty, useage & software records will also be removed for this asset!"); //if user confirms delete, then delete
    if (x){

 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   delete_row:'delete_row',
   row_id:serial_no,
  },
  success:function(response) {
   if(response="success")
   {
    var row = document.getElementById("row"+serial_no);
    row.parentNode.removeChild(row);
   }
  }
 });
 window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after deleting.
}}

function insert_row(serial_no)
{
	var vendor = document.getElementById("new_vendor").value;
	var model_no = document.getElementById("new_model").value;
	var type = document.getElementById("new_type").value;
	var memory = document.getElementById("new_memory").value;
	var proc_type = document.getElementById("new_proc_type").value;
	var no_of_procs = document.getElementById("new_no_of_procs").value;
	var proc_cores = document.getElementById("new_proc_cores").value;
	var proc_speed = document.getElementById("new_proc_speed").value;
	var misc_info = document.getElementById("new_misc_info").value;
	var u_size = document.getElementById("new_u_size").value;
	var po_number = document.getElementById("new_po_number").value;
	var deployed = document.getElementById("new_deployed").value;
	var purchase_date = document.getElementById("new_purchase_date").value;
	
	
 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   insert_row:'insert_row',
   id:serial_no,
   vendor_val:vendor,
   model_no_val:model_no,
   type_val:type,
   memory_val:memory,
   proc_type_val:proc_type,
   no_of_procs_val:no_of_procs,
   proc_cores_val:proc_cores,
   proc_speed_val:proc_speed,
   misc_info_val:misc_info,
   u_size_val:u_size,
   po_number_val:po_number,
   deployed_val:deployed,
   purchase_date_val:purchase_date,
  },
  success:function(response) 
  {
   if(response=="Success")
   {
	   window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after inserting new row.
   }
  },
 });
}

</script>

<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>