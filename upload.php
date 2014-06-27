<?php
session_start();
?>
<html>
<head>
<title></title>
<?php include 'script.php'; ?>
</head>
<body>
	<?php include 'topbar.php'; ?>
	<form name="form1" method="post" action="save_upload.php" enctype="multipart/form-data">
		<input type="file" name="filUpload"><br>
		<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>