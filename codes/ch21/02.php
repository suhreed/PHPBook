
<html>
<head>
<title>Use of show_source() Function to Highlight PHP Syntax</title>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
Enter a file name: <input type="text" name="file">
<input type="submit" />
</form>
<?php

if( isset($_GET['file']) ) {
	highlight_file($_GET['file']);
} else {
	echo "Please give a filename first";
}

?>
</body>
</html>
