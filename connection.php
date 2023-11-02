<?php

$db_Server="localhost";
$db_User="root";
$db_pass="";
$db_Name="hotel";

$conn= mysqli_connect($db_Server,$db_User,$db_pass,$db_Name);

if(!$conn)
{
	die("connection failed! ".mysqli_connect_error());
}

?>