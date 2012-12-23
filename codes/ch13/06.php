<?php
header("Content-type: image/png");
$im = @imagecreate(100, 100);

// define colors

$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);

/* draw arc
Syntax: 
imagearc(image, cx, cy, width, height, start, end, color)
*/
imagearc($im,50,50,90,90,0,270,$black);

//create PNG image
imagepng($im);
imagedestroy($im);
?>
