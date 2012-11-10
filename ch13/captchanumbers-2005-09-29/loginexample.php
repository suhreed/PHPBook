<?php
session_start();
?>
<html>
<body>
<?php
// check login - only code
if (isset($_REQUEST['submit'])) {
	if ($_SESSION['captcha']==$_REQUEST['code']) echo 'login ok';
	else echo 'login failed';
}
else {
?>

<img src="captcha.php" />

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Username: <input type="text" name="username" /><br />
Password: <input type="text" name="password" /><br />
Code: <input type="text" name="code" /><br />
<input type="submit" name="submit" value="Login" />
</form>
<?php 
} 
?>
</body>
</html>