<?php

//******** Hardware table modify records ****************************

include 'dbconnection.php';

if(isset($_POST['edit_row']))
{
    $serial_no = $_POST['id'];
    $vendor = $_POST['vendor_val'];
    $model_no = $_POST['model_no_val'];
    $type = $_POST['type_val'];
    $purchase_date = $_POST['purchase_date_val'];
    $misc_info = $_POST['misc_info_val'];
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
    
        $query = $db->query("UPDATE hardware SET vendor='$vendor',model_no='$model_no',type='$type',purchase_date=IF('$purchase_date'='',NULL,'$purchase_date'),misc_info = '$misc_info',
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
    $query = $db->query("DELETE FROM hardware WHERE serial_no='$serial_no'");
    $query2 = $db->query("DELETE FROM hardware_usage WHERE serial_no='$serial_no'");
    $query3 = $db->query("DELETE FROM hardware_maintenance WHERE serial_no='$serial_no'");
    
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
    $po_number = $_POST['po_number_val'];
 
    if(empty($no_of_procs))
    {
        $no_of_procs = 'NULL';
    }
    
    if(empty($proc_cores))
    {
        $proc_cores = 'NULL';
    }
    
        $insert = $db->query("INSERT INTO hardware (serial_no, vendor, model_no, type, purchase_date, misc_info, po_number)
        VALUES ('$serial_no','$vendor','$model_no', '$type', IF('$purchase_date'='',NULL,'$purchase_date'), '$misc_info', '$po_number')");
    
    if($insert)
    {
        echo "Success"; //serial_no returned so input fields can be named as per the others in the dataTables
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
   
}

//******** hardware Usage table modify records ****************************

if(isset($_POST['edit_row_usage']))
{
    $serial_no = $_POST['id'];
    $hostname = $_POST['hostname_val'];
    $ip_address = $_POST['ip_address_val'];
    $project = $_POST['project_val'];
    $start_date = $_POST['start_date_val'];
    $expected_end_date = $_POST['expected_end_date_val'];
    $location = $_POST['location_val'];
    
    $query = $db->query("UPDATE hardware_usage SET hostname='$hostname',ip_address='$ip_address',project='$project',start_date=IF('$start_date'='',NULL,'$start_date'),expected_end_date=IF('$expected_end_date'='',NULL,'$expected_end_date'), location='$location'
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

if(isset($_POST['delete_row_usage']))
{
    $serial_no = $_POST['row_id'];
    $query = $db->query("DELETE FROM hardware_usage WHERE serial_no='$serial_no'");
    
    echo "success";
    $db->close();
}

if(isset($_POST['insert_row_usage']))
{
    $serial_no = $_POST['id'];
    $hostname = $_POST['hostname_val'];
    $ip_address = $_POST['ip_address_val'];
    $project = $_POST['project_val'];
    $start_date = $_POST["start_date_val"];
    $expected_end_date = $_POST['expected_end_date_val'];
    $location = $_POST['location_val'];
    
    $insert = $db->query("INSERT INTO hardware_usage (serial_no, hostname, ip_address, project, start_date, expected_end_date, location)
        VALUES ('$serial_no','$hostname','$ip_address', '$project', IF('$start_date'='',NULL,'$start_date'), IF('$expected_end_date'='',NULL,'$expected_end_date'), '$location')");
    
    if($insert)
    {
        echo $serial_no; //serial_no returned so input fields can be named as per the others in the dataTables
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
    
}

//********************** hardware maintenance modify records *******************************************

if(isset($_POST['edit_row_main']))
{
    $serial_no = $_POST['id'];
    $company = $_POST['company_val'];
    $reference = $_POST['reference_val'];
    $start_date = $_POST['start_date_val'];
    $end_date = $_POST['end_date_val'];
    
    $query = $db->query("UPDATE hardware_maintenance SET company='$company',reference='$reference',start_date=IF('$start_date'='',NULL,'$start_date'),end_date=IF('$end_date'='',NULL,'$end_date')
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
    $query = $db->query("DELETE FROM hardware_maintenance WHERE serial_no='$serial_no'");
    
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
    
    $insert = $db->query("INSERT INTO hardware_maintenance (serial_no, company, reference, start_date, end_date)
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