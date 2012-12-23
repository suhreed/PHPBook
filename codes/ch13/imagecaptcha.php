<?php 

session_start(); 

include_once 'captcha.class.php';

$captcha =new Captcha; 

$secCode=""; 
if( isset( $_GET['code'] ) ) $secCode=trim($_GET['code']); 

if( $secCode == "" ){ 
  $secCode=$captcha->generateAlphaNumericString(5); 
     if( $secCode == "" ) {
      $secCode="ohGod"; 
    } 
} 

$captcha->create_image($secCode,130,35); 

exit(); 

?> 