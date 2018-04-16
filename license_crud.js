//**************************************
// edit license table and save to DB using ajax

function edit_row_license(license_id)
{	
 var license = document.getElementById("license_val"+license_id).innerHTML; //get current value of field
 var quantity = document.getElementById("quantity_val"+license_id).innerHTML;
 var description = document.getElementById("description_val"+license_id).innerHTML;
 var purchase_date = document.getElementById("purchase_date_val"+license_id).innerHTML;
 var m_date = document.getElementById("m_date_val"+license_id).innerHTML;
 var po_number = document.getElementById("po_number_val"+license_id).innerHTML;
 var supplier = document.getElementById("supplier_val"+license_id).innerHTML;
 var cost = document.getElementById("cost_val"+license_id).innerHTML;
 var renewal_info = document.getElementById("renewal_info_val"+license_id).innerHTML;

// document.getElementById("license_val"+license_id).innerHTML = "<input type='text' id='license_text"+license_id+"' value='"+license+"' style='width:150px'>"; //input current value into edit field
 document.getElementById("quantity_val"+license_id).innerHTML = "<input type='number' id='quantity_text"+license_id+"' value='"+quantity+"' style='width:100px'>";
 document.getElementById("description_val"+license_id).innerHTML = "<input type='text' id='description_text"+license_id+"' value='"+description+"' style='width:150px'>";
 document.getElementById("purchase_date_val"+license_id).innerHTML = "<input type='date' id='purchase_date_text"+license_id+"' value='"+purchase_date+"' style='width:130px'>";
 document.getElementById("m_date_val"+license_id).innerHTML = "<input type='date' id='m_date_text"+license_id+"' value='"+m_date+"' style='width:130px'>";
 document.getElementById("po_number_val"+license_id).innerHTML = "<input type='text' id='po_number_text"+license_id+"' value='"+po_number+"' style='width:100px'>";
 document.getElementById("supplier_val"+license_id).innerHTML = "<input type='text' id='supplier_text"+license_id+"' value='"+supplier+"' style='width:100px'>";
 document.getElementById("cost_val"+license_id).innerHTML = "<input type='text' id='cost_text"+license_id+"' value='"+cost+"' style='width:120px'>";
 document.getElementById("renewal_info_val"+license_id).innerHTML = "<input type='text' id='renewal_info_text"+license_id+"' value='"+renewal_info+"' style='width:160px'>";
	
 document.getElementById("edit_button"+license_id).style.display = "none"; //hide edit button as already editing row
 document.getElementById("save_button"+license_id).style.display = "block"; // show save button
 
 
}

function save_row_license(license_id)
{
 
// var license = document.getElementById("license_text"+license_id).value;
 var quantity = document.getElementById("quantity_text"+license_id).value;
 var description = document.getElementById("description_text"+license_id).value;
 var purchase_date = document.getElementById("purchase_date_text"+license_id).value;
 var m_date = document.getElementById("m_date_text"+license_id).value;
 var po_number = document.getElementById("po_number_text"+license_id).value;
 var supplier = document.getElementById("supplier_text"+license_id).value;
 var cost = document.getElementById("cost_text"+license_id).value;
 var renewal_info = document.getElementById("renewal_info_text"+license_id).value;
 
	if (quantity <= 0)
	{
		alert("License quantity can not be 0 or less!")
	}
	
	else
		{
 
 $.ajax //ajax to post values to update DB
 ({
  type:'post',
  url:'license_modify_records.php',
  data:{
   edit_row:'edit_row',
   id:license_id,
//   license:license,
   quantity:quantity,
   description:description,
   purchase_date:purchase_date,
   m_date:m_date,
   po_number:po_number,
   supplier:supplier,
   cost:cost,
   renewal_info:renewal_info,
  },
  success:function(response) 
  {
	  if(response="success") //if return value from SQL Update query is success
	  {

//    document.getElementById("license_val"+license_id).innerHTML = license; //print the new value back on the page
    document.getElementById("quantity_val"+license_id).innerHTML = quantity;
    document.getElementById("description_val"+license_id).innerHTML = description;
    document.getElementById("purchase_date_val"+license_id).innerHTML = purchase_date;
    document.getElementById("m_date_val"+license_id).innerHTML = m_date;
    document.getElementById("po_number_val"+license_id).innerHTML = po_number;
    document.getElementById("supplier_val"+license_id).innerHTML = supplier;
    document.getElementById("cost_val"+license_id).innerHTML = cost;
    document.getElementById("renewal_info_val"+license_id).innerHTML = renewal_info;
    document.getElementById("edit_button"+license_id).style.display = "block"; // make edit button re-appear
	  } 
   }
 });
		}
}

function delete_row_license(license_id)
{
	var x = confirm("Are you sure you want to delete? All Maintenance, Warranty, useage & software records will also be removed for this asset!"); //if user confirms delete, then delete
    if (x){

 $.ajax
 ({
  type:'post',
  url:'license_modify_records.php',
  data:{
   delete_row:'delete_row',
   row_id:license_id,
  },
  success:function(response) {
   if(response="success")
   {
    var row = document.getElementById("row"+license_id);
    row.parentNode.removeChild(row);
   }
  }
 });
 window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after deleting.
}}

