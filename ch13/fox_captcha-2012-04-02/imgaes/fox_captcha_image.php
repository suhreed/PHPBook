<?php
session_start();
if (empty($_SESSION['FoxCaptchaFilePath'])) die('Fox_Captcha Error: missing session for image.');
include($_SESSION['FoxCaptchaFilePath']);
$img = new Fox_captcha($_SESSION['Fox_CaptchaSSim_width'], $_SESSION['Fox_CaptchaSSim_height'], $_SESSION['Fox_CaptchaSSim_codeLength']);
$img->lines_amount = $_SESSION['Fox_CaptchaSSim_linesAmount'];
$img->make_it('JPG');
?>