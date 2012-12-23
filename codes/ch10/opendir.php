<?php
print "<h3>List of files</h3>";
$d = "myfolder";
$dir = opendir($d);
while ($file = readdir($dir)) {
	echo "$file<br/>";
}

closedir($dir);
?>