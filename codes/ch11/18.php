<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

$stmt = $pdo->prepare('DELETE FROM authors WHERE id > 9');
$stmt->execute();

echo "Number of rows deleted: ". $stmt->rowCount();

