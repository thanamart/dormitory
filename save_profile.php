<?php

session_start();
if ($_SESSION['user_id'] == "") {
    echo "Please Login!";
    exit();
}
include 'connectdb.php';

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
    echo "Password not Match!";
    exit();
}
$strSQL = "UPDATE users SET password = '" . trim($_POST['txtPassword']) . "' 
	,name = '" . trim($_POST['txtName']) . "', lastname = '" . trim($_POST['txtLastname']) . "', tel = '" . $_POST['txtTelNo'] . "' WHERE user_id = '" . $_SESSION["user_id"] . "' ";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

$strSQL = "SELECT * FROM users WHERE user_id = '" . $_SESSION["user_id"] . "' ";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
$objResult = mysql_fetch_array($objQuery);

if ($_FILES["filUpload"]["name"] != "") {
	
	//*** Read file BINARY ***'
	$fp = fopen($_FILES["filUpload"]["tmp_name"],"r");
	$ReadBinary = fread($fp,filesize($_FILES["filUpload"]["tmp_name"]));
	fclose($fp);
	$FileData = addslashes($ReadBinary);
		
	if($objResult['file_id'] === NULL){
		
		$strSQL = "INSERT INTO files ";
		$strSQL .="(filename) VALUES ('" . $FileData . "')";
		$objQuery = mysql_query($strSQL);
		
		$strSQL = "SELECT file_id FROM files ORDER BY file_id DESC LIMIT 1;";
		$objQuery = mysql_query($strSQL);
		if ($objQuery === FALSE) {
			die(mysql_error()); // TODO: better error handling
		}
		$objResult1 = mysql_fetch_array($objQuery); //
		
		$strSQL = "UPDATE users ";
		$strSQL .=" SET file_id = '" . $objResult1['file_id'] . "' WHERE user_id = '" . $objResult['user_id'] . "' ";
		$objQuery = mysql_query($strSQL);
		
	}else{

		//*** Update New File ***//
		$strSQL = "UPDATE files ";
		$strSQL .=" SET filename = '" . $FileData . "' WHERE file_id = '" . $objResult['file_id'] . "' ";
		$objQuery = mysql_query($strSQL);
	}

	echo "Copy/Upload Complete<br>";
    
}

echo "Save Completed!<br>";

if ($_SESSION["status"] == "ADMIN") {
    echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
} else {
    echo "<br> Go to <a href='user_page.php'>User page</a>";
}

mysql_close();
?>