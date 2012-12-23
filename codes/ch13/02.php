<?php

//send header information
header("Content-type: image/png");

//get image handle
$im = @imagecreate(200, 50) or die("Cannot Initialize GD image stream");

//set image properties

//set background color as red
$background_color = imagecolorallocate($im, 255, 255, 0);

//setting some other colors
$white = imagecolorallcate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 0, 0, 0);

imagestring($im, 5,10, 10, "Image with Background Color", $text_color);

//create PNG image
imagepng($im);

//destroy image
imagedestroy($im);

?>
