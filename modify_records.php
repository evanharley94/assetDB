<?php

include 'dbconnection.php';

if(isset($_POST['edit_row']))
{
    $serial_no = $_POST['id'];
    $vendor = $_POST['vendor_val'];
    $model_no = $_POST['model_no_val'];
    $type = $_POST['type_val'];
    $purchase_date = $_POST['purchase_date_val'];
    $memory = $_POST['memory_val'];
    $proc_type = $_POST['proc_type_val'];
    $no_of_procs = $_POST['no_of_procs_val'];
    $proc_cores = $_POST['proc_cores_val'];
    $proc_speed = $_POST['proc_speed_val'];
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

    if(empty($purchase_date)) //purchase date doesn't seem to like value NULL when in a variable, so if/else used.
    {
        $query = $db->query("UPDATE server SET vendor='$vendor',model_no='$model_no',type='$type',purchase_date = NULL,memory='$memory',proc_type='$proc_type',
         no_of_procs = $no_of_procs, proc_cores = $proc_cores, proc_speed = '$proc_speed', misc_info = '$misc_info', u_size = $u_size,
        po_number = '$po_number' where serial_no='$serial_no'");
    }
    
    else
    {
        $query = $db->query("UPDATE server SET vendor='$vendor',model_no='$model_no',type='$type',purchase_date = '$purchase_date',memory='$memory',proc_type='$proc_type',
         no_of_procs = $no_of_procs, proc_cores = $proc_cores, proc_speed = '$proc_speed', misc_info = '$misc_info', u_size = $u_size,
        po_number = '$po_number' where serial_no='$serial_no'");
    }
    

        
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
    $query = $db->query("DELETE FROM server WHERE serial_no='$serial_no'");
    
    echo "success";
    $db->close(); 
}

if(isset($_POST['insert_row']))
{
    $serial_no = $_POST['id']; // retrieve value from form and santise input against SQL injection
    $vendor = $_POST['vendor_val'];
    $model_no = $_POST['model_no_val'];
    $type = $_POST['type_val'];
 //   $purchase_date = $_POST["purchase_date_val"];
    $memory = $_POST['memory_val'];
    $proc_type = $_POST['proc_type_val'];
    $no_of_procs = $_POST['no_of_procs_val'];
    $proc_cores = $_POST['proc_cores_val'];
    $proc_speed = $_POST['proc_speed_val'];
    $misc_info = $_POST['misc_info_val'];
    $u_size = $_POST['u_size_val'];
    $po_number = $_POST['po_number_val'];
    $deployed = $_POST['deployed_val'];
 
    
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

        $insert = $db->query("INSERT INTO server (serial_no, vendor, model_no, type, purchase_date, memory, proc_type, no_of_procs, proc_cores, proc_speed, misc_info, u_size, po_number, deployed)
        VALUES ('$serial_no','$vendor','$model_no', '$type', NULL, '$memory', '$proc_type', $no_of_procs, $proc_cores, '$proc_speed','$misc_info', $u_size, '$po_number', '$deployed')");

    
    
    if($insert)
    {
        echo "success";
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
    $db->close();
}



?>