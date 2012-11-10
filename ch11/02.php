<?php

//create database connection instance
$mysqli = new mysqli("localhost", "root", "", "blog");

//set query
$result = $mysqli->query("SELECT * from users");

//get the results as row
$row = $result->fetch_assoc();

//show column 'name'
echo htmlentities($row['name']);
