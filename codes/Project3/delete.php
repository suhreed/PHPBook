<?php
include_once("config.inc.php");
include_once("design.inc.php");
// initialization

$pid = (int)($_GET['pid']);

// Category Listing
function delete_photo($photo_id) { 
	global $mysql_link, $images_dir;
	$result = mysql_query("SELECT photo_filename FROM gallery_photos WHERE photo_id = '" .addslashes($photo_id) . "'");  
	
 list($filename) = mysql_fetch_array($result); 
 mysql_free_result($result); 

 unlink($images_dir . '/' . $filename); 

 mysql_query("DELETE FROM gallery_photos WHERE photo_id='" . addslashes($photo_id) . "'"); 
 echo "<strong> Successfully deleted image $photo_id </strong>";
}


// Final Output
echo $design_header;
delete_photo($pid);
echo $design_footer;

?>
