<?php

class BarChart
{
	private $height = 0;
	private $width = 0;
	private $margin_topbottom = 0;
	private $padding = 0;
	private $title = '';
	private $image;
	private $values = array();
	private $names = array();
	private $colors = array();
	private $colorcodes = array();
	private $index = array();
	private $curel = 0;
	private $leftmar = 3;
	
	function __construct($width, $height, $title, $tbmargin = 25, $padding = 5)
	{
		$this->height = $height;
		$this->width = $width;
		$this->margin_topbottom = $tbmargin;
		$this->padding = $padding;
		$this->title = $title;
		$this->image = imagecreate($width, $height);
		$this->colorcodes = array(
						'white' => imagecolorallocate($this->image, 255, 255, 255),
						'black' => imagecolorallocate($this->image, 0, 0, 0),
						'grey' => imagecolorallocate($this->image, 0xD3, 0xD3, 0xD3), 
						'red' => imagecolorallocate($this->image, 255, 0, 0),
						'blue' => imagecolorallocate($this->image, 0, 0, 255),
						'green' => imagecolorallocate($this->image, 0x33, 0x66, 0x33), 
						'orange' => imagecolorallocate($this->image, 0xFF, 0x99, 0x00),
						'yellow' => imagecolorallocate($this->image, 0xFF, 0xFF, 0x99),
						'purple' => imagecolorallocate($this->image, 0x99, 0x33, 0x99),
						'brown' => imagecolorallocate($this->image, 0xCC, 0x66, 0x33)
						);
	}
	
	function addBar($name, $value, $color)
	{
		if (!array_key_exists($color, $this->colorcodes))
		{
			return FALSE;
		}
		$this->names[$this->curel] = $name;
		$this->values[$this->curel] = $value;
		$this->colors[$this->curel] = $color;
		$this->index[$this->curel] = $this->curel;
		$this->curel++;
		return TRUE;
	}
	
	function addColor($name, $hex1, $hex2, $hex3)
	{
		$this->colorcodes[$name] = imagecolorallocate($this->image, $hex1, $hex2, $hex3);
	}
	
	function showBars()
	{
		print_r($this->names);
		echo "\n";
		print_r($this->values);
	}
	
	function sort()
	{
		//Sort arrays
		$copy = $this->values;
		rsort($copy, SORT_NUMERIC);
		for ($s = 0; $s < $nv; $s++)
		{$this->index[$s] = array_search($copy[$s], $this->values);}
	}
	
	function make()
	{
		//Figure out value
		$mx = max($this->values); //Highest value
		$nv = sizeof($this->values); //Find number of values
		$cwidth = floor((($this->width - (($nv+2)*$this->padding))/$nv) + 0.5); //Column width
		$ysize = $this->height - (2*$this->margin_topbottom); //Height of bar content
		$xsize = ($nv * $cwidth) + ($this->padding * ($nv+1)); //Width of bar content
		$ysteps = $ysize/$mx;
		
		//Set title
		$txtsz = imagefontwidth(3) * strlen($this->title);
		$xpos = (int)($this->margin_topbottom + ($xsize - $txtsz)/2);
		$xpos = max(1, $xpos); //Force positive
		$ypos = 3; //From top
		imagestring($this->image, 3, $xpos, $ypos, $this->title, $this->colorcodes['black']);
		
		//Label x-axis
		$labelfont = 2;
		for ($i = 0; $i < $nv; $i++)
		{
			$idx = $this->index[$i];
			$xval = $this->names[$idx];
			$yval = $this->values[$idx];
			$wherexstart = $this->leftmarg + ($this->padding*($i)) + ($i * $cwidth);
			$wherexend = $wherexstart + $cwidth;
			$whereytop = $this->margin_topbottom + (int)($ysize - (($yval > 0 ? $yval : 0) * $ysteps));
			$whereybottom = $this->margin_topbottom + $ysize;
			
			imagerectangle($this->image, $wherexstart-1, $whereytop-1, $wherexend+1, $whereybottom+1, $this->colorcodes['black']);
			imagefilledrectangle($this->image, $wherexstart, $whereytop, $wherexend, $whereybottom, $this->colorcodes[$this->colors[$idx]]);
			
			//Print y values
			$txtsz = imagefontwidth(2) * strlen($yval);
			$xpos = $wherexstart + (int)(($cwidth - $txtsz) / 2);
			$ypos = $whereytop + ($whereytop > ($this->height / 2) ? -imagefontheight(2)-3 : imagefontheight(2)+3);
			imagestring($this->image, 2, $xpos, $ypos, $yval, ($this->colors[$idx] == 'black' ? $this->colorcodes['white'] : $this->colorcodes['black']));
			
			//Labels
			$txtsz = imagefontwidth($labelfont) * strlen($xval);
			$xpos = $wherexstart + (int)(($cwidth - $txtsz) / 2);
			$xpos = max($wherexstart, $xpos);
			$ypos = $whereybottom + 3;
			
			imagestring($this->image, $labelfont, $xpos, $ypos, $xval, $this->colorcodes['black']);
		}
	}
	
	function makegif($file)
	{
		imagegif($this->image, $file);
	}
	
	function sendgif()
	{
		header("Content-type: image/gif");
		imagegif($this->image);
		exit;
	}
	
	function __destruct()
	{
		imagedestroy($this->image);
	}
};
?>