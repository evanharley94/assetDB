<?php

//******** License table modify records ****************************

include 'dbconnection.php';

if(isset($_POST['edit_row']))
{
    $license_id = $_POST['id'];
    $license = $_POST['license'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $purchase_date = $_POST['purchase_date'];
    $m_date = $_POST['m_date'];
    $po_number = $_POST['po_number'];
    $supplier = $_POST['supplier'];
    $cost = $_POST['cost'];
    $renewal_info = $_POST['renewal_info'];
    
        $query = $db->query("UPDATE license SET license='$license',quantity='$quantity',description='$description',purchase_date=IF('$purchase_date'='',NULL,'$purchase_date'),m_date=IF('$m_date'='',NULL,'$m_date'), 
        po_number = '$po_number', supplier = '$supplier', cost = '$cost', renewal_info = '$renewal_info'  where license_id='$license_id'");
         
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
    $license_id = $_POST['row_id'];
    $query1 = $db->query("DELETE FROM license WHERE license_id='$license_id'");
    //$query2 = $db->query("DELETE FROM license_usage WHERE license_id='$license_id'");
    
    echo "success";
    $db->close(); 
}

if(isset($_POST['insert_row']))
{   
    $license = $_POST['license'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $purchase_date = $_POST['purchase_date'];
    $m_date = $_POST['m_date'];
    $po_number = $_POST['po_number'];
    $supplier = $_POST['supplier'];
    $cost = $_POST['cost'];
    $renewal_info = $_POST['renewal_info'];
    
    if(empty($quantity))
    {
        $quantity = 'NULL';
    }
    
        $insert = $db->query("INSERT INTO license (license, quantity, description, purchase_date, m_date, po_number, supplier, cost, renewal_info)
        VALUES ('$license','$quantity','$description', IF('$purchase_date'='',NULL,'$purchase_date'), IF('$m_date'='',NULL,'$m_date'), '$po_number', '$supplier','$cost','$renewal_info')");
    
    if($insert)
    {
        echo "Success";
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
   
}

//******** License Usage table modify records ****************************

if(isset($_POST['edit_row_usage']))
{
    $license_id = $_POST['license_id'];
    $hostname = $_POST['hostname'];
    $quantity = $_POST['quantity'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $project = $_POST['project'];
    $details = $_POST['details'];
    
    $query = $db->query("UPDATE license_usage SET hostname='$hostname',quantity='$quantity', start_date=IF('$start_date'='',NULL,'$start_date'), end_date=IF('$end_date'='',NULL,'$end_date'), project='$project', details ='$details'
       where license_id='$license_id'"); // if dates are empty, must be converted to NULL for INSERT

    if ($db->rowCount() > 0)
    {
        return "success";
    } else
    {
        return $error = "Error: " . $db->error;
    }
    
    $db->close();   
}

if(isset($_POST['delete_row_license_usage']))
{
    $license_id = $_POST['row_id'];
    $query = $db->query("DELETE FROM license_usage WHERE license_id='$license_id'");
    
    echo "success";
    $db->close();
}

if(isset($_POST['insert_row_usage']))
{
    $license = $_POST['license'];
    $hostname = $_POST['hostname'];
    $quantity = $_POST['quantity'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $project = $_POST['project'];
    $details = $_POST['details'];
    
    if(empty($quantity))
    {
        $quantity = 'NULL';
    }
    
    $insert = $db->query("INSERT INTO license_usage (license, hostname, quantity, start_date, end_date, project, details)
        VALUES ('$license','$hostname','$quantity',IF('$start_date'='',NULL,'$start_date'), IF('$end_date'='',NULL,'$end_date'), '$project', '$details')");
    
    if($insert)
    {
        echo "Success";
    }
    
    else
    {
        die("Error Message: ".mysql_error());
    }
    
}

?>