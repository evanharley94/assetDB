<?php include 'checkIfLoggedIn.php';

if (isset($_POST['addServer'])) //if addServer form is submitted
{
	require_once ('dbconnection.php');  //connect to the db

	$serial_no = $db->quote($_POST["serial_no"]); // retrieve value from add server form and santise input against SQL injection
	$vendor = $db->quote($_POST["vendor"]);
	$model_no = $db->quote($_POST["model_no"]);
	$type = $db->quote($_POST["type"]);
	$purchase_date = $_POST["purchase_date"];
	$memory = $db->quote($_POST["memory"]);
	$proc_type = $db->quote($_POST["proc_type"]);
	$no_of_procs = filter_var(($_POST["no_of_procs"]), FILTER_SANITIZE_NUMBER_INT); //santise INT of any non numerical characters
	$proc_cores = filter_var(($_POST["proc_cores"]), FILTER_SANITIZE_NUMBER_INT);
	$proc_speed = $db->quote($_POST["proc_speed"]);
	$misc_info = $db->quote($_POST["misc_info"]);
	$u_size = filter_var(($_POST["u_size"]), FILTER_SANITIZE_NUMBER_INT);
	$po_number = $db->quote($_POST["po_number"]);
	$deployed = $db->quote($_POST["deployed"]);
	
	//Handles int values been turned into empty strings from form post which won't insert into INT database field unless NULL
	if(empty($no_of_procs))
	{
		$no_of_procs = 'NULL';
	}
	
	
	if(empty($proc_cores))
	{
		$proc_cores = 'NULL';
	}
	
	if(empty($u_size))
	{
		$u_size = 'NULL';
	}
	
	if(empty($purchase_date))
	{
	    $insert = $db->query("INSERT INTO server (serial_no, vendor, model_no, type, purchase_date, memory, proc_type, no_of_procs, proc_cores, proc_speed, misc_info, u_size, po_number, deployed)
			VALUES ($serial_no,$vendor,$model_no, $type, NULL, $memory, $proc_type, $no_of_procs, $proc_cores, $proc_speed,
			$misc_info, $u_size, $po_number, $deployed)");
	}
	
	else
	{
	
	$insert = $db->query("INSERT INTO server (serial_no, vendor, model_no, type, purchase_date, memory, proc_type, no_of_procs, proc_cores, proc_speed, misc_info, u_size, po_number, deployed) 
			VALUES ($serial_no,$vendor,$model_no, $type, '$purchase_date', $memory, $proc_type, $no_of_procs, $proc_cores, $proc_speed,
			$misc_info, $u_size, $po_number, $deployed)");
	}
	
	if($insert) //if values are inserted redirect / else give error
	{
		header ("Location: assets.php");
	}
	
	else 
	{
		die("Error Message: ".mysql_error());
	}
	
}
	
?>