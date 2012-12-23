<?php

$link = mysql_connect("localhost", "root") or die("Couldn't connect". mysql_error());
$dbname = "blog";

//SQL statement for showing list of tables
$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

//showing error message
if (!$result) {
	echo "DB Error, could not list tables/n";
	echo "MySQL Error: " . mysql_error();
	exit;
}

//showing results
while ($row = mysql_fetch_row($result)) {
	echo "Table: {$row[0]} <br/>";
}

mysql_close($link);

?>
