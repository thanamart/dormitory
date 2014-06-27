<html>
<head>
<title></title>
</head>
<body>
<?php
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"vdo/".$_FILES["filUpload"]["name"]))
	{		
		//*** Insert Record ***//
		include 'connectdb.php';
		$strSQL = "INSERT INTO videos ";
		$strSQL .="(video_name) VALUES ('".$_FILES["filUpload"]["name"]."')";
		$objQuery = mysql_query($strSQL);		

		header("location:myVideos.php");
	}
?>
</body>
</html>