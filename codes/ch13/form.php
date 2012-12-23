<html>
  <head>
    <title>Using Captcha</title>
  </head>
  <body>

  <?php
  session_start();

  if (!$_POST) {
  ?>
  <h2> Form with Captcha</h2>
      <form id="demo" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Validation Code: <br/>
        <img src="imagecaptcha.php" alt="CAPTCHA"><br>
        Please ype above code (case sensitive):<br />
        <input type="text" name="code" size="30">
        <input type="submit" value="Go">
      </form>
    <?php
     } else {

        //Check if userinput and CAPTCHA Code are equal
        if ($_SESSION['security_code'] == $_POST['code']) {
            echo '<b>Correct Code.</b> Congratulations!';
          } else {
            echo '<b>Incorrect Code.</b> Sorry! Please try again.';
        }
      }
  ?>
</body>
</html>