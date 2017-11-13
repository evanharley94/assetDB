<?php

session_start();

if (!(isset($_SESSION['username']))) //ensure you can't view this page unless logged in!
{
	header ("Location: loginPage.php"); //re-direct to the login page
}

?>