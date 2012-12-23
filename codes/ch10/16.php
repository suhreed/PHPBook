<html>
<head>
    <title>Opening and Reading data from file by fseek()</title>
</head>
<body>
<h2>Opening and Reading data from file by fseek()</h2>
<?php 
  $file_name = "myfile.txt";
  $fp = fopen($file_name, "r") or die("Couldn't open $file_name");
  $fsize = filesize($file_name);
  $half_way = (int) ($fsize/2);
  print "Halfway point of this file: $half_way <br />";
  fseek($fp, $half_way);
  $chunk = fread($fp, ($fsize - $half_way));
  print $chunk;
?>
</body>
</html>
