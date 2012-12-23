<html>
<head>
    <title>File properties</title>
</head>
<body>
<h1>Creating File with touch()</h1>
<?php 

$file_name = "mynewfile.txt";

if (touch($file_name)) {
   echo "$file_name modification time has been changed to present time";
} else {
   echo "Sorry, could not change modification time of $file_name";
}
?>
</body>
</html>