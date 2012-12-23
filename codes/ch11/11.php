<?php

try {
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $dbname ="php5books";

    $pdo->query('CREATE DATABASE ' .$dbname);
    //other things

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
