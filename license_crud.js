//**************************************
// edit license table and save to DB using ajax

function edit_row_license(license_id)
{	
 var vendor = document.getElementById("vendor_val"+serial_no).innerHTML; //get current value of field
 var model_no = document.getElementById("model_no_val"+serial_no).innerHTML;
 var type = document.getElementById("type_val"+serial_no).innerHTML;
 var purchase_date = document.getElementById("purchase_date_val"+serial_no).innerHTML;
 var misc_info = document.getElementById("misc_info_val"+serial_no).innerHTML;
 var u_size = document.getElementById("u_size_val"+serial_no).innerHTML;
 var po_number = document.getElementById("po_number_val"+serial_no).innerHTML;

 document.getElementById("vendor_val"+serial_no).innerHTML = "<input type='text' id='vendor_text"+serial_no+"' value='"+vendor+"' style='width:100px'>"; //input current value into edit field
 document.getElementById("model_no_val"+serial_no).innerHTML = "<input type='text' id='model_text"+serial_no+"' value='"+model_no+"' style='width:100px'>";
 document.getElementById("type_val"+serial_no).innerHTML = "<input type='text' id='type_text"+serial_no+"' value='"+type+"' style='width:100px'>";
 document.getElementById("purchase_date_val"+serial_no).innerHTML = "<input type='date' id='purchase_date_text"+serial_no+"' value='"+purchase_date+"' style='width:130px'>";
 document.getElementById("misc_info_val"+serial_no).innerHTML = "<input type='text' id='misc_info_text"+serial_no+"' value='"+misc_info+"' style='width:100px'>";
 document.getElementById("u_size_val"+serial_no).innerHTML = "<input type='number' id='u_size_text"+serial_no+"' value='"+u_size+"' style='width:100px'>";
 document.getElementById("po_number_val"+serial_no).innerHTML = "<input type='text' id='po_number_text"+serial_no+"' value='"+po_number+"' style='width:100px'>";
	
 document.getElementById("edit_button"+serial_no).style.display = "none"; //hide edit button as already editing row
 document.getElementById("save_button"+serial_no).style.display = "block"; // show save button
}

function save_row_license(license_id)
{
 var vendor = document.getElementById("vendor_text"+serial_no).value; // equals new edited value
 var model_no = document.getElementById("model_text"+serial_no).value;
 var type = document.getElementById("type_text"+serial_no).value;
 var purchase_date = document.getElementById("purchase_date_text"+serial_no).value;
 var misc_info = document.getElementById("misc_info_text"+serial_no).value;
 var u_size = document.getElementById("u_size_text"+serial_no).value;
 var po_number = document.getElementById("po_number_text"+serial_no).value;
 
 $.ajax //ajax to post values to update DB
 ({
  type:'post',
  url:'network_modify_records.php',
  data:{
   edit_row:'edit_row',
   id:serial_no,
   vendor_val:vendor,
   model_no_val:model_no,
   type_val:type,
   purchase_date_val:purchase_date,
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
    document.getElementById("misc_info_val"+serial_no).innerHTML = misc_info;
    document.getElementById("u_size_val"+serial_no).innerHTML = u_size;
    document.getElementById("po_number_val"+serial_no).innerHTML = po_number;
    document.getElementById("edit_button"+serial_no).style.display = "block"; // make edit button re-appear
	  } 
   }
 });
}

