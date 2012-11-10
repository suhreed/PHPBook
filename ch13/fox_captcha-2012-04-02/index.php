<?php
session_start();
require_once('Fox_captcha.php');
$img = new Fox_captcha(120, 30, 5);
$img->lines_amount = 2;
$img->image_dir='images/';// it is in the same page so I need not to add any value
$img->en_reload = "Reload The Image";

?>
<html>
<head>
<meta charset=utf8>
<title>Fox Captcha text form</title>
<style>
      body{
        background: #66AAFF;
        font-size: 1.0em;
        font-family: "sans serif";
      }
      a{
        font-size:1.1em;
      }
      div{
        font-size: 1.1em;
      }
    </style>
</head>
<body>
  <div>
    To test fox captcha validation just enter your name and then fill the code value as you see in the image.<br />
    If you would like to get new image just click on "Reload The Image". Please look at <a href="how2use.html">documentation</a>
  </div>
  <br />
<form action="form.php" method="POST">
Your name :<br /> <input type="text" name="name" value="" /> <br />
Code  :<br /><lable style="display:inline"> <input type="text" name="code" /> | <?php $img->make_it(); ?></lable>
<br />
<input type="submit" value="Validate!" />
</form>

</body>
</html>