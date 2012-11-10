<?php

class SimpleCaptcha {

function SimpleCaptcha( $params = null )
{
  $this->BackgroundImage = $params['BackgroundImage']; //background image
  $this->BackgroundColor = $params['BackgroundColor'];
  $this->Height = $params['Height']; //image height
  $this->Width = $params['Width']; //image width
  $this->FontSize = $params['Font_Size']; //text font size
  $this->Font = $params['Font']; //text font style
  $this->TextMinimumAngle = $params['TextMinimumAngle'];
  $this->TextMaximumAngle = $params['TextMaximumAngle'];
  $this->TextColor = $params['TextColor'];
  $this->TextLength = $params['TextLength'];
  $this->Transparency = $params['Transparency'];

  $this->generateCode();
  //initially, png is used
  header('Content-type: image/png');
  $this->generateImage($this->Code);

}
//Background Images
function getBackgroundImage() {
   return $this->BackgroundImage;
}

function setBackgroundImage( $background_image = null ) {
   $this->BackgroundImage = $background_image;
}

//Background Color
function getBackgroundColor() {
    return $this->BackgroundColor;
}

function setBackgroundColor( $background_color ) {
   $this->BackgroundColor = $background_color;

}

//Image Height
function getHeight() {
   return $this->Height;
}

function setHeight( $height = null ) {
   $this->Height = $height;
}
//Image Width
function getWidth() {
   return $this->Width;
}

function setWidth( $width = null ) {
   $this->Width = $width;
}
//Font size
function getFontSize() {
   return $this->FontSize;
}

function setFontSize( $size = null ) {
   $this->FontSize = $size;
}

//Font
function getFont() {
   return $this->Font;
}

function setFont( $font = null ) {
   $this->Font = $font;
}

//Text Minimum Angle
function getTextMinimumAngle() {
   return $this->TextMinimumAngle;
}

function setTextMinimumAngle( $minimum_angle = null ) {
   $this->TextMinimumAngle = $minimum_angle;
}

//Text Maximum Angle
function getTextMaximumAngle() {
   return $this->TextMaximumAngle;
}

function setTextMaximumAngle( $maximum_angle = null ) {
   $this->TextMaximumAngle = $maximum_angle;
}

//Text Color
function getTextColor() {
   return $this->TextColor;
}

function setTextColor( $text_color ) {
   $this->TextColor = $text_color;
}

//Text Length
function getTextLength() {
   return $this->TextLength;
}

function setTextLength( $text_length = null ) {
   $this->TextLength = $text_length;
}

//Transparency
function getTransparency() {
   return $this->Transparency;
}

function setTransparency( $transparency = null ) {
   $this->Transparency = $transparency;
}

//get Captcha Code
function getCode() {
return $this->Code;
}

//Generate Captcha
function generateCode() {
        $length = $this->getTextLength();
        $this->Code = "";
        while(strlen($this->Code)<$length){
            mt_srand((double)microtime()*1000000);
            $random=mt_rand(48,122);
            $random=md5($random);
            $this->Code .= substr($random, 17, 1);
        }

        return $this->Code;
}


function generateImage($text = null) {
  $im = imagecreatefrompng( $this->getBackgroundImage() );
  $tColor = $this->getTextColor();
  $txcolor = $this->colorDecode($tColor);
  $bcolor = $this->getBackgroundColor();
  $bgcolor = $this->colorDecode($bcolor);
  $width = $this->getWidth();
  $height = $this->getHeight();
  $transprency = $this->getTransparency();
  $this->im = imagecreate($width,$height);
  $imgColor = imagecolorallocate($this->im, $bgcolor[red], $bgcolor[green], $bgcolor[blue]);
  imagecopymerge($this->im,$im,0,0,0,0,$width,$height,$transprency);
  $textcolor = imagecolorallocate($this->im, $txcolor[red], $txcolor[green], $txcolor[blue]);
  $font = $this->getFont();
  $fontsize=$this->getFontSize();
  $minAngle = $this->getTextMinimumAngle();
  $maxAngle = $this->getTextMaximumAngle();
  $length = $this->getTextLength();

  for($i=0;$i<$length;$i++){
  imageTTFtext(
               $this->im,
               $fontsize,
               rand(-$minAngle,$maxAngle),
               $i*15+10,
               $this->FontSize*1.2,
               $textcolor,
               $font,
               substr($text, $i, 1));
  }

  imagepng($this->im);
  imagedestroy($this->im);
}

function colorDecode( $hex ){

   if(!isset($hex)) return FALSE;

   $decoded[red] = hexdec(substr($hex, 0 ,2));
   $decoded[green] = hexdec(substr($hex, 2 ,2));
   $decoded[blue] = hexdec(substr($hex, 4 ,2));

   return $decoded;

 }

}
