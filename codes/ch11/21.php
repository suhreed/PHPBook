<?php

function check_user($email) {
	$mysqli = new mysqli('localhost', 'root', '', 'blog');
	$sql = "SELECT first_name, last_name FROM authors WHERE user_email = ?";

	if($stmt = $mysqli->prepare($sql)) {
		
		$stmt->bind_param('s', $email);

		$stmt->execute();

		$stmt->store_result();
        
		if($stmt->num_rows > 0) {
			echo "User with email $email exists";
		} else {
			echo "User with $email address does not exist";
		}

		$stmt->close();

	} else {
		echo "Statement error: ". $mysqli->error;
	}

	$mysqli->close();
}

?>

<!DOCTYPE html>
<html>
<head>
<title> Regsistration </title>
<style type="text/css">
	.error { color: red}
</style>
</head>
<body>
<h1>Check User Email</h1>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<label for="email">Email</label>
<input type="email" size="50" name="email" /> 
<p class="error">
<?php
if($_POST) {
	$email = trim($_POST['email']);

	check_user($email);
}
?>
</p>

<input type="submit" value="Check Email" />
</form>
</body>
</html>

