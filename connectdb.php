<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die(mysql_error());
}

mysql_select_db("dormitory") or die(mysql_error());

?>