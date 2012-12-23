<?php
session_start();

if ( !isset($_SESSION['count']) ) {
	$_SESSION['count'] = 1;
} else {
	$_SESSION['count']++;
}

//get session id
$sid = session_id();

?>
<p> Hello visitor, you have seen this page <?= $_SESSION['count'] ?> times.</p>
<p> To continue, <a href="nextpage.php?sid=<?= strip_tags($sid); ?>"> click here</a>.</p>

<!-- you can also add sid through a hidden form field -->
<input type="hidden" name="sid" value="<?= strip_tags($sid); ?>" />