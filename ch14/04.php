<?php


echo date('l');
echo "<br>";

echo date("l d F Y h:i:s A");
echo "<br />";

echo "August 21, 2014 is a " . date('l', mktime(0, 0, 0, 8, 21, 2014));

