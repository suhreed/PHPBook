<?php
include("bargraph.class.php"); 

$pr=array(3,6,7,4,5,9,4,5,4,2,1,8); 
$p=$pr; 
shuffle($p); 

$g=new BarGraph; 
$g->setHeightWidth(400,600); 
$g->init(); 
//$g-setMax(10); //maximum data possible in the data set 
$g->setBarWidth(10); 
$g->setBarPadding(10); 
$g->setBarColor(255,130,130); 
$g->setBgColor(204,204,204); 
$g->loadData($pr); 
$g->drawGraph(); 

$g->loadData($p); 
$g->setBarColor(130,130,255); 
$g->drawGraph(1); 

$g->renderImage();  