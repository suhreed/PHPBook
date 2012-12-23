<?php

$dbname ="php5boo";
$mysqli = new mysqli('localhost', 'root', '');

if(!$mysqli->query('CREATE DATABASE '. $dbname)) {
	echo "Error creating database. ". $mysqli->errno. ': '. $mysqli->error;
} else {
	echo "Successfully created $dbname";
}

$mysqli->close();
