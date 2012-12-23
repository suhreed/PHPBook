<?php

//create connection
$link = mysql_connect('localhost', 'root', '');

//see whether conenction is successful or not
if (!$link) {
    echo "Connection Error: " . mysql_error();
} else {
    echo 'Connected successfully';
}

//close the connection
mysql_close($link);
?>