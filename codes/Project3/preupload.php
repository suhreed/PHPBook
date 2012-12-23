<?php 
 include 'config.inc.php'; 
 include_once("design.inc.php");

 // initialization 
 $photo_upload_fields = ''; 
 $counter = 1; 

 // If we want more fields, then use, preupload.php?number_of_fields=20 
 $number_of_fields = (isset($_GET['number_of_fields'])) ? 
   (int)($_GET['number_of_fields']) : 5; 

 // First Let's build the Category List 
 //$mysqli = new mysqli($host, $user, $pass, $db);
 $sql = 'SELECT id, name FROM category'; 
 $stmt = $mysqli->prepare($sql);
 $stmt->execute();
 $stmt->bind_result($id, $name);

 while($stmt->fetch() { 
   $photo_category_list .= "<option value=".$id.">".$name."</option>";
 } 
 
 //$stmt->close(); 

 // Let's build the Image Uploading fields 
 while($counter <= $number_of_fields) { 
   $photo_upload_fields .= "<p> Photo {".$counter."}"
   						."<input name=\"photo_filename[]\" type=\"file\" />"
   						."<br />"
   						."Caption: <textarea name=\"photo_caption[]\" cols=\"30\" rows=\"1\">"
   						."</textarea></p>"; 
   $counter++; 
 } 

 // Final Output 

 echo $header;
 echo		"<form enctype=\"multipart/form-data\" action=\"upload.php\" method=\"post\" name=\"upload_form\">"
			."<p>Select Category: "
			."<select name=\"category\">".$photo_category_list."</select>"
			. $photo_upload_fields
			."<br />"
			."<input type=\"submit\" name=\"submit\" value=\"Add Photos\" />"
			."</form>";
 echo $footer;

?>
