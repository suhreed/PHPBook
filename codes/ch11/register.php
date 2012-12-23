<?php

//get submitted variables
if($_POST) {
	$fname = addslashes($_POST['fname']);
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$twitter = $_POST['twitter'];
	$web = $_POST['web'];
	$country = $_POST['country'];
	$sex = $_POST['sex']; 

	$mysqli = new mysqli('localhost', 'root', '', 'blog');

    $sql = "INSERT INTO authors (first_name, last_name, username, user_email, user_twitter, user_web, country, sex) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('sssssssi', $fname, $lname, $uname, $email, $twitter, $web, $country, $sex);

	//execute prepared statement
	if($stmt->execute()) {
		echo "Record inserted with insert id ". $mysqli->insert_id;
	}

	//close statement
	$stmt->close();

	//close database connection
	$mysqli->close();

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		input {
			display: block;
			background-color: #fffff0;
		}
		.inline { display: inline-block;}

		label {font-weight: bolder;}
	</style>
</head>
<body>

    <h1>Author Registration</h1>
	<p>Please fill in the following form to register as author.</p>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
		<label for="fname">First Name </label>
		<input type="text" size="50" name="fname" />
		<p>
		<label for="lname">Last Name </label>
		<input type="text" size="50" name="lname" />
		<p>
		<label for="email">Email </label>
		<input type="email" size="50" name="email" />
		<p>
		<label for="uname">Username </label>
		<input type="text" size="50" name="uname" />
		<p>
		<label for="twitter">Twitter name </label>
		<input type="text" size="50" name="twitter" />
		<p>
		<label for="web">Web </label>
		<input type="url" size="50" name="web" />
		<p>
		<label for="country">Country</label>
		<input type="text" size="50" name="country" />
		<p>
		<label for="sex">Sex </label>
		<input type="radio" size="10" name="sex" value="1" class="inline" >Male</input>
		<input type="radio" size="10" name="sex" value="2" class="inline">Female</input>
		<p>
			<input type="submit" value="Submit" class="inline" />
			<input type="reset" value="Cancel" class="inline" />
		</p>
	</form>
	
</body>
</html>