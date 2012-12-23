<?php
header("Content-type: image/png");
$im = @imagecreate(200, 200) or die("Cannot Intialize new GD image stream");

$red = imagecolorallocate($im, 255, 0, 0);

/* Create Filled Rectangle:
* Syntax: imagefilledrectangle(image, x1, y1, x2, y2, color)
*/
imagefilledrectangle($im, 10, 10, 180,180, $red);
imagepng($im);
imagedestroy($im);

?>