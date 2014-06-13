<?php
	include 'connectdb.php';
	
	$strSQL = "SELECT * FROM files WHERE file_id = '".$_GET["file_id"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);

	echo $objResult["filename"];
?>