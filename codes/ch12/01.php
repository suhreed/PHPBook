<?php

function myTest() {
    $a = "This is a local variable within myTest() function.";

    echo 'global $a: ' . $GLOBALS["a"] . "<br />";
    echo 'local $a: ' . $a . "<br />";
}

$a = "This is a global variable outside myTest() function.";

//call the function
myTest();
 