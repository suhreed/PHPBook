<?php
header("Content-type: image/png");
$im = @imagecreate(100, 100);

// define colors

$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
$green = imagecolorallocate($im, 0, 255, 0);
/* draw arc
* Syntax: 
* imagefilledarc(image, cx, cy, width, height, start, end, color, style)
*/
imagefilledarc($im, 50, 50, 90, 90, 0, 270, $black, IMG_ARC_PIE);

//create PNG image
imagepng($im);
imagedestroy($im);
?>