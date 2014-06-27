<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
		<?php include 'script.php'; ?>
    <body>
		<?php include 'topbar.php'; ?>
		<div class="row">
			<form name="form1" method="post" action="save_register.php" enctype="multipart/form-data">
				<table width="500" border="1" style="width: 500px">
					<tbody>
						<tr>
							<td width="160"> &nbsp;Username</td>
							<td width="240">
								<input name="txtUsername" type="text" id="txtUsername" size="20">
							</td>
						</tr>
						<tr>
							<td> &nbsp;Password</td>
							<td><input name="txtPassword" type="password" id="txtPassword">
							</td>
						</tr>
						<tr>
							<td> &nbsp;Confirm Password</td>
							<td><input name="txtConPassword" type="password" id="txtConPassword">
							</td>
						</tr>
						<tr>
							<td>&nbsp;Name</td>
							<td><input name="txtName" type="text" id="txtName" size="35"></td>
						</tr>
						<tr>
							<td>&nbsp;Lastname</td>
							<td><input name="txtLastname" type="text" id="txtLastname" size="35"></td>
						</tr>
						<tr>
							<td>&nbsp;Tel No.</td>
							<td><input name="txtTel" type="text" id="txtTel" size="10"></td>
						</tr>
						<tr>
							<td>&nbsp;Birth Date</td>
							<td>
								<input type="text" class="span2" value="01-01-2014" id="dp1">
							</td>
						</tr>
						<tr>
							<td> &nbsp;Status</td>
							<td>
								<select name="ddlStatus" id="ddlStatus">
									<option value="ADMIN">ADMIN</option>
									<option value="USER">USER</option>
								</select>
							</td>
						</tr>
						<tr>
							<td> Upload Picture </td>
							<td> 
								<input type="file" name="filUpload"><br>
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