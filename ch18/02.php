<?php

//session starts
session_start();

if (!isset($_SESSION['name']) && !isset($_POST['name'])) {

//if session variables do not exist then prints the following form
?>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	   Name: <input type="text" name="name" />
	   <input type="submit" name="submit" value="Submit">
	</form>
<?php
	} else if (!isset($_SESSION['name']) & isset($_POST['name'])) {
    	if (!empty($_POST['name'])) {
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['start'] = time();
 ?>
		<p>Welcome, <?= $_POST['name']; ?>. A new session has been activated for you with sesion id <?= session_id(); ?>.
		Click <a href="<?= $_SERVER['PHP_SELF'] ?>"> here </a> to refresh the page. </p>
		
<?php 
	} else { 
?>
		<p class="error">ERROR: Please enter your name!</p>
<?php
	}
  } else if (isset($_SESSION['name'])) {

?>
	<p class="back">Welcome back, <?= $_SESSION['name'] ?>. This session was activated <?= round((time() - $_SESSION['start']) / 60) ?> minute(s) ago with session id <?= session_id(); ?>. Click <a href="<?= $_SERVER['PHP_SELF'] ?>">here</a> to refresh the page.</p>
<?php
}
?>
