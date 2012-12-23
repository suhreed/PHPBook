<?php
header("Content-type: image/png");
$im = @imagecreate(100,100);

//define colors
$green = imagecolorallocate($im, 0, 255, 0);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);

//draw line
imageline($im, 10, 10, 80, 80, $black);

//set tile image
$imgbg = imagecreatefromgif("tile.gif");

//set tile
imagesettile($im, $imgbg);

//fill with black color
imagefill($im, 0, 99, IMG_COLOR_TILED);

//create PNG image
imagepng($im);
imagedestroy($im);
?>