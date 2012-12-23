<?php
// set up array of points for polygon
$points = array(
			40, 50,  // Point 1 (x, y)
			20, 240, // Point 2 (x, y)
			60, 60,  // Point 3 (x, y)
			240, 60, // Point 4 (x, y)
			50, 30,  // Point 5 (x, y)
			10, 10,  // Point 6 (x, y)
			);
// creatte image
$image = imagecreate(250, 250);

//define color
$bg = imagecolorallocate($image, 200, 200, 200);
$blue = imagecolorallocate($image, 0, 0, 255);

/* Create Filled polygon
* Syntax: imagefilledpolygon(image, points, num_points, color)
*/
imagefilledpolygon($image, $points, 6, $blue);

// create image
header('Content-type: image/gif');
imagecolortransparent($image, $bg);
imagegif($image);
imagedestroy($image);
?>
