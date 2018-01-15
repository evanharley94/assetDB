//**************************************
// edit server table and save to DB using ajax

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
//**************************************
//edit server table usage and save to DB using ajax

function edit_row_usage(serial_no)
{
	
 var hostname = document.getElementById("hostname_val"+serial_no).innerHTML; //get current value of field
 var ip_address = document.getElementById("ip_address_val"+serial_no).innerHTML;
 var project = document.getElementById("project_val"+serial_no).innerHTML;
 var start_date = document.getElementById("start_date_val"+serial_no).innerHTML;
 var expected_end_date = document.getElementById("expected_end_date_val"+serial_no).innerHTML;
 var location = document.getElementById("location_val"+serial_no).innerHTML;

 document.getElementById("hostname_val"+serial_no).innerHTML = "<input type='text' id='hostname_text"+serial_no+"' value='"+hostname+"' style='width:130px'>"; //input current value into edit field
 document.getElementById("ip_address_val"+serial_no).innerHTML = "<input type='text' id='ip_address_text"+serial_no+"' value='"+ip_address+"' style='width:100px'>";
 document.getElementById("project_val"+serial_no).innerHTML = "<input type='text' id='project_text"+serial_no+"' value='"+project+"' style='width:100px'>";
 document.getElementById("start_date_val"+serial_no).innerHTML = "<input type='date' id='start_date_text"+serial_no+"' value='"+start_date+"' style='width:130px'>";
 document.getElementById("expected_end_date_val"+serial_no).innerHTML = "<input type='date' id='expected_end_date_text"+serial_no+"' value='"+expected_end_date+"' style='width:130px'>";
 document.getElementById("location_val"+serial_no).innerHTML = "<input type='text' id='location_text"+serial_no+"' value='"+location+"' style='width:100px'>";
	
 document.getElementById("edit_button"+serial_no).style.display = "none"; //hide edit button as already editing row
 document.getElementById("save_button"+serial_no).style.display = "block"; // show save button
 
}

function save_row_usage(serial_no)
{
 var hostname = document.getElementById("hostname_text"+serial_no).value; // equals new edited value
 var ip_address = document.getElementById("ip_address_text"+serial_no).value;
 var project = document.getElementById("project_text"+serial_no).value;
 var start_date = document.getElementById("start_date_text"+serial_no).value;
 var expected_end_date = document.getElementById("expected_end_date_text"+serial_no).value;
 var location = document.getElementById("location_text"+serial_no).value;
 
 $.ajax //ajax to post values to update DB
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   edit_row_usage:'edit_row_usage',
   id:serial_no,
   hostname_val:hostname,
   ip_address_val:ip_address,
   project_val:project,
   start_date_val:start_date,
   expected_end_date_val:expected_end_date,
   location_val:location
  },
  success:function(response) 
  {
	  if(response="success") //if return value from SQL Update query is success
	  {

    document.getElementById("hostname_val"+serial_no).innerHTML = hostname; //print the new value back on the page
    document.getElementById("ip_address_val"+serial_no).innerHTML = ip_address;
    document.getElementById("project_val"+serial_no).innerHTML = project;
    document.getElementById("start_date_val"+serial_no).innerHTML = start_date;
    document.getElementById("expected_end_date_val"+serial_no).innerHTML = expected_end_date;
    document.getElementById("location_val"+serial_no).innerHTML = location;
    document.getElementById("edit_button"+serial_no).style.display = "block"; // make edit button re-appear
	  } 
   }
 });
}

function delete_row_usage(serial_no)
{
	var x = confirm("Are you sure you want to delete?"); //if user confirms delete, then delete
    if (x){

 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   delete_row_usage:'delete_row_usage',
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

function insert_row_usage(serial_no)
{
	var hostname = document.getElementById("new_hostname").value;
	var ip_address = document.getElementById("new_ip_address").value;
	var project = document.getElementById("new_project").value;
	var start_date = document.getElementById("new_start_date").value;
	var expected_end_date = document.getElementById("new_expected_end_date").value;
	var location = document.getElementById("new_location").value;
	
 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   insert_row_usage:'insert_row_usage',
   id:serial_no,
   hostname_val:hostname,
   ip_address_val:ip_address,
   project_val:project,
   start_date_val:start_date,
   expected_end_date_val:expected_end_date,
   location_val:location,
  },
  success:function(response) 
  {
   if(response!="") //insert new row into table without page refresh and reset new row line to empty
   {
	    var id = response;
	    var table = document.getElementById("usage");
	    var table_len = (table.rows.length)-1;
	    var row = table.insertRow(table_len).outerHTML= "<tr class='table-tr' id='row"+id+"'>" +
        "<td id='serial_no_val"+id+"'>"+serial_no+"</td>" +
        "<td id='hostname_val"+id+"'>"+hostname+"</td>" + 
        "<td id='ip_address_val"+id+"'>"+ip_address+"</td>" +
        "<td id='project_val"+id+"'>"+project+"</td>" +
        "<td id='start_date_val"+id+"'>"+start_date+"</td>" +
        "<td id='expected_end_date_val"+id+"'>"+expected_end_date+"</td>" +
        "<td id='location_val"+id+"'>"+location+"</td>" +
  		"<td><input type='button' class='material-icons' id='edit_button"+id+"' value='edit' onclick='edit_row_usage("+id+");'/></td>" +
		"<td><input type='button' class='material-icons' id='save_button"+id+"' value='save' onclick='save_row_usage("+id+");'/></td>" +
		"<td><input type='button' class='material-icons' id='delete_button"+id+"' value='delete' onclick='delete_row_usage("+id+");'/></td>"  +
		"</tr>"
		
	    document.getElementById("new_hostname").value="";
	    document.getElementById("new_ip_address").value="";
	    document.getElementById("new_project").value="";
	    document.getElementById("new_start_date").value="";
	    document.getElementById("new_expected_end_date").value="";
	    document.getElementById("new_location").value="";
	  
	    window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after inserting new row.
   }
  },
 });
}

