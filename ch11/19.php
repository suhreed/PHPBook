<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

$stmt = $pdo->prepare('SELECT * FROM authors');
$stmt->execute();

echo "Number of rows returned: ". $stmt->rowCount();
