<?php
session_start();

require_once('class.simplecaptcha.php');

/*
*****CONFIGURATION STARTS*****
*/
//Background Image
$config['BackgroundImage'] = "white.png";

//Background Color- HEX
$config['BackgroundColor'] = "FFFC00";

//image height - same as background image
$config['Height']=30;

//image width - same as background image
$config['Width']=100;

//text font size
$config['Font_Size']=23;

//text font style
$config['Font']="BRADHITC.TTF";

//text angle to the left
$config['TextMinimumAngle']=15;

//text angle to the right
$config['TextMaximumAngle']=45;

//Text Color - HEX
$config['TextColor']='000000';

//Number of Captcha Code Character
$config['TextLength']=6;

//Background Image Transparency
$config['Transparency']=50;

/*
*******CONFIGURATION ENDS******
*/



//Create a new instance of the captcha
$captcha = new SimpleCaptcha($config);

//Save the code as a session dependent string
$_SESSION['string'] = $captcha->Code;


?>