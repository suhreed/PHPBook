<?php
include_once("class.person_2.php");

// create instance
$baby = new Person;
$baby->name = "Mr. Baby";
$baby->weight = 28;

// retrieve properties
echo $baby->name." weighs ".$baby->weight." kg\n";

// call eat()
$baby->eat("Burger", 500);
$baby->eat("Cashew Nuts", 500);

// retrieve new values
echo $baby->name." now weighs ".$baby->weight." kg\n";

?>