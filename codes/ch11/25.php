<?php

$link = mysql_connect("localhost", "root") or die("Couldn't connect" .mysql_error());
$dbs = mysql_list_dbs($link);

$num_rows = mysql_num_rows($dbs);

for ($i = 0; $i < $num_rows; $i++) {
	echo "Database: ". mysql_tablename($dbs, $i) . "<br/>";
}

mysql_close($link);
?>
