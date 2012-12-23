<?php

$host = "www.php.net";
$port = 80;
$timeout = 45;
$path = "";
$file = "";

$fp = fsockopen($host, $port, $errno, $errstr, $timeout);

if(!$fp) {
		echo $errstr . "Errno: " . $errno . "<br>";
  } else {
		fwrite($fp, "GET $path/$file HTTP/1.0\r\nHost: $host\r\nuser-Agent: PHP Example Client\r\n\r\n");

while(!feof($fp))
		echo fgets($fp, 2048);
	}

fclose($fp);

?>