function insert_row_license()
{	
	 var license = document.getElementById("new_license").value;
	 var quantity = document.getElementById("new_quantity").value;
	 var description = document.getElementById("new_description").value;
	 var purchase_date = document.getElementById("new_purchase_date").value;
	 var m_date = document.getElementById("new_m_date").value;
	 var po_number = document.getElementById("new_po_number").value;
	 var supplier = document.getElementById("new_supplier").value;
	 var cost = document.getElementById("new_cost").value;
	 var renewal_info = document.getElementById("new_renewal_info").value;
	 
		if (quantity <= 0)
		{
			alert("License quantity can not be 0 or less!")
		}
		
		else
			{
	 
 $.ajax
 ({
  type:'post',
  url:'license_modify_records.php',
  data:{
   insert_row:'insert_row',
   license:license,
   quantity:quantity,
   description:description,
   purchase_date:purchase_date,
   m_date:m_date,
   po_number:po_number,
   supplier:supplier,
   cost:cost,
   renewal_info:renewal_info,
  },
  success:function(response) 
  {
   if(response="Success")
   {
	   window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after inserting new row.
   }
  },
 });}
}
//**************************************
//edit license usage and save to DB using ajax

function edit_row_license_usage(license_id)
{

 var hostname = document.getElementById("hostname_val"+license_id).innerHTML;
 var quantity = document.getElementById("quantity_val"+license_id).innerHTML;
 var start_date = document.getElementById("start_date_val"+license_id).innerHTML;
 var end_date = document.getElementById("end_date_val"+license_id).innerHTML;
 var project = document.getElementById("project_val"+license_id).innerHTML;
 var details = document.getElementById("details_val"+license_id).innerHTML;

 document.getElementById("hostname_val"+license_id).innerHTML = "<input type='text' id='hostname_text"+license_id+"' value='"+hostname+"' style='width:150px'>"; //input current value into edit field
 document.getElementById("quantity_val"+license_id).innerHTML = "<input type='number' id='quantity_text"+license_id+"' value='"+quantity+"' style='width:130px'>";
 document.getElementById("start_date_val"+license_id).innerHTML = "<input type='date' id='start_date_text"+license_id+"' value='"+start_date+"' style='width:130px'>";
 document.getElementById("end_date_val"+license_id).innerHTML = "<input type='date' id='end_date_text"+license_id+"' value='"+end_date+"' style='width:130px'>";
 document.getElementById("project_val"+license_id).innerHTML = "<input type='text' id='project_text"+license_id+"' value='"+project+"' style='width:100px'>";
 document.getElementById("details_val"+license_id).innerHTML = "<input type='text' id='details_text"+license_id+"' value='"+details+"' style='width:150px'>";
	
 document.getElementById("edit_button"+license_id).style.display = "none"; //hide edit button as already editing row
 document.getElementById("save_button"+license_id).style.display = "block"; // show save button
 
}

function save_row_license_usage(license_id)
{
 var hostname = document.getElementById("hostname_text"+license_id).value; // equals new edited value
 var quantity = document.getElementById("quantity_text"+license_id).value;
 var start_date = document.getElementById("start_date_text"+license_id).value;
 var end_date = document.getElementById("end_date_text"+license_id).value;
 var project = document.getElementById("project_text"+license_id).value;
 var details = document.getElementById("details_text"+license_id).value;
 
 if (quantity <= 0)
	{
		alert("License quantity can not be 0 or less!")
	}
	
	else
		{
 
 $.ajax //ajax to post values to update DB
 ({
  type:'post',
  url:'license_modify_records.php',
  data:{
   edit_row_usage:'edit_row_usage',
   license_id:license_id,
   hostname:hostname,
   quantity:quantity,
   start_date:start_date,
   end_date:end_date,
   project:project,
   details:details,
  },
  success:function(response) 
  {
	  if(response="success") //if return value from SQL Update query is success
	  {

    document.getElementById("hostname_val"+license_id).innerHTML = hostname; //print the new value back on the page
    document.getElementById("quantity_val"+license_id).innerHTML = quantity;
    document.getElementById("start_date_val"+license_id).innerHTML = start_date;
    document.getElementById("end_date_val"+license_id).innerHTML = end_date;
    document.getElementById("project_val"+license_id).innerHTML = project;
    document.getElementById("details_val"+license_id).innerHTML = details;
    document.getElementById("edit_button"+license_id).style.display = "block"; // make edit button re-appear
	  } 
   }
 });}
}

function delete_row_license_usage(license_id)
{
	var x = confirm("Are you sure you want to delete?"); //if user confirms delete, then delete
    if (x){

 $.ajax
 ({
  type:'post',
  url:'license_modify_records.php',
  data:{
   delete_row_license_usage:'delete_row_license_usage',
   row_id:license_id,
  },
  success:function(response) {
   if(response="success")
   {
    var row = document.getElementById("row"+license_id);
    row.parentNode.removeChild(row);
   }
  }
 });
 window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after deleting.
}}

function insert_row_license_usage()
{
     var license = document.getElementById("new_use_license").value;
	 var hostname = document.getElementById("new_use_hostname").value;
	 var quantity = document.getElementById("new_use_quantity").value; // equals new edited value
	 var start_date = document.getElementById("new_use_start_date").value;
	 var end_date = document.getElementById("new_use_end_date").value;
	 var project = document.getElementById("new_use_project").value;
	 var details = document.getElementById("new_use_details").value;
	 
	 if (quantity <= 0)
		{
			alert("License quantity can not be 0 or less!")
		}
		
		else
			{
	 
	
 $.ajax
 ({
  type:'post',
  url:'license_modify_records.php',
  data:{
   insert_row_usage:'insert_row_usage',
   license:license,
   hostname:hostname,
   quantity:quantity,
   start_date:start_date,
   end_date:end_date,
   project:project,
   details:details,
  },
  success:function(response) 
  {
   if(response!="") //insert new row into table without page refresh and reset new row line to empty
   {  
	    window.location.reload(true); //page must be re-loaded due to fixed columns not displaying correctly after inserting new row.
   }
  },
 });}
}

