<?php

$now = new DateTime("now");
echo "Value of \$now at beginning : ". $now->format('Y-m-d h:i:s a');
echo "<br />";

echo "Add 100 hrs: ". $now->modify('+100 hour')->format('Y-m-d h:i:s a');
echo "<br />";

echo "Add 100 days : ". $now->modify('+100 day')->format('Y-m-d h:i:s a');
echo "<br />";

echo "Deduct 50 days : ". $now->modify('-50 day')->format('Y-m-d h:i:s a');
echo "<br />";

echo "Final value of \$now: ". $now->format('Y-m-d h:i:s a');
echo "<br />";