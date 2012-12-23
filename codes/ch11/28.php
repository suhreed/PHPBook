<?php

$mysqli = new mysqli("localhost", "root", "", "blog");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SHOW TABLES FROM blog";

if ($result = $mysqli->query($query)) {

    /* fetch object array */
    while ($row = $result->fetch_row()) {
        printf ("%s \n", $row[0]);
    }

    /* free result set */
    $result->close();
}

/* close connection */
$mysqli->close();

?>