<?php
$conn_error= 'Could not connect';
$host = 'localhost';
$user = 'root';
$pass = '';

$mysql_db = 'eventize';
@mysql_connect($host,$user,$pass) or die($conn_error);
mysql_select_db($mysql_db) or die($conn_error);
include('functions.php');
?>