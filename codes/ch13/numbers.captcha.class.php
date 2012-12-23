<?php

class NumberCaptcha {
	var $length = 6;
	var $font = 'arial';
	var $size = 15;
	var $type = 'png';
	var $height = 40;
	var $width = 80;
	var $grid = 10;
	var $string = '';

	/* constructor */	
	function __construct($length = '', $size = '', $type = '') {

		if ($length!='') $this->length = $length;
		if ($size!='') $this->size = $size;
		if ($type!='') $this->type = $type;

		$this->width = $this->length * $this->size + $this->grid;
		$this->height = $this->size + (2 * $this->grid);
		
		$this->generateString();
	}

	//display captcha image		
	function display() {
		$this -> sendHeader();
		$image = $this->generate();

		switch ($this->type) {
			case 'jpeg': 
				imagejpeg($image); 
				break;
			case 'png':  
				imagepng($image);  
				break;
			case 'gif':  
				imagegif($image);  
				break;
			default:     
				imagepng($image);  
				break;
		}
	}

	//generate the image		
	function generate() {
		$image = imagecreate($this->width, $this->height) or die("Cannot Initialize new GD image stream");
		
		// colors
		$background_color = imagecolorallocate($image, 240, 240, 240);
		$net_color = imagecolorallocate($image, 200, 200, 200);
		$stringcolor = imagecolorallocate($image, 0, 0, 0);

		// grid
		for ($i = $this->grid; $i < $this->width; $i+= $this->grid) {
			imageline($image, $i, 0, $i, $this->height, $net_color);
		}

		for ($i = $this->grid; $i < $this->height; $i+= $this->grid) {
			imageline($image, 0, $i, $this->width, $i, $net_color);
		}
		// make the text
		imageTTFText($image, $this->size, 0, $this->grid, $this->size + $this->grid, $stringcolor, $this -> font, $this -> getString());
		
		return $image;
	}


	// generate the string	
	function generateString() {
		$string = '';
		for ($i = 0; $i < $this->length; $i++) {
			$string .= rand(0, 9);
		}

		$this->string = $string;
		return true;
	}


	//send image header
	function sendHeader() {
		header('Content-type: image/' . $this -> type);
	}
	
	///return the string
		
	function getString() {
		return $this -> string;
	}

	function __destruct {
		imagedestroy($image);
	}
}