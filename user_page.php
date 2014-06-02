<?php
session_start();
if ($_SESSION['user_id'] == "") {
    echo "Please Login!";
    exit();
}

if ($_SESSION['status'] != "USER") {
    echo "This page for User only!";
    exit();
}

include 'connectdb.php';

$strSQL = "SELECT * FROM users WHERE user_id = '" . $_SESSION['user_id'] . "' ";
$objQuery = mysql_query($strSQL);
if ($objQuery === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
$objResult = mysql_fetch_array($objQuery);
?>
<html>
    <head>
        <title>ThaiCreate.Com Tutorials</title>
    </head>
    <body>
        Welcome to User Page! <br>
		เข้าสู่ระบบล่าสุดเมื่อเวลา <?= $objResult["last_login"] ?>
        <table border="1" style="width: 300px">
            <tbody>
                <tr>
                    <td width="87"> &nbsp;Username</td>
                    <td width="197"><?= $objResult["username"]; ?>
                    </td>
                </tr>
                <tr>
                    <td> &nbsp;Name</td>
                    <td><?= $objResult["name"]; ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="edit_profile.php">Edit</a><br>
        <br>
        <a href="logout.php">Logout</a>
    </body>
</html>