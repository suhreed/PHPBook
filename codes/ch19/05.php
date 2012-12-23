<html>
<head>
	<title>using escapeshellcmd() function</title>
</head>
<body>
<p>To get HELP about any Windows shell command, please type the name of the command and press the [Submit] button</p>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
Command: <input type='text' value="<?= isset($_POST['command'])?$_POST['command']:'help'; ?>" name="command" />
<input type="submit" />
</form>
<?php

//show output in <pre> tag
echo "<pre>";
$cmd = "help";

if (isset($_POST['command'])) {
	$cmd = escapeshellcmd($_POST['command']);
}

system("help $cmd"); //for windows help
/* system("man $cmd | col -b"); //for linux manual pages  */

echo "</pre>";

?>