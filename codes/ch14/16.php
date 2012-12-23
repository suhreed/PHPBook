<?php

$date = mktime(2012, 08, 22);

$sunrise = date_sunrise($date);
$sunset = date_sunset($date);

echo "Sunrise : $sunrise and Sunset at $sunset ";

