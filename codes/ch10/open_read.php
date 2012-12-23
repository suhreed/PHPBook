<html>
<head>
    <title>Opening and Reading data from file</title>
</head>
<body>
<h2>Opening and Reading data from file</h2>
<?php 

$file_name = "myfile.txt";
$fp = fopen($file_name, "r") or die("Couldn't open $file_name");
while (!feof($fp)) {
	$line = fgets($fp, 1024);
	print "$line<br/>";
}
?>
</body>
</html>