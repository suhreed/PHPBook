<?
/**
* Captcha File
* Generates CAPRCHA Numbers Image
* @author Hadar Porat <hpman28@gmail.com>
* @version 1.5
* GNU General Public License (Version 2, June 1991)
*
* This program is free software; you can redistribute
* it and/or modify it under the terms of the GNU
* General Public License as published by the Free
* Software Foundation; either version 2 of the License,
* or (at your option) any later version.
*
* This program is distributed in the hope that it will
* be useful, but WITHOUT ANY WARRANTY; without even the
* implied warranty of MERCHANTABILITY or FITNESS FOR A
* PARTICULAR PURPOSE. See the GNU General Public License
* for more details.
*/

/**
* CaptchaNumbers Class
* @access public
* @author Hadar Porat <hpman28@gmail.com>
* @version 1.51
*/


class CaptchaNumbers {
	var $length = 6;
	var $font = 'arial';
	var $size = 15;
	var $type = 'png';
	var $height = 40;
	var $width = 80;
	var $grid = 10;
	var $string = '';

	/**
	* @return void
	* @param int $length string length
	* @param int $size font size
	* @param String $type image type
	* @desc generate the main image
	*/	
	function CaptchaNumbers($length = '', $size = '', $type = '') {

		if ($length!='') $this -> length = $length;
		if ($size!='') $this -> size = $size;
		if ($type!='') $this -> type = $type;

		$this -> width = $this -> length * $this -> size + $this -> grid;
		$this -> height = $this -> size + (2 * $this -> grid);
		
		$this -> generateString();
	}

	/**
	* @return void
	* @desc display captcha image
	*/		
	function display() {
		$this -> sendHeader();
		$image = $this -> generate();

		switch ($this-> type) {
			case 'jpeg': imagejpeg($image); break;
			case 'png':  imagepng($image);  break;
			case 'gif':  imagegif($image);  break;
			default:     imagepng($image);  break;
		}
	}

	/**
	* @return Image
	* @desc generate the image
	*/		
	function generate() {
		$image = ImageCreate($this -> width, $this -> height) or die("Cannot Initialize new GD image stream");
		
		// colors
		$background_color = ImageColorAllocate($image, 240, 240, 240);
		$net_color = ImageColorAllocate($image, 200, 200, 200);
		$stringcolor = ImageColorAllocate($image, 0, 0, 0);

		// grid
		for ($i = $this -> grid; $i < $this -> width; $i+=$this -> grid) ImageLine($image, $i, 0, $i, $this -> height, $net_color);
		for ($i = $this -> grid; $i < $this -> height; $i+=$this -> grid) ImageLine($image, 0, $i, $this -> width, $i, $net_color);

		// make the text
		ImageTTFText($image, $this -> size, 0, $this -> grid, $this -> size + $this -> grid, $stringcolor, $this -> font, $this -> getString());
		
		return $image;
	}


	/**
	* @return String
	* @desc generate the string
	*/	
	function generateString() {
		$string = '';
		for ($i = 0; $i<$this -> length; $i++) {
			$string .= rand(0, 9);
		}

		$this -> string = $string;
		return true;
	}


	/**
	* @return void
	* @desc send image header
	*/
	function sendHeader() {
		header('Content-type: image/' . $this -> type);
	}
	
	/**
	* @return String
	* @desc return the string
	*/	
	function getString() {
		return $this -> string;
	}
}