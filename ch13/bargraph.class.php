<?php

class BarGraph 
{ 
    var $barWidth; 
    var $imgHeight=400; 
    var $imgWidth=600; 
    var $bgColor,$barColor; 
    var $barPadding; 
    var $data,$rangeMax=10; 
    var $im; 

    function init()  
    { 
        $this->im=imagecreate($this->imgWidth,$this->imgHeight); 
    } 

/** sets the hieght and with of the image **/ 
    function setHeightWidth($h,$w) 
    { 
        $this->imgHeight=$h; 
        $this->imgWidth=$w; 
    } 

/* sets the bar width */
    function setBarWidth($width)  
    { 
        $this->barWidth=$width; 
    } 

/* sets the bar padding */ 
    function setBarPadding($padding) 
    { 
        $this->barPadding=$padding; 
    } 

/* sets the maximum posible value in the data set */
    function setMax($max)  
    { 
        $this->rangeMax=$max; 
    } 

/* load data, the input should be an array */ 
    function loadData($data) 
    { 
        $this->data=$data; 
    } 

/* sets the background color of the image */
    function setBgColor($r,$g,$b)  
    { 
        $this->bgColor=imagecolorallocate($this->im,$r,$g,$b); 
    } 

/* sets the bar color of the image */ 
    function setBarColor($r,$g,$b) 
    { 
        $this->barColor=imagecolorallocate($this->im,$r,$g,$b); 
    } 

/* to draw graphs on the image */ 
    function drawGraph($flag=0) 
    { 
        if($flag) /* flag set to 1 to draw the second bar **/ 
        { 
            $t=$this->barWidth+$this->barPadding; 
        } 
        else /* else draws the first bar set */ 
        { 
            imagefilledrectangle($this->im,0,0,$this->imgWidth,$this->imgHeight,$this->bgColor); 
            $t=0; 
        } 

        for ( $mon = 0 ; $mon < count($this->data) ; $mon ++ )  
        { 
     
            $X = (($this->imgWidth/count($this->data))*$mon) + $this->barPadding + $t; 
            $Y = (10 - $this->data[$mon])*($this->imgHeight/$this->rangeMax); 
            $X1 = ($X + $this->barWidth); 
            $Y1 = $this->imgHeight; 

            imagefilledrectangle($this->im,$X,$Y,$X1,$Y1,$this->barColor); 
        } 
    } 

/* creates the image & sends in to the browser */
    function renderImage()  
    { 
        header("Content-Type: image/png"); 
        imagepng($this->im); 
    } 
}  