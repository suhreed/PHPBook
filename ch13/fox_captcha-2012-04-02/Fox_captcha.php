<?php
/**
 * Fox_captcha to manipulates captcha verification images.
 * @author Said Bakr
 * @copyright free to use and modify but don't forget my credits i.e mention that it is based on Fox_captcha
 * @version 3.0
 *
 */
class Fox_captcha{
	
	var $img_width;
	var $img_height;
	var $code_length;
	var $fg;
	var $bg;
	var $code;
	var $name_session;// the name of session variable: default = Fox_captcha_ss   
	var $image_dir;
	var $en_reload;
	var $lines_amount;
	var $image;
	/**
	 * The class constructor
	 *
	 * @param int $img_width
	 * @param int $img_height
	 * @param int $code_length
	 * @example less than 10
	 * @return Fox_captcha
	 */
	function Fox_captcha($img_width, $img_height,$code_length, $session_name = ''){      
		if (isset($_SESSION)){
			$this->image = imagecreate($img_width, $img_height);
			// set the parameters to session
			$_SESSION['Fox_CaptchaSSim_width'] = $img_width;
			$_SESSION['Fox_CaptchaSSim_height'] = $img_height;
			$_SESSION['Fox_CaptchaSSim_codeLength'] = $code_length;
			$this->img_width = $img_width;
			$this->img_height = $img_height;
            $_SESSION['FoxCaptchaFilePath'] = __FILE__;
			if ($code_length > 9){
				die("<b>Fox_captcha Error :</b>code_length value should not to be greater than 9.");
			}
			else{
				$this->code_length = $code_length;
			}
		}
		else{
			die("<b>Fox_Captcha Error :</b>Fox_captch could not work without session.");
		}	
		
	}
	/**
	 * Return the random code of captcha
	 * @return string
	 *
	 */
	function code_create(){
      $code = md5(microtime() * time());
      $alpha = array('G','H','I','J','K','X','Q','Y','S','M','L','W','N','Z');
		$cut_start = rand(0,(32-$this->code_length));
		$code = substr($code,$cut_start,$this->code_length);		
		$code = strtoupper($code);
		// removes Zero and Oh 0 O; 
		$code = str_replace('0',$alpha[rand(0,(count($alpha)-1))],$code);
		$code = str_replace('O',rand(1,9),$code);
		$this->code = $code;
		
	}
	function color_set(){
		$red = rand(0,127);
		$green = rand(0,127);
		$blue = rand(0,127);
		$this->bg = imagecolorallocate($this->image, $red, $green, $blue);
		$this->fg = imagecolorallocate($this->image, $red+127, $green+127, $blue+127);		
		
	}
	function line_draw(){		
		if (empty($this->lines_amount)) $this->lines_amount = 5;
		//Set the lines amount to session
		$_SESSION['Fox_CaptchaSSim_linesAmount'] = $this->lines_amount;
		for ($i = 0; $i < $this->lines_amount; $i++){
			imageline($this->image,rand(0,20),rand($this->img_width,100),rand($this->img_height,rand($this->img_width,$this->img_height)),rand(0,$this->img_height),$this->fg);
		}	
	
	}
	
        
	function img_draw(){		
		$this->code_create();
		$this->color_set();		
		$this->line_draw();		
		$x = rand(0,$this->img_width*0.5);
		$y = rand(0,$this->img_height*0.5);
		
		imagestring($this->image,5,$x,$y,$this->code,$this->fg);		
		
		imagestring($this->image,5,$x+1,$y,$this->code,$this->fg);
		
		
		
		
		
	}
	/**
	 * make the final out and set the session variable
	 *
	 * @param string[optional] $state_type
	 * @param string[optional] $name_session	 * 
	 * @example $state_type has only one of two values 1- HTML and it is the default which it is meant by
	 * setting the out put as HTML i.e. creating img tag and a hyper link for reload.
	 * 2- JPG will make the out put as Image. It is not required by the user to use it. It is only set to be used by the classe's object
	 * internaly
	 */
	function make_it($state_type = 'HTML', $name_session = 'Fox_captcha_ss'){
		if ($state_type == 'HTML'){
			$uniqu_id = md5(microtime());
			$this->img_draw();			
			$_SESSION[$name_session] = $this->code;
			$this->name_session = $name_session;
			//setting the reload text link
			if (!isset($this->en_reload)) $this->en_reload = "Reload";
			echo "<img style=\"display:none\" src=\"".$this->image_dir.'fox_captcha_image_loading.gif'."\" />";
			//imagejpeg($this->image,"Fox_captcha_image.jpg");
           // echo "<img alt='fox captcha' src='Fox_captcha_image.jpg' />";
			echo "<script>\n 
				function FoxCaptchaReLoad_ss(){\n
					imCap = document.getElementById('FoxCaptchaImage_".$uniqu_id."');\n
					imCap.src = '$this->image_dir'+'fox_captcha_image_loading.gif';\n
					setTimeout('FoxCaptchaChngImg(imCap)',500);
										
					//return true;\n	
						
				}\n
				function FoxCaptchaChngImg(FCobj){\n
				d = new Date();\n				
				FCobj.src = '".$this->image_dir."fox_captcha_image.php?'+d.getTime();\n	
				
				}
					
				</script>\n
			";
			echo '<img align="middle" alt="Fox Captcha!" id="FoxCaptchaImage_'.$uniqu_id.'" src="'.$this->image_dir.'fox_captcha_image.php"> &nbsp; <a href="javascript:FoxCaptchaReLoad_ss()">'.$this->en_reload.'</a>';
			
		}
		elseif ($state_type == 'JPG'){
			$this->img_draw();
			$_SESSION[$name_session] = $this->code;
			$this->name_session = $name_session;
			header("Content-type: image/jpeg; Cache-Control: no-store, no-cache, must-revalidate");			
			imagejpeg($this->image);
			
			
			
		}
		else {
			die('<b>Fox_captcha Error: Method make_it takes bad arguments.</b>');
		}
		
		
	}
	/**
	 * Testing the submitted value to ensure that the code is obtained by human
	 * it also unset the session variable
	 *
	 * @param string $val
	 * @param string[Optional] $name_session
	 * @return Boolean
	 */
	function test($val, $name_session = 'Fox_captcha_ss'){
      if(empty($_SESSION[$name_session])) return false;
		if (strtoupper($val) == strtoupper($_SESSION[$name_session])){
			unset($_SESSION[$name_session]);			
			return true;
		}
		else {
			unset($_SESSION[$name_session]);			
			return false;
		}
	}
	
		
		
}

?>