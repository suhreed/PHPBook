<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

$stmt = $pdo->prepare("SELECT * FROM authors");

$stmt->execute();

$colcount = $stmt->columnCount();
echo "The result set has $colcount columns.";

?>