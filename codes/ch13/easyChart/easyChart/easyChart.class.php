<?php
/*
 * EASY CHART V1.0 get HTML easy chart review
 * -------------------------------------------
 *
 * This source file is subject RRSOFT RS system.
 *
 * @link       http://www.rrsoft.cz/
 * @author     Radek Roza <radek.roza@rrsoft.cz>
 * @copyright  Copyright (c) 2006 Radek Roza - RRSOFT
 * @license    RRSOFT GNU GENERAL PRIVATE LICENSE
 * @package    RRSOFT-RS-SYSTEM
 * @category   Text Redaction System
 * @version    1.0 for PHP4 & PHP5 $Date: 2006-11-03 
 */

class easyChart {
	
    /**
     * Count of chart collums
     * @var integer
     */
	var $colls;
    /**
     * Max value from data_array
     * @var integer
     */
	var $max_val;
    /**
     * Chart title text
     * @var string
     */
	var $chart_title_text;
    /**
     * Chart footer text.
     * If value is NULL, then footer will be hidden
     * @var string
     */
	var $chart_footer_text;
    /**
     * Global data array.
     * Format is: array(value,text caption,background color)
     * If last param is EMPTY, background color will get from CSS.
     * @var array
     */
	var $data_array 		= array();
    /**
     * Global caption array.
     * @var array
     */
	var $text_array 		= array();
    /**
     * Global background color array.
     * @var array
     */
	var $bcol_array 		= array();
    /**
     * Show/hidde top caption text.
     * @var integer
     */
	var $show_top_value 	= true;
    /**
     * Show/hidde bottom caption text.
     * @var integer
     */
	var $show_bottom_value 	= true;

    /**
     * Class constructor.
     */
	function easyChart() {
		// Set all init variables
		$this->var_init();
	}
	
	
	function var_init() {
	    /**
	     * Global EASY CHART CSS class name.
	     */ 
		$this->css_table 		= "easyChart";
	    /**
	     * Title CSS class name.
	     */
		$this->css_title 		= "easyChart_title";
	    /**
	     * Footer CSS class name.
	     */
		$this->css_footer 		= "easyChart_footer";
	    /**
	     * Top label CSS class name.
	     */
		$this->css_label_top 	= "easyChart_label_top";
	    /**
	     * Middle chart label CSS class name.
	     */
		$this->css_label_middle = "easyChart_label_middle";
	    /**
	     * Bottom label CSS class name.
	     */
		$this->css_label_bootom = "easyChart_label_bottom";
	    /**
	     * Name of chart image used for interfsace.
	     */
		$this->chart_image 		= "chart.gif";
	    /**
	     * Set width of each chart collum to defined value.
	     */
		$this->chart_col_width 	= 0;
	    /**
	     * Set width of chart picture. Should be the same like image width size.
	     */
		$this->chart_pic_width 	= 16;
	    /**
	     * This value multiply chart picture. 
	     */
		$this->multipler 		= 1;
	    /**
	     * Allow/Deny show in label decimal number.
	     */
		$this->allow_decimal 	= 1;
	    /**
	     * Control global hight of chart table.
	     */
		$this->high_offset 		= 0;
	}
	
	/**
	 * Put variables to array.
	 * $value    -> chart values
	 * $text     -> text label
	 * $bgcolor  -> background color
	 *
	 * @param integer $value
	 * @param string $text
	 * @param string $bgcolor
	 */
	function addValue($value,$text,$bgcolor="") {
		
		array_push($this->data_array,$value);
		
		array_push($this->text_array,$text);
		
		array_push($this->bcol_array,$bgcolor);
		
	}
	
	/**
	 * Give formated top value
	 *
	 * @param integer $value
	 * @param integer $max_val
	 * @return string
	 */
	function getTopValue($value,$max_val) {
		
		$px = ($value * 100 / $max_val);
		
		if ($this->show_top_value){
			
			if ($this->allow_decimal){
				
				return "$px%";
				
			}else{
				
				return round($px)."%";
			}
			
		}else{
			
			return "";
		}
	}
	
	/**
	 * Main calculation process
	 *
	 * @param integer $value
	 * @param integer $max_val
	 * @return integer
	 */
	function calcVal_coll($value,$max_val) {
		
		$px = ($value * 100 / $max_val*$this->multipler);
		
		return $px+1;
	}
	
	/**
	 * Give bottom values
	 *
	 * @param integer $value
	 * @return string
	 */
	function getBottomVal($value) {
		
		if ($this->show_bottom_value){
			
			return $value;
			
		}else{
			
			return "";
			
		}
	}

	/**
	 * Main function, give full chart such HTML code
	 *
	 * @return string
	 */
	function getChart() {
		
		$this->colls = count($this->data_array);
		
		if ($this->max_val > 0){
			
			$this->max_var = $this->max_val;
			
		}else{
			
			$this->max_var = max($this->data_array);
			
		}
		
		$str .= "\r<!-- RRSOFT EASY CHART V1.0 -->\n\r";
		$str .= "\r<!-- www.rrsoft.cz; info@rrsoft.cz -->\n\r";
		$str .= "\r<!-- START EASYCHART CODE -->\n\r";
		$str .= "<table class=\"$this->css_table\">\n\t";
		$str .= "<tr>\n\t<td colspan=\"$this->colls\" class=\"$this->css_title\">$this->chart_title_text</td>\n</tr>\n";
		$str .= "<tr>\n\t".$this->getColls($this->colls)."</tr>";
		
		if ($this->chart_footer_text<>""){
			
			$str .= "<tr>\n\t<td colspan=\"$this->colls\" class=\"$this->css_footer\">$this->chart_footer_text</td></tr>";
			
		}
		
		$str .= "</table>\n";
		$str .= "<!-- END EASYCHART CODE -->\n";
		
		return $str;
	}

	/**
	 * Give full HTML text of each collum.
	 *
	 * @param integer $cols
	 * @return string
	 */
	function getColls($cols) {

		for ($i=0;$i < $cols;$i++) {
			
			$px = $this->getTopValue($this->data_array[$i],$this->max_var);
			
			if ($this->chart_image !=false){
				
				$h_val 	 = $this->calcVal_coll($this->data_array[$i],$this->max_var);
				
				$bcol 	 = 0;
				
				$col_val = 0;
				
			}else{
				
				$col_val = $this->calcVal_coll($this->data_array[$i],$this->max_var);
				
				$bcol 	 = $this->bcol_array[$i];
				
				$h_val	 = 0;
				
			}
			
			$str .= "<td class=\"$this->css_label_top\" valign=\"bottom\" height=\"$this->high_offset\">\n\t";
			$str .= "<table class=\"$this->css_table\">\n\t";
			$str .= "<tr><td class=\"$this->css_label_top\">$px</td></tr>\n";
			$str .= "<tr><td style=\"background-color: $bcol;\" class=\"$this->css_label_middle\" height=\"$col_val\" width=\"$this->chart_col_width\"><img src=\"$this->chart_image\" width=\"$this->chart_pic_width\" height=\"$h_val\" alt=\"\" border=\"0\" /></td></tr>\n";
			$str .= "<tr><td class=\"$this->css_label_bootom\">".$this->getBottomVal($this->text_array[$i])."</td></tr>\n";
			$str .= "</table>\n</td>\n";
		}
		return $str;
	}

}
?>