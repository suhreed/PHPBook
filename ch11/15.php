<?php

	$mysqli = new mysqli('localhost', 'root', '', 'blog');

	$sql = "INSERT INTO authors (first_name, last_name, username, user_email, user_twitter, user_web, country, sex) VALUES ('Borhan', 'Uddin', 'borhan', 'borhan@gmail.com', 'suhreed', 'www.suhreedsarkar.com', 'Bangladesh', 1)";
	
    if(!$mysqli->query($sql)) {
    	trigger_error($mysqli->error);
    } else {
    	echo "Record inserted successfully. Insert ID is ". $mysqli->insert_id;
    }

	//close conenction
	$mysqli->close();

	