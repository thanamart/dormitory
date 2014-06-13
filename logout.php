<?php

session_start();

include 'connectdb.php';
$strSQL = "UPDATE users SET login_status = 'F' WHERE user_id = '" . $_SESSION["user_id"] . "' ";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
	die(mysql_error()); // TODO: better error handling
}

session_destroy();
header("location:login.php");
?>