function delete_row_license(license_id)
{
	var x = confirm("Are you sure you want to delete? All Maintenance, Warranty, useage & software records will also be removed for this asset!"); //if user confirms delete, then delete
    if (x){

 $.ajax
 ({
  type:'post',
  url:'network_modify_records.php',
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
	var misc_info = document.getElementById("new_misc_info").value;
	var u_size = document.getElementById("new_u_size").value;
	var po_number = document.getElementById("new_po_number").value;
	var purchase_date = document.getElementById("new_purchase_date").value;
	
 $.ajax
 ({
  type:'post',
  url:'network_modify_records.php',
  data:{
   insert_row:'insert_row',
   id:serial_no,
   vendor_val:vendor,
   model_no_val:model_no,
   type_val:type,
   misc_info_val:misc_info,
   u_size_val:u_size,
   po_number_val:po_number,
   purchase_date_val:purchase_date,
  },
  success:function(response) 
  {
   if(response="Success")
   {
	   window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after inserting new row.
   }
  },
 });
}
//**************************************
//edit network table VLAN and save to DB using ajax

function edit_row_license_usage(license_id)
{

 var site = document.getElementById("site_val"+vlan).innerHTML; //get current value of field
 var description = document.getElementById("description_val"+vlan).innerHTML;
 var project = document.getElementById("project_val"+vlan).innerHTML;
 var ip_range = document.getElementById("ip_range_val"+vlan).innerHTML;
 var subnet = document.getElementById("subnet_val"+vlan).innerHTML;
 var gateway = document.getElementById("gateway_val"+vlan).innerHTML;

 document.getElementById("site_val"+vlan).innerHTML = "<input type='text' id='site_text"+vlan+"' value='"+site+"' style='width:100px'>"; //input current value into edit field
 document.getElementById("description_val"+vlan).innerHTML = "<input type='text' id='description_text"+vlan+"' value='"+description+"' style='width:150px'>";
 document.getElementById("project_val"+vlan).innerHTML = "<input type='text' id='project_text"+vlan+"' value='"+project+"' style='width:100px'>";
 document.getElementById("ip_range_val"+vlan).innerHTML = "<input type='text' id='ip_range_text"+vlan+"' value='"+ip_range+"' style='width:150px'>";
 document.getElementById("subnet_val"+vlan).innerHTML = "<input type='text' id='subnet_text"+vlan+"' value='"+subnet+"' style='width:120px'>";
 document.getElementById("gateway_val"+vlan).innerHTML = "<input type='text' id='gateway_text"+vlan+"' value='"+gateway+"' style='width:120px'>";
	
 document.getElementById("edit_button"+vlan).style.display = "none"; //hide edit button as already editing row
 document.getElementById("save_button"+vlan).style.display = "block"; // show save button
 
}

function save_row_license_usage(license_id)
{
 var site = document.getElementById("site_text"+vlan).value; // equals new edited value
 var description = document.getElementById("description_text"+vlan).value;
 var project = document.getElementById("project_text"+vlan).value;
 var ip_range = document.getElementById("ip_range_text"+vlan).value;
 var subnet = document.getElementById("subnet_text"+vlan).value;
 var gateway = document.getElementById("gateway_text"+vlan).value;
 
 $.ajax //ajax to post values to update DB
 ({
  type:'post',
  url:'network_modify_records.php',
  data:{
   edit_row_vlan:'edit_row_vlan',
   vlan_val:vlan,
   description_val:description,
   site_val:site,
   project_val:project,
   ip_range_val:ip_range,
   subnet_val:subnet,
   gateway_val:gateway
  },
  success:function(response) 
  {
	  if(response="success") //if return value from SQL Update query is success
	  {

    document.getElementById("site_val"+vlan).innerHTML = site; //print the new value back on the page
    document.getElementById("description_val"+vlan).innerHTML = description;
    document.getElementById("project_val"+vlan).innerHTML = project;
    document.getElementById("ip_range_val"+vlan).innerHTML = ip_range;
    document.getElementById("subnet_val"+vlan).innerHTML = subnet;
    document.getElementById("gateway_val"+vlan).innerHTML = gateway;
    document.getElementById("edit_button"+vlan).style.display = "block"; // make edit button re-appear
	  } 
   }
 });
}

function delete_row_license_usage(license_id)
{
	var x = confirm("Are you sure you want to delete?"); //if user confirms delete, then delete
    if (x){

 $.ajax
 ({
  type:'post',
  url:'network_modify_records.php',
  data:{
   delete_row_vlan:'delete_row_vlan',
   row_id:vlan,
  },
  success:function(response) {
   if(response="success")
   {
    var row = document.getElementById("row"+vlan);
    row.parentNode.removeChild(row);
   }
  }
 });
 window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after deleting.
}}

function insert_row_license_usage(license_id)
{
	 var vlan = document.getElementById("new_vlan").value;
	 var site = document.getElementById("new_site").value; // equals new edited value
	 var description = document.getElementById("new_description").value;
	 var project = document.getElementById("new_project").value;
	 var ip_range = document.getElementById("new_ip_range").value;
	 var subnet = document.getElementById("new_subnet").value;
	 var gateway = document.getElementById("new_gateway").value;
	
 $.ajax
 ({
  type:'post',
  url:'network_modify_records.php',
  data:{
   insert_row_vlan:'insert_row_vlan',
   vlan_val:vlan,
   site_val:site,
   description_val:description,
   ip_range_val:ip_range,
   project_val:project,
   subnet_val:subnet,
   gateway_val:gateway,
  },
  success:function(response) 
  {
   if(response!="") //insert new row into table without page refresh and reset new row line to empty
   {
	    var id = response;
	    var table = document.getElementById("vlans");
	    var table_len = (table.rows.length)-1;
	    var row = table.insertRow(table_len).outerHTML= "<tr class='table-tr' id='row"+id+"'>" +
        "<td id='vlan_val"+id+"'>"+vlan+"</td>" +
        "<td id='site_val"+id+"'>"+site+"</td>" + 
        "<td id='description_val"+id+"'>"+description+"</td>" +
        "<td id='project_val"+id+"'>"+project+"</td>" +
        "<td id='ip_range_val"+id+"'>"+ip_range+"</td>" +
        "<td id='subnet_val"+id+"'>"+subnet+"</td>" +
        "<td id='gateway_val"+id+"'>"+gateway+"</td>" +
  		"<td><input type='button' class='material-icons' id='edit_button"+id+"' value='edit' onclick='edit_row_vlan("+id+");'/></td>" +
		"<td><input type='button' class='material-icons' id='save_button"+id+"' value='save' onclick='save_row_vlan("+id+");'/></td>" +
		"<td><input type='button' class='material-icons' id='delete_button"+id+"' value='delete' onclick='delete_row_vlan("+id+");'/></td>"  +
		"</tr>"
		
	    document.getElementById("new_vlan").value="";
	    document.getElementById("new_site").value="";
	    document.getElementById("new_description").value="";
	    document.getElementById("new_project").value="";
	    document.getElementById("new_ip_range").value="";
	    document.getElementById("new_subnet").value="";
	    document.getElementById("new_gateway").value="";
	  
	    window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after inserting new row.
   }
  },
 });
}
