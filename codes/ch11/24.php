<?php

$link = mysql_connect("localhost", "root") or die("Couldn't cooneect ".mysql_error());
$dbs = mysql_list_dbs($link);

while ($row=mysql_fetch_object($dbs)){
	echo $row->Database . "<br/>";
}

mysql_close($link);
?>
