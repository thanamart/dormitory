<?php

include("connectdb.php");

if (trim($_POST["txtUsername"]) == "") {
    echo "Please input Username!";
    exit();
}

if (trim($_POST["txtPassword"]) == "") {
    echo "Please input Password!";
    exit();
}

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
    echo "Password not Match!";
    exit();
}

if (trim($_POST["txtName"]) == "") {
    echo "Please input Name!";
    exit();
}

$strSQL = "SELECT * FROM users WHERE username = '" . trim($_POST['txtUsername']) . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if ($objResult) {
    echo "Username already exists!";
} else {
    print_r($_FILES);
    if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfiles/" . $_FILES["filUpload"]["name"])) {
        echo "Copy/Upload Complete<br>";

        $strSQL = "INSERT INTO files ";
        $strSQL .="(filename) VALUES ('" . $_FILES["filUpload"]["name"] . "')";
        $objQuery = mysql_query($strSQL);
    }

    $strSQL = "INSERT INTO users (username,password,name,lastname,status) VALUES ('" . $_POST["txtUsername"] . "', 
		'" . $_POST["txtPassword"] . "','" . $_POST["txtName"] . "','" . $_POST["txtLastname"] . "','" . $_POST["ddlStatus"] . "')";
    echo $strSQL;
    $objQuery = mysql_query($strSQL);

    echo "Register Completed!<br>";

    echo "<br> Go to <a href='login.php'>Login page</a>";
}

mysql_close();
?>