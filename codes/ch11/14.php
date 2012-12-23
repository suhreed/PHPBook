<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
    //set sql
	$sql = "CREATE TABLE `authors` (
	  `id` int(10) NOT NULL AUTO_INCREMENT,
	  `first_name` varchar(20) NOT NULL,
	  `last_name` varchar(20) NOT NULL,
	  `username` varchar(10) NOT NULL,
	  `user_email` varchar(50) NOT NULL,
	  `user_twitter` varchar(50) NOT NULL,
	  `user_web` varchar(50) DEFAULT NULL,
	  `country` varchar(30) DEFAULT NULL,
	  `sex` int(1) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
	
	if($pdo->query($sql)) {
		echo "Table created successfully.";
	}


} catch (PDOException $e) {
    //shows error messages for unsuccessful connection
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}
