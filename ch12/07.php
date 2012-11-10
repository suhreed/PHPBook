<?php

$url = 'http://www.suhreedsarkar.com/index.php';
$fp = fopen($url, 'r') or die("Could Not open $url");

while (!feof($fp)) {
	print fgets($fp, 1024);
}

?>