<?php

session_start();

if (isset($_POST['login'])) //if login form is submitted
{
	require_once ('dbconnection.php');  //connect to the db

	$username = $_POST['username']; //retrieve username value
	$password = $_POST['password']; //retrieve password value

	$safe_username = $db->quote($username); //santise input

	$query = "select * from users where username = $safe_username";

	$result = $db->query($query);

	$firstrow = $result->fetch(); //get the first row

	if (!empty($firstrow))
	{
		$hashed_password = md5($password); //hash the password so it can be compared
		if ($firstrow['password'] == $hashed_password) //check passwords match
		{
			$_SESSION['username'] = $firstrow['username']; //add session
			$_SESSION['first_name'] = $firstrow['first_name']; //name needed in session to show who's logged
			
			header("Location: index.php");
	        exit();
		}
		else //error for invalid password
		{
			header("Location: loginPage.php");
			$_SESSION['errorMessage'] = "<span style='color:#FF0000'>Invalid username or password</span>"; //store error in session to use on login page
		}
	}
	else //error for invalid username
	{
			header("Location: loginPage.php");
			$_SESSION['errorMessage'] = "<span style='color:#FF0000'>Invalid username or password</span>"; //store error in session to use on login page
	}

	}

?>