<?php

header("Content-type: image/png");

$im = imagecreate(500,100);

$text= " This text should always be centered";

$font= "arial.ttf";

$green=imagecolorallocate($im, 0, 255, 0);
$red = imagecolorallocate($im, 255, 0, 0);
/* Get TTF box
* Syntax: imagettfbbox(size, angle, fontfile, text)
*/
$bbox=imagettfbbox(12, 0, $font, $text);
$xcor=0-$bbox[6];
$base=$bbox[2]+$xcor;

$width = imagesx($im);

$new_x = ($width-$base)/2;

imagettftext ($im, 12, 0, $new_x, 50, $red, $font, $text);

imagepng($im);

imagedestroy($im);
?>