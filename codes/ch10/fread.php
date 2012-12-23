<html>
<head>
    <title>Opening and Reading data from file by fread</title>
</head>
<body>
<h2>Opening and Reading data from file by fread</h2>
<?php 
$file_name = "myfile.txt";
$fp = fopen($file_name, "r") or die("Couldn't open $file_name");
while (!feof($fp)) {
	$chunk = fread($fp, 25);
	print "$chunk<br/>";
}
?>
</body>
</html>