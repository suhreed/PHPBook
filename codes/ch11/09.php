<?php

$dbname ="php5book";
$link = mysql_connect('localhost', 'root', '');

if (!$link) {
   die('Could not connect: ' . mysql_error());
}

$sql = 'CREATE DATABASE '.$dbname;

if (mysql_query($sql, $link)) {
   echo "Database $dbname created successfully";
} else {
   echo 'Error creating database: ' . mysql_error();
}

mysql_close($link);
