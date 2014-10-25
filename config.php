<?php

$host = 'localhost';
$user = 'root';
$pwd = '';

$db = 'hotel management';

$conn = mysql_connect($host,$user,$pwd); 
$condb = mysql_select_db($db);
if(!$conn ||  !$condb)
{
	die('Connection error');
}

?>