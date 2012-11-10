<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=php5boo', 'root', '');
    //do other things when connected successfully

} catch (PDOException $e) {
    //shows error messages for unsuccessful connection
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}
