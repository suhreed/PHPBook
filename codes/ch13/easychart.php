<?php
require_once("easychart.class.php");
  //header('Content-type: image/jpeg');
  $chart = new easyChart();                        // Object initialized 

  $chart->setTitle("Sales in 2005");  // Title of Chart 
  $chart->setBackground("153,204,102");            // Background of chart  [opt] 
  $chart->setLineColor("225,225,225");             // Line color separator [opt] 
  $chart->setBarColor("255,0,255");              // Bar color            [opt] 
  $chart->setTitleColor("0,0,255");             // Color Title          [opt] 
  $chart->setLegendColor("255,0,0");                 // Legend Color         [opt] 
  $chart->setBarInfoColor("0,0,255");                // Bar Info Color       [opt] 

  $chart->setWidth(600);                           // Width of Chart 
  $chart->setHeight(500);                          // Height of Chart 
  $chart->setBarWidth(20);                         // Bar Width 
  $chart->setLeftSpace(75);                        // Left Space 
  $chart->setRightSpace(25);                       // Right Space 
  $chart->setLeftLegend(10);                       // Left Legend 

  $chart->addBar("Jan",12000000);                  // Sample content of chart 
  $chart->addBar("Feb",15000000); 
  $chart->addBar("Mar",10000000); 
  $chart->addBar("Apr",9000000); 
  $chart->addBar("May",18000000); 
  $chart->addBar("Jun",12000000); 
  $chart->addBar("Jul",6900000); 
  $chart->addBar("Aug",14000000); 
  $chart->addBar("Sep",12000000); 
  $chart->addBar("Oct",17000000); 
  $chart->addBar("Nov",14000000); 
  $chart->addBar("Dec",9000000); 

  $chart->prepare();                               // Chart Preparation 
  $chart->generateChart();                         // Chart Generation 
?>