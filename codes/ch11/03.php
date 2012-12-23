<?php

//create PDO instance with DSN, username and password
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

//create query statement
$statement = $pdo->query("SELECT * FROM users");

//get query result as row
$row = $statement->fetch(PDO::FETCH_ASSOC);

//display 'name' column
echo htmlentities($row['name']);
