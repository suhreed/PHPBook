<?php

$host = "localhost"; // db host
$user = "root"; // db username
$pass = ""; // db password
$db = "gallery"; // db name

$images_dir = 'photos'; 

$mysqli = new mysqli($host, $user, $pass, $db);

/* if database connection fails, show error message. */
if($mysqli->connect_errno) {
	echo "Connection Error: ". $mysqli->connect_error;
}

