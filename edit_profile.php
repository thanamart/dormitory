<?php
session_start();
if ($_SESSION['user_id'] == "") {
    echo "Please Login!";
    exit();
}
include 'connectdb.php';
$strSQL = "SELECT * FROM users WHERE user_id = '" . $_SESSION['user_id'] . "' ";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
$objResult = mysql_fetch_array($objQuery);

$strSQL = "SELECT * FROM files WHERE file_id = '" . $objResult['file_id'] . "' ";
$objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
$objResult1 = mysql_fetch_array($objQuery);
?>
<html>
    <head>
        <title>ThaiCreate.Com Tutorials</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
		<?php include 'script.php'; ?>
    <body>
		<?php include 'topbar.php'; ?>
		<div class="row">
			<form name="form1" method="post" action="save_profile.php" enctype="multipart/form-data"
				  Edit Profile! <br>
				<table width="400" border="1" style="width: 400px">
					<tbody>
						<tr>
							<td width="160"> &nbsp;user_id</td>
							<td width="180">
								<?= $objResult["user_id"]; ?>
							</td>
						</tr>
						<tr>
							<td> &nbsp;Username</td>
							<td>
								<?= $objResult["username"]; ?>
							</td>
						</tr>
						<tr>
							<td> &nbsp;Password</td>
							<td><input name="txtPassword" type="password" id="txtPassword" value="<?= $objResult["password"]; ?>">
							</td>
						</tr>
						<tr>
							<td> &nbsp;Confirm Password</td>
							<td><input name="txtConPassword" type="password" id="txtConPassword" value="<?= $objResult["password"]; ?>">
							</td>
						</tr>
						<tr>
							<td>&nbsp;Name</td>
							<td><input name="txtName" type="text" id="txtName" value="<?= $objResult["name"]; ?>"></td>
						</tr>
						<tr>
							<td>&nbsp;Lastname</td>
							<td><input name="txtLastname" type="text" id="txtLastname" value="<?= $objResult["lastname"]; ?>"></td>
						</tr>
						<tr>
							<td>&nbsp;Tel No.</td>
							<td><input name="txtTelNo" type="text" id="txtTelNo" value="<?= $objResult["tel"]; ?>"></td>
						</tr>
						<tr>
							<td>&nbsp;Picture</td>
							<td>
							<?php if(isset($objResult1["filename"])){
							?>
								<img src="viewImage.php?file_id=<?=$objResult["file_id"];?>"><br>
							<?php 
							}
							?>
							<input type="file" name="filUpload"><br>
						</tr>
						<tr>
							<td> &nbsp;Status</td>
							<td>
								<?= $objResult["status"]; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<br>
				<input type="submit" name="Submit" value="Save">
			</form>
		</div>
    </body>
</html>