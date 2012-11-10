<?
session_start();

include('captcha_numbers.php');
$captcha = new CaptchaNumbers(4);
$captcha -> display();

$_SESSION['captcha'] = $captcha -> getString();
?>