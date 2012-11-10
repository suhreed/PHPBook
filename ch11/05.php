<?php

//create connection link
$link = mysql_connect('localhost', 'root', '');

//if connection is not successful, show error message and exit
if (!$link) {
    die("Connection Error: " . mysql_error());
} 

//select 'blog' database
$db = mysql_select_db('blog', $link);

//see whether database selection is successful or not
if (!$db) {
    die('Cannot select database');
} else {
    echo "Database connected";
}

//close connection
mysql_close($link);