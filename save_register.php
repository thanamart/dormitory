<?php

include 'connectdb.php';

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

if (trim($_POST["txtLastname"]) == "") {
    echo "Please input Lastname!";
    exit();
}

if (trim($_POST["txtTel"]) == "") {
    echo "Please input Tel No.!";
    exit();
}

$strSQL = "SELECT * FROM `users` WHERE `username` = '" . trim($_POST['txtUsername']) . "' ";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
$objResult = mysql_fetch_array($objQuery);
if ($objResult) {
    echo "Username already exists!";
} else{
    if($_FILES['filUpload']['name'] != null){
        if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfiles/" . $_FILES["filUpload"]["name"])) {
            $strSQL = "INSERT INTO files ";
            $strSQL .="(filename) VALUES ('" . $_FILES["filUpload"]["name"] . "')";
            $objQuery = mysql_query($strSQL);
        }

        $strSQL = "SELECT file_id FROM files ORDER BY file_id DESC LIMIT 1;";
        $objQuery = mysql_query($strSQL);
        if ($objQuery === FALSE) {
            die(mysql_error()); // TODO: better error handling
        }
        $objResult = mysql_fetch_array($objQuery);

        $strSQL = "INSERT INTO users (username,password,name,lastname,tel,file_id,status) VALUES ('" . $_POST["txtUsername"] . "', 
          '" . $_POST["txtPassword"] . "','" . $_POST["txtName"] . "','" . $_POST["txtLastname"] . "','" . $_POST["txtTel"] . "'," . $objResult['file_id'] . ",'" . $_POST["ddlStatus"] . "')";
    }   
    else
    {
        $strSQL = "INSERT INTO users (username,password,name,lastname,tel,status) VALUES ('" . $_POST["txtUsername"] . "', 
          '" . $_POST["txtPassword"] . "','" . $_POST["txtName"] . "','" . $_POST["txtLastname"] . "','" . $_POST["txtTel"] . "','" . $_POST["ddlStatus"] . "')";
        echo "Register Completed!<br>";
    }
    $objQuery = mysql_query($strSQL); 

    echo "<br> Go to <a href='login.php'>Login page</a>";
}

mysql_close();
?>