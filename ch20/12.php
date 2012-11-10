<?php 

function dateLang () { 
        return strftime("%A"); 
} 

$xsl = new DomDocument(); 
$xsl->load("datetime.xsl"); 
$inputdom = new DomDocument(); 
$inputdom->load("today.xml"); 

$proc = new XsltProcessor(); 
$proc->registerPhpFunctions(); 

// Load the documents and process using $xslt 
$xsl = $proc->importStylesheet($xsl); 

/* transform and output the xml document */ 
$newdom = $proc->transformToDoc($inputdom); 

print $newdom->saveXML(); 

?> 
