<?php

if($_GET) {

$id = (int) $_GET['id'];

$mysqli = new mysqli('localhost', 'root', '', 'blog');

$sql = "SELECT id, first_name, last_name, username, user_email, user_twitter, user_web, country, sex FROM authors WHERE id = $id";

if($result = $mysqli->query($sql)) {
   
   $row = $result->fetch_assoc();

} else {
	echo "Statement error: ". $mysqli->error;
}

$mysqli->close();
}
?>
<!doctype html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		input {
			display: block;
			background-color: #fffff0;
		}

		.inline {display: inline-block;}
		label {font-weight: bolder;}
		.info {display: block; background-color: #fffff0; border: 1px}
	</style>
</head>
<body>
<h1>Author Registration</h1>
	<p>Please fill in the following form to register as author.</p>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
		<label for="fname">First Name </label>
		<input type="text" size="50" name="fname" value="<?= $row['first_name'] ?>" />
		<p>
		<label for="lname">Last Name </label>
		<input type="text" size="50" name="lname" value="<?= $row['last_name'] ?>" />
		<p>
		<label for="email">Email </label>
		<input type="email" size="50" name="email" value="<?= $row['user_email'] ?>" />
		<p>
		<label for="uname">Username </label>
		<input type="text" size="50" name="uname" value="<?= $row['username'] ?>"/>
		<p>
		<label for="twitter">Twitter name </label>
		<input type="text" size="50" name="twitter" value="<?= $row['user_twitter'] ?>"/>
		<p>
		<label for="web">Web </label>
		<input type="url" size="50" name="web" value="<?= $row['user_web'] ?>" />
		
		<p>
			<input type="submit" value="Submit" class="inline" />
			<input type="reset" value="Cancel" class="inline" />
		</p>
	</form>
	</body>
</html>
