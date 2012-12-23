<?php

if (!isset($_POST['email'])) {

?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
Enter your email address: <input type="text" name="email" value="<?= isset($_COOKIE['email'])?$_COOKIE['email']:"enter email"; ?>">
<input type="submit" name="submit"> <br />
<small>Last saved on: <?= isset($_COOKIE['lastsave'])?date('d-m-Y h:i:s a', $_COOKIE['lastsave']):"last save not known"; ?></small>
</form>
<?php
 } else {

	if (!empty($_POST['email'])) {
		setcookie("email", $_POST['email'], mktime() + (86400 * 30), "/");
		setcookie("lastsave", time(), mktime() + (86400 * 30), "/");
		//setcookie("lastsave", time(), mktime() - 3600, "/");

		echo "Your email address has been recorded.";
	} else {
		echo "ERROR: Please enter your email address!";
	}
}


?>
