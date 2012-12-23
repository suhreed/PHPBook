<?php 

/* load the xml file and stylesheet as domdocuments */ 
$xsl = new DOMDocument(); 
$xsl->load("articles.xsl"); 

$xml = new DOMDocument();
$xml->load("articles.xml"); 

/* create the processor and import the stylesheet */ 

$proc = new XSLTProcessor();
$xsl = $proc->importStylesheet($xsl); 
$proc->setParameter(null, "titles", "Titles"); 

/* transform and output the xml document */ 
$newxml = $proc->transformToDoc($xml); 
echo $newxml->saveXML(); 

?> 