Projectname:   Simple CAPTCHA class
Version:       0.1
Author:        Ver Pangonilo <smp@limbofreak.com>
Last modified: 18 May 2006
Copyright (C): 2006 Ver Pangonilo, All Rights Reserved

   * GNU General Public License (Version 2, June 1991)
   *
   * This program is free software; you can redistribute
   * it and/or modify it under the terms of the GNU
   * General Public License as published by the Free
   * Software Foundation; either version 2 of the License,
   * or (at your option) any later version.
   *
   * This program is distributed in the hope that it will
   * be useful, but WITHOUT ANY WARRANTY; without even the
   * implied warranty of MERCHANTABILITY or FITNESS FOR A
   * PARTICULAR PURPOSE. See the GNU General Public License
   * for more details.

Description:
   This class can generate CAPTCHAs for user forms. Parameters can be set on the configuration file including transprency.

Note: 
The font "BRADHITC.TTF" is required for the default configuration. This is a common script font for Windows. A replace the default font to suit application.



Usage :
Create a configuration file which contains the following:


<?

session_start();

require_once('class.simplecaptcha.php');

/*

CONFIGURATION STARTS

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
$config['Font_Size']=20; 

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
// 0 - Not Visible, 100 - Fully Visible
$config['Transparency']=70;

/*

CONFIGURATION ENDS

*/



//Create a new instance of the captcha
$captcha = new SimpleCaptcha($config);

//Save the code as a session dependent string
$_SESSION['string'] = $captcha->Code;

?>

Save this file as captcha.php or any filename you wish to. In the html form,
the usage will be

<img src="PATH_TO/captcha.php" alt="captcha" width="WIDTH" height="HEIGHT" />



Limitations:
1. Initially, it only uses PNG images.
2. The image size should be the same as the background image size.


