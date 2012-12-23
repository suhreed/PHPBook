<html>
<head>
	<title>File Upload Example</title>
</head>
<body>
<h1>File Upload Example</h1>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Select a File: <input type="file" name="fupload" /><br />
<input type="submit" value="Upload File" />
</form>
</body>
</html>