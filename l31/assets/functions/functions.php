<?php
echo 1;
/*
$servername = "localhost";
$username = "root";
$password = "";
$db="impact_test";*/
$servername = "sql11.freemysqlhosting.net";
$username = "sql11679804";
$password = "RQx48VKk4N";
$db="sql11679804";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
