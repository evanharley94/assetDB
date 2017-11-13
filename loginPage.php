<?php 
session_start();
if (isset($_SESSION['username'])) // if user is logged in redirect to home page
{
	header ("Location: index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div id="logo">
	<h1><a href="#" class="icon icon-group"><span>ADC Asset Management System</span></a></h1>
</div>
<div id="header">
	<div id="menu" class="container">
		<ul>
			<li></li>
		</ul>
	</div>
</div>
<div id="page-wrapper">
<div id="page" class="container">
	<div id="content">
		<div class="title">
			<h2>Welcome to the ADC Asset Management System</h2>
			<br></br>
				<div class="body" align ="left" style = "border:1px solid black;padding:10px;background:#FFFFFF">
					<h3>Login:</h3>
			        <br>
			        <?php
			        
                    if(!empty($_SESSION['errorMessage'])) 
                    { 
                    	echo $_SESSION['errorMessage']; // echo login error message stored in session
                    }  
                    
                    unset($_SESSION['errorMessage']); ?>
			        
					<form action="login.php" method="post">
	                <table>
	                	<tr>
							<td align="left">User Name: </td>
							<td align="left"><input type="text" name="username" size="15" maxlength="25" /></td>
						</tr>
						<tr>
    						<td align="left">Password: </td>
    						<td align= "left"><input type="password" name="password" size="15" maxlength="25" /></td>
    					</tr>
    					<tr>
    						<td><br><input type="submit" name="submit" value="Login" /></td>
    						<td><input type="hidden" name="login" value="TRUE"/> </td> 
						</tr>
					</table>
					</form>
					
					<p>Don't have a login? Register <a href="register.html">here</a>. </p>
				</div>
			
		</div>
	</div>
	<div id="sidebar"><a href="#" class="image image-full"><img src="images/adc_laptop.jpg" alt="" /></a></div>
</div>
</div>
<div id="copyright" class="container">
	<p>Confidential and for internal use only. Copyright &copy; 2017 Capgemini. | Template by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>

