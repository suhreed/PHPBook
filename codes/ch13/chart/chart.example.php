<?php
include('chart.class.php');

//Construct element: BarGraph($width, $height, $title, $tbmargin = 25, $padding = 5)
//Where $tbmargin is the margin on top and below the Chart, and padding is the space between the columns
$bar = new BarChart(800,400, 'PHP BarChart Example');

//Get some colors
$color = array('red','blue','green','orange','yellow','purple','brown');

//$bar->addBar($key, $value, array_pop($color));
$bar->addBar('year1', '200', array_pop($color));
$bar->addBar('year2', '220', array_pop($color));
$bar->addBar('year3', '210', array_pop($color));


//The showBars() method will display info about your current set of bars
//The make() method constructs the Chart
//$bar->make();

//Optionally you can sort the values before making it by calling the sort() method
$bar->sort();
$bar->make();

//You now have two choices:
$bar->sendgif(); //This will print the Chart with header("Content-type: image/gif") and exit
//$bar->makegif('graph.gif'); //This will save the Chart to the GIF file specified
?>