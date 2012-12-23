<?php

//define connection with hostname, username and password
$con = mysql_connect("localhost", "root", "");
//select the database
mysql_select_db("blog");
//set the query
$result = mysql_query("SELECT * FROM users");
//get the result of query
$row = mysql_fetch_assoc($result);
//display the column 'name'
echo htmlentities($row['name']);
