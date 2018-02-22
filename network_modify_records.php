<?php

//******** Network table modify records ****************************

include 'dbconnection.php';

if(isset($_POST['edit_row']))
{
    $serial_no = $_POST['id'];
    $vendor = $_POST['vendor_val'];
    $model_no = $_POST['model_no_val'];
    $type = $_POST['type_val'];
    $purchase_date = $_POST['purchase_date_val'];
    $misc_info = $_POST['misc_info_val'];
    $u_size = $_POST['u_size_val'];
    $po_number = $_POST['po_number_val'];
    
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
    
        $query = $db->query("UPDATE network SET vendor='$vendor',model_no='$model_no',type='$type',purchase_date=IF('$purchase_date'='',NULL,'$purchase_date'),misc_info = '$misc_info', u_size = $u_size,
        po_number = '$po_number' where serial_no='$serial_no'");
         
    if ($db->rowCount() > 0)
    {
        return "success";
    } else 
    {
        return $error = "Error: " . $db->error;
    }
    
    $db->close(); 
    
}

if(isset($_POST['delete_row']))
{
    $serial_no = $_POST['row_id'];
    $query = $db->query("DELETE FROM network WHERE serial_no='$serial_no'");
    $query2 = $db->query("DELETE FROM network_usage WHERE serial_no='$serial_no'");
    $query3 = $db->query("DELETE FROM network_maintenance WHERE serial_no='$serial_no'");
    
    echo "success";
    $db->close(); 
}

if(isset($_POST['insert_row']))
{   
    $serial_no = $_POST['id']; // retrieve value from form and santise input against SQL injection
    $vendor = $_POST['vendor_val'];
    $model_no = $_POST['model_no_val'];
    $type = $_POST['type_val'];
    $purchase_date = $_POST["purchase_date_val"];
    $memory = $_POST['memory_val'];
    $misc_info = $_POST['misc_info_val'];
    $u_size = $_POST['u_size_val'];
    $po_number = $_POST['po_number_val'];
 
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
    
        $insert = $db->query("INSERT INTO network (serial_no, vendor, model_no, type, purchase_date, misc_info, u_size, po_number)
        VALUES ('$serial_no','$vendor','$model_no', '$type', IF('$purchase_date'='',NULL,'$purchase_date'), '$misc_info', $u_size, '$po_number')");
    
    if($insert)
    {
        echo "Success"; //serial_no returned so input fields can be named as per the others in the dataTables
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
   
}

//******** Network VLAN table modify records ****************************

if(isset($_POST['edit_row_vlan']))
{
    $vlan = $_POST['vlan_val'];
    $description = $_POST['description_val'];
    $site = $_POST['site_val'];
    $project = $_POST['project_val'];
    $ip_range = $_POST['ip_range_val'];
    $subnet = $_POST['subnet_val'];
    $gateway = $_POST['gateway_val'];
    
    $query = $db->query("UPDATE network_vlan SET site='$site',description='$description', project='$project', ip_range='$ip_range', subnet='$subnet', gateway ='$gateway'
       where vlan='$vlan'"); // if dates are empty, must be converted to NULL for INSERT

    if ($db->rowCount() > 0)
    {
        return "success";
    } else
    {
        return $error = "Error: " . $db->error;
    }
    
    $db->close();   
}

if(isset($_POST['delete_row_vlan']))
{
    $vlan = $_POST['row_id'];
    $query = $db->query("DELETE FROM network_vlan WHERE vlan='$vlan'");
    
    echo "success";
    $db->close();
}

if(isset($_POST['insert_row_vlan']))
{
    $vlan = $_POST['vlan_val'];
    $description = $_POST['description_val'];
    $site = $_POST['site_val'];
    $project = $_POST['project_val'];
    $ip_range = $_POST['ip_range_val'];
    $subnet = $_POST['subnet_val'];
    $gateway = $_POST['gateway_val'];
    
    $insert = $db->query("INSERT INTO network_vlan (vlan, description, site, project, ip_range, subnet, gateway)
        VALUES ('$vlan','$description','$site', '$project', '$ip_range', '$subnet', '$gateway')");
    
    if($insert)
    {
        echo $vlan; //serial_no returned so input fields can be named as per the others in the dataTables
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
    
}

//********************** network maintenance modify records *******************************************

if(isset($_POST['edit_row_main']))
{
    $serial_no = $_POST['id'];
    $company = $_POST['company_val'];
    $reference = $_POST['reference_val'];
    $start_date = $_POST['start_date_val'];
    $end_date = $_POST['end_date_val'];
    
    $query = $db->query("UPDATE network_maintenance SET company='$company',reference='$reference',start_date=IF('$start_date'='',NULL,'$start_date'),end_date=IF('$end_date'='',NULL,'$end_date')
       where serial_no='$serial_no'"); // if dates are empty, must be converted to NULL for INSERT
    
    if ($db->rowCount() > 0)
    {
        return "success";
    } else
    {
        return $error = "Error: " . $db->error;
    }
    
    $db->close();
}

if(isset($_POST['delete_row_main']))
{
    $serial_no = $_POST['row_id'];
    $query = $db->query("DELETE FROM network_maintenance WHERE serial_no='$serial_no'");
    
    echo "success";
    $db->close();
}

if(isset($_POST['insert_row_main']))
{
    $serial_no = $_POST['id'];
    $company = $_POST['company_val'];
    $reference = $_POST['reference_val'];
    $start_date = $_POST["start_date_val"];
    $end_date = $_POST['end_date_val'];
    
    $insert = $db->query("INSERT INTO network_maintenance (serial_no, company, reference, start_date, end_date)
        VALUES ('$serial_no','$company','$reference', IF('$start_date'='',NULL,'$start_date'), IF('$end_date'='',NULL,'$end_date'))");
    
    if($insert)
    {
        echo $serial_no; //serial_no returned so input fields can be named as per the others in the dataTables
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
    
}

?>