<?php

if(isset($_GET)) {
	foreach ($_GET as $key => $value) {
		echo "$key : $value <br />";
	}
	echo " <hr /> You can also show it by name: <br />";
	echo "Name: ".$_GET['name']."<br />";
	echo "Age: ".$_GET['age']."<br />";
	echo "Country: ". $_GET['country']."<br />";
}