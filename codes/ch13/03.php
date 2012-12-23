<?php

header("Content-type: image/png");
$im = @imagecreate(100, 100) or die("Cannot Initialize new GD image stream");

//set background color as green
$background_color = imagecolorallocate($im, 0, 255, 0);

//set some colors
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);

//start drawing a line from (10,10) to (80, 80)
imageline($im,10,10,80,80,$black);

//create PNG image
imagepng($im);

//destroy from memory
imagedestroy($im);

?>
