<?php
	
include("easyChart.class.php");
	
echo'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs" >

<head>
	<link rel="StyleSheet" type="text/css" href="style.css" media="screen" />
	<title>RRsoft - EASY CHART V1.0</title>
	</head>
<body>
';
echo "
	<table  width=\"100%\">
		<tr>
			<td align=\"center\">
";
	// Declaration of new object
	$eChart = &new easyChart();
	
	// Global variables declaration
	$eChart->allow_decimal 		= true;
	$eChart->multipler 			= 1;
	$eChart->show_bottom_value	= true;
	$eChart->show_top_value 	= true;
	$eChart->chart_image		= "chart.gif";
	
	// Chart data values
	$eChart->addValue(0,"nul");
	$eChart->addValue(20,"dva","red");
	$eChart->addValue(200,"tve","#0047bd");
	$eChart->addValue(300,"tri","#00129d");
	$eChart->addValue(500,"pet","#001a7b");
	$eChart->addValue(1000,"tis","#001d68");
	$eChart->addValue(2000,"max","#031d51");
	$eChart->addValue(1512,"mix","#01153d");
	$eChart->addValue(5000,"mix","#000b21");
	// Set title and footer
	$eChart->chart_title_text = "EASY CHART V1.0 ";
	$eChart->chart_footer_text = "<a href=\"http://www.rrsoft.cz\">Powered by RRsoft Copyright (c) 2006</a>";
	// Give full HTML chart text
	$chart = $eChart->getChart();
	
	
echo $chart;
echo
			"</td>
		</tr>
	</table>
</body>
</html>";
?>