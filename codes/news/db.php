<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "news";

$mysqli = new mysqli($host, $user, $pass, $db);

/* if database connection fails, show error message. */
if($mysqli->connect_errno) {
	echo "Connection Error: ". $mysqli->connect_error;
}
