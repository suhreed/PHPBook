<?php

$link = mysql_connect('localhost', 'root', '');

//if not connected, show error no. and message
if (!$link) {
    die("Connection Error: " . mysql_errno($link)." ".  mysql_error($link));
} 

//select database, if not successful - show error no and message
$db = mysql_select_db('php5boo', $link);
if (!$db) {
    die('Cannot select database.'.mysql_errno($link).' '.  mysql_error($link));
} else {
    echo 'Database connected';
    //do other things with the database
}

mysql_close($link);

