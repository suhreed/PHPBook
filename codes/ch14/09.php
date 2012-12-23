<?php

$today = new DateTime();
echo "Today's date: ". $today->format('Y-m-d H:i:s')."<br />";
echo "<br/>";

$anotherday = new DateTime('2011-8-20 10:12:45');
echo "Another day: ". $anotherday->format('Y-m-d H:i:s A'); 
echo "<br/>";

echo "Another day in another format: ". $anotherday->format('d-m-Y H:i:s a');
echo "<br/>";

//Tomorrow's date
$tomorrow = new DateTime("tomorrow");
echo "Tomorrow: ". $tomorrow->format('Y-m-d');
echo "<br/>";

//Today's date
$today = new DateTime('now');
echo "Today: ". $today->format('Y-m-d');

echo "<br/>";

//Yesterday
$yesterday = new DateTime('yesterday');
echo "Yesterday : ". $yesterday->format('Y-m-d');