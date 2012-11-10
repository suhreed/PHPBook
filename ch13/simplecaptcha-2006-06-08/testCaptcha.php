<?php

  /******************************************************************
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
   This is an application for the SimpleCaptcha Class in user forms.

 ******************************************************************/

  ob_start();

  session_start();

?>

<html>
  <head>
    <title>Simple CAPTCHA Class Application</title>
  </head>
  <body>
  <?php
  if (!$_POST['code'])
  {
  ?>
      <form id="demo" action="<?php echo $_SERVER['PHP_SELF']; ?>?goto=login" method="POST">

            Message:
            <br/>
            <textarea name="message" cols="25" rows="5" id="message" ></textarea>
            <br/>
            Validation Code:
            <br/>
            <img src="./captcha.php" alt="CAPTCHA">
            <br>
            <input type="text" name="code" size="30">
            <br>
            <input type="submit" value="Go">
      </form>
        <?php
     }else{

        //Check if userinput and CAPTCHA Code are equal
        if ($_SESSION['string'] == $_POST['code'])
        {
          echo '<script>alert("Correct Code.");history.go(-1);</script>';
        }
        else
        {
          echo '<script>alert("Incorrect Code.");history.go(-1);</script>';
           }
      }
    ?>
</body>

</html>