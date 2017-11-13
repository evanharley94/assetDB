<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["first_name"]);
//session_destroy();

header("Location:loginPage.php");
exit;
?>