<?php

echo "<h2>IP Configuration</h2>";

echo "<pre>";

$p = popen("ipconfig /all", "r")
		or die("Couldn't open connection to the server");

$host = "localhost";

while (!feof($p)) {
	$line = fgets($p);
	print $line;
}

pclose($p);

echo "</pre>";
