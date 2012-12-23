<!doctype html>
<html>
<head>
	<title>Upload File</title>
</head>
<body>
<h2>Upload Example</h2>
	<form action="process_upload.php" method="post" enctype="multipart/form-data" >
		<label for="myfile"> Upload a file </label>
		<input type="file" size="50" name="myfile" />
		<input type="submit" value="Upload" />
	</form>
	</body>
</html>