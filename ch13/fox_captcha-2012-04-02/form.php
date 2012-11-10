<html>
  <head>
    <title>Fox Captcha test form</title>
    <style>
      body{
        background: #66AAFF;
        font-size: 1.8em;
        font-family: "sans serif";
      }
      a{
        font-size:1.1em;
      }
    </style>
    <meta charset=utf8>
  </head>
  
  <body>
<?php
session_start();
require_once('Fox_captcha.php');
$cp = new Fox_captcha(1,1,1);
if ($cp->test($_POST['code'])){
?>
<h1>Welcome <?=$_POST['name']?></h1>
<?php }
else{?>
<h1>Bad Code</h1>

<?php } ?>
<br />
<a href="index.php">Try again!</a>
</body>
</html>