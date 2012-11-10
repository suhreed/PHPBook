<?php

echo "<h2>Directory Listing</h2>";

exec("dir /a", $output, $return);
echo "<p>Returned : $return </p>";

foreach ($output as $file) {
	      echo "$file<br>";
}
