<?php
session_start();
if ($_SESSION['user_id'] == "") {
    echo "Please Login!";
    exit();
}

mysql_connect("localhost", "root", "");
mysql_select_db("dormitory");
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
    <body>
        <form name="form1" method="post" action="save_profile.php" enctype="multipart/form-data"
              Edit Profile! <br>
            <table width="400" border="1" style="width: 400px">
                <tbody>
                    <tr>
                        <td width="125"> &nbsp;user_id</td>
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
                        <td>&nbsp;Picture</td>
                        <td><img src="myfiles/<?= $objResult1["filename"]; ?>"><br><input type="file" name="filUpload"><br>
                            <input type="hidden" name="hdnOldFile" value="<?= $objResult1["filename"]; ?>"></td>
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
    </body>
</html>