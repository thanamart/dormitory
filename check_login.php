<?php

session_start();

include 'connectdb.php';

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
    $strSQL = "UPDATE users SET last_login = '" . $_SESSION['last_login'] . "', login_status = 'T' WHERE user_id = '" . $_SESSION["user_id"] . "' ";
    $objQuery = mysql_query($strSQL);
    if ($objQuery === FALSE) {
        die(mysql_error()); // TODO: better error handling
    }

    if ($_SESSION["status"] == "ADMIN") {
        header("location:admin_page.php");
    } else {
        header("location:user_page.php");
    }
}

mysql_close();
?>