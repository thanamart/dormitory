<?php

session_start();
// Create connection
$con=mysqli_connect("localhost","root","","dormitory");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$strSQL = "SELECT * FROM users WHERE username = '" . mysql_real_escape_string($_POST['txtUsername']) . "' and password = '" . mysql_real_escape_string($_POST['txtPassword']) . "'";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
$objResult = mysql_fetch_array($objQuery);
print_r($objResult);
if (!$objResult) {
    echo "Username and Password Incorrect!";
} else {
    $_SESSION["user_id"] = $objResult["user_id"];
    $_SESSION["status"] = $objResult["status"];

    date_default_timezone_set('Asia/Bangkok');
    $_SESSION["last_login"] = date('Y-m-d H:i:s');
    $strSQL = "UPDATE users SET last_login = '" . $_SESSION['last_login'] . "' WHERE user_id = '" . $_SESSION["user_id"] . "' ";
    $objQuery = mysql_query($strSQL);
    if ($objQuery === FALSE) {
        die(mysql_error()); // TODO: better error handling
    }

    session_write_close();

    if ($objResult["status"] == "ADMIN") {
        header("location:admin_page.php");
    } else {
        header("location:user_page.php");
    }
}

mysql_close();
?>