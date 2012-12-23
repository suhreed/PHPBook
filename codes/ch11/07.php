<?php

$mysqli = new mysqli("localhost", "root", "", "php5boo");

//show error number and message
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//close connection
$mysqli->close();
