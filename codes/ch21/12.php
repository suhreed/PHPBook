<?php

$fp = fopen("tmp.txt", "w");

fwrite($fp, "I am appending this text to my file");
fclose($fp);

chmod 000 tmp.txt;

$fp =fopen("tmp.txt", "r");
unlink("tmp.txt");

?>
