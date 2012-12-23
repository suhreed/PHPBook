<?php


echo gmdate('l');
echo "<br>";

echo gmdate("l d F Y h:i:s A");
echo "<br />";

echo "August 21, 2014 is a " . gmdate('l', mktime(0, 0, 0, 8, 21, 2014));

