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
	,Name = '" . trim($_POST['txtName']) . "' WHERE user_id = '" . $_SESSION["user_id"] . "' ";
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

print_r($_FILES);

if ($_FILES["filUpload"]["name"] != "") {
    if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfiles/" . $_FILES["filUpload"]["name"])) {
        //*** Delete Old File ***//			
        @unlink("myfiles/" . $_POST["hdnOldFile"]);

        //*** Update New File ***//
        $strSQL = "UPDATE files ";
        $strSQL .=" SET filename = '" . $_FILES["filUpload"]["name"] . "' WHERE file_id = '" . $objResult['file_id'] . "' ";
        echo $strSQL;
        $objQuery = mysql_query($strSQL);

        echo "Copy/Upload Complete<br>";
    }
}

echo "Save Completed!<br>";

if ($_SESSION["status"] == "ADMIN") {
    echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
} else {
    echo "<br> Go to <a href='user_page.php'>User page</a>";
}

mysql_close();
?>