//*************************************************************
//edit maintenance table and save to DB using ajax

function edit_row_main(serial_no)
{
var company = document.getElementById("company_val"+serial_no).innerHTML; //get current value of field
var reference = document.getElementById("reference_val"+serial_no).innerHTML;
var start_date = document.getElementById("start_date_val"+serial_no).innerHTML;
var end_date = document.getElementById("end_date_val"+serial_no).innerHTML;

document.getElementById("company_val"+serial_no).innerHTML = "<input type='text' id='company_text"+serial_no+"' value='"+company+"' style='width:170px'>"; //input current value into edit field
document.getElementById("reference_val"+serial_no).innerHTML = "<input type='text' id='reference_text"+serial_no+"' value='"+reference+"' style='width:170px'>";
document.getElementById("start_date_val"+serial_no).innerHTML = "<input type='date' id='start_date_text"+serial_no+"' value='"+start_date+"' style='width:130px'>";
document.getElementById("end_date_val"+serial_no).innerHTML = "<input type='date' id='end_date_text"+serial_no+"' value='"+end_date+"' style='width:130px'>";

document.getElementById("edit_button"+serial_no).style.display = "none"; //hide edit button as already editing row
document.getElementById("save_button"+serial_no).style.display = "block"; // show save button

}

function save_row_main(serial_no)
{
 var company = document.getElementById("company_text"+serial_no).value; // equals new edited value
 var reference = document.getElementById("reference_text"+serial_no).value;
 var start_date = document.getElementById("start_date_text"+serial_no).value;
 var end_date = document.getElementById("end_date_text"+serial_no).value;
 
 $.ajax //ajax to post values to update DB
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   edit_row_main:'edit_row_main',
   id:serial_no,
   company_val:company,
   reference_val:reference,
   start_date_val:start_date,
   end_date_val:end_date,
  },
  success:function(response) 
  {
	  if(response="success") //if return value from SQL Update query is success
	  {

    document.getElementById("company_val"+serial_no).innerHTML = company; //print the new value back on the page
    document.getElementById("reference_val"+serial_no).innerHTML = reference;
    document.getElementById("start_date_val"+serial_no).innerHTML = start_date;
    document.getElementById("end_date_val"+serial_no).innerHTML = end_date;
    document.getElementById("edit_button"+serial_no).style.display = "block"; // make edit button re-appear
	  } 
   }
 });
}

function delete_row_main(serial_no)
{
	var x = confirm("Are you sure you want to delete?"); //if user confirms delete, then delete
    if (x){

 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   delete_row_main:'delete_row_main',
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

function insert_row_main(serial_no)
{
	var company = document.getElementById("new_company").value;
	var reference = document.getElementById("new_reference").value;
	var start_date = document.getElementById("main_start_date").value;
	var end_date = document.getElementById("new_end_date").value;
	
 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   insert_row_main:'insert_row_main',
   id:serial_no,
   company_val:company,
   reference_val:reference,
   start_date_val:start_date,
   end_date_val:end_date,
  },
  success:function(response) 
  {
   if(response!="") //insert new row into table without page refresh and reset new row line to empty
   {
	    var id = response;
	    var table = document.getElementById("m1");
	    var table_len = (table.rows.length)-1;
	    var row = table.insertRow(table_len).outerHTML= "<tr class='table-tr' id='row"+id+"'>" +
        "<td id='serial_no_val"+id+"'>"+serial_no+"</td>" +
        "<td id='company_val"+id+"'>"+company+"</td>" + 
        "<td id='reference_val"+id+"'>"+reference+"</td>" +
        "<td id='start_date_val"+id+"'>"+start_date+"</td>" +
        "<td id='end_date_val"+id+"'>"+end_date+"</td>" +
  		"<td><input type='button' class='material-icons' id='edit_button"+id+"' value='edit' onclick='edit_row_main("+id+");'/></td>" +
		"<td><input type='button' class='material-icons' id='save_button"+id+"' value='save' onclick='save_row_main("+id+");'/></td>" +
		"<td><input type='button' class='material-icons' id='delete_button"+id+"' value='delete' onclick='delete_row_main("+id+");'/></td>"  +
		"</tr>"
		
	    document.getElementById("new_company").value="";
	    document.getElementById("new_reference").value="";
	    document.getElementById("new_start_date").value="";
	    document.getElementById("new_end_date").value="";
	  
	   window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after inserting new row.
   }
  },
 });
}