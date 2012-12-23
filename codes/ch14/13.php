<?php

$now = new DateTime("now");
echo "Time ordered : ". $now->format('Y-m-d h:i:s a');
echo "<br />";

$delay = new DateInterval("PT19H20M");

echo "We deliver after: ". $delay->format("%R%h hours %i minutes");
echo "<br />";

$delivery = $now->add($delay);

echo "Your order will be delivered after: ". $delivery->format('Y-m-d h:i:s a');