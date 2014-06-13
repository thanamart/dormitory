<?php
include 'connectdb.php';

if(isset($_POST['search'])){
	$strSQL = "SELECT * FROM users where user_id = " . $_POST['search'];
	$objQuery = mysql_query($strSQL);
	if ($objQuery === FALSE) {
	die(mysql_error()); // TODO: better error handling
	}
	$objResult = mysql_fetch_array($objQuery);
}

?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        Welcome to Admin Page! <br>
		<form name="form1" method="post" action="search_users.php">
			<input name="search" type="text" id="search">
			<input type="submit" name="Submit" value="search">
		</form>
		<?php if(isset($_POST['search']) && isset($objResult)){ ?>
			<table border="1" style="width: 300px">
				<tbody>
					<tr>
						<td width="197"><?=$objResult["user_id"]; ?></td>
						<td width="197"><?=$objResult["name"]; ?></td>
						<td width="197"><?=$objResult["lastname"]; ?></td>
						<td width="197"><?=$objResult["tel"]; ?></td>
						<td width="197"><?=$objResult["last_login"]; ?></td>
						<td width="197"><?=$objResult["file_id"]; ?></td>
						<td width="197"><?=$objResult["status"]; ?></td>
						<td width="197"><?=$objResult["login_status"]; ?></td>
					</tr>
				</tbody>
			</table>
		<?php } ?>
		<br>
        <a href="admin_page.php">Admin_Page</a><br>
    </body>
</html>