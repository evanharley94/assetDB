<?php 

try
{
	$db = new PDO("mysql:host=localhost;dbname=assetdb", "root", ""); //connect to the database & create the PDO object $db
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $ex) //catch errors

{
	echo 'Sorry, a database error occurred.';
	echo 'Error details:'. $ex->getMessage();
}



?>