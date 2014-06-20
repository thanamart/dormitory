<?php
session_start();
if ($_SESSION['user_id'] == "") {
    echo "Please Login!";
    exit();
}

if ($_SESSION['status'] != "USER") {
    echo "This page for User only!";
    exit();
}

include 'connectdb.php';

$strSQL = "SELECT * FROM users WHERE user_id = '" . $_SESSION['user_id'] . "' ";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
$objResult = mysql_fetch_array($objQuery);

if(isset($objResult["file_id"])){
	$strSQL = "SELECT * FROM files where file_id = " . $objResult['file_id'];
	$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
	$objResult1 = mysql_fetch_array($objQuery);
}
?>
<html>
    <head>
        <title>ThaiCreate.Com Tutorials</title>
		<?php include 'script.php'; ?>
    </head>
    <body>
		<?php include 'topbar.php'; ?>
        <h1>Welcome to User Page!</h1>
        <?php include 'user_details.php'; ?>
        <br>
        <a href="edit_profile.php">Edit</a><br>
        <br>
    </body>
</html>