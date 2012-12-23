<!doctype html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		input {display: block; background-color: #fffff0;}
		.inline {display: inline-block;}
		label {font-weight: bolder;}
		.info {display: block; background-color: #fffff0; border: 1px}
	</style>
</head>
<body>
<h1>$_POST Example</h1>
	<p class="info">
	<?php

		if(isset($_POST)) {
			echo "You have subitted the following information: <br />";
			foreach ($_POST as $key => $value) {
				echo "$key : $value <br />";
			}
		}
	?>
	</p>
	<p>Please fill in the following form and submit.</p>
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
		<label for="web">Web </label>
		<input type="url" size="50" name="web" />
		
		<p>
			<input type="submit" value="Submit" class="inline" />
			<input type="reset" value="Cancel" class="inline" />
		</p>
	</form>
	</body>
</html>