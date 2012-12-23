<?php

$mysqli = new mysqli("localhost", "root", "", "blog");

$query = "SELECT * FROM authors";

if ($result = $mysqli->query($query)) {
    echo "There are ". mysqli_num_fields($result) ." fields in this table.";
    $result->close();
}

$mysqli->close();

?>