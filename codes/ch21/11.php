<?php

/* Connect to the MySQL database */
$db_connection = mysql_connect("localhoast", "root", "");

/* Select the my database */
$db = mysql_select_db ("my", $db_connection);

/* Store the query to be executed in a variable */
$query = "SELECT FirstName, LastName FROM Owner";
