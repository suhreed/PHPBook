<?php
include("config.inc.php");
include_once("design.inc.php");

/*********** functions *********************/
$photo_id= $_GET['pid'];
$category_id= $_GET['category_id'];
$op = $_GET['op'];

//add catergory
function add_category( $category_name ) {
  $sql = "INSERT INTO category(`name`) VALUES('".addslashes( $category_name )."' )" );
  $stmt = $mysqli->prepare($sql);
  $stmt->execute();
}

//Edit category
function edit_category( $category_id) {
//first check whether $new_name is set
  if (!isset($new_name)) {
  $update_form = "<form method='GET' action='".$_SERVER['PHP_SELF']."'>
				<input type='hidden' name='op' value='edit_category' /> <br />
				<input type='hidden' name='category_id' value='".$_GET['category_id']."' /> <br />
				Type new name here: <input type=text name='new_name' /><br />
				<input type=submit></form>";
  echo $header;
  echo "<table width='100%' border='0' align='center' style='width: 100%;'>";
  listCategories();
echo "</table>";
echo $update_form;
echo $footer;

} else {
 mysql_query( "UPDATE category SET name='".addslashes( $new_name )."' WHERE id='".addslashes( $category_id )."'" );
 print "The category is renamed to $new_name ";
}
}

//Delete category
function delete_category( $category_id ) {
 global $images_dir;
 $result = mysql_query( "SELECT filename FROM photos WHERE category_id='".addslashes( $category_id )."'" );
 while( $row = @mysql_fetch_array( $result ))
 {
   unlink($images_dir."/".$row[0]);
 }
 mysql_query( "DELETE FROM photos WHERE category_id='".addslashes( $category_id )."'" );
 mysql_query( "DELETE FROM category WHERE id='".addslashes( $category_id )."'" );
}

//Edit Photo
function edit_photo( $photo_id, $new_caption, $new_category ) {
 mysql_query( "UPDATE photo SET caption='".addslashes( $new_caption )."', category_id='".addslashes( $new_category )."' WHERE id='".addslashes( $photo_id )."'"  );
}
//Delete Photo
function delete_photo($photo_id) {
	global $images_dir;
 $result = mysql_query("SELECT filename FROM photos WHERE id = '" . addslashes($photo_id) . "'");
 list($filename) = mysql_fetch_array($result);
 mysql_free_result($result);

 unlink($images_dir . '/' . $filename);

 mysql_query("DELETE FROM photos WHERE id='" . addslashes($photo_id) . "'");
}

function listCategories (){
    $result = mysql_query('SELECT id, name FROM category');

    while($row = mysql_fetch_array($result)) {
     $photo_category_row .= "<tr><td><a href=\"viewgallery.php?cid=".$row['id']."\">".$row['name']."</a></td><td><a href=".$_SERVER['PHP_SELF']."?op=edit_category&category_id=".$row['id'].">Edit </a> | <a href=".$_SERVER['PHP_SELF']."?op=delete_category&category_id=".$row['id']." > Delete </a>";


 }
 print "<strong>List of Categories</strong>";
 print $photo_category_row;
 mysql_free_result( $result );

}

function list_photos(){
  $result = mysql_query( "SELECT id, filename, caption, category_id FROM photos" );
 while( $row = mysql_fetch_array( $result ) ) {

 	$result_array[] = "<a href=\"viewgallery.php?cid=".$row['category_id']."&amp;pid=".$row['id']."\">".$row['caption']." </a> | [<a href=\"admin.php?op=delete_photo&amp;pid=".$row['id']."\">Delete</a> ]";
		}
		mysql_free_result( $result );

		//$result_final = "<tr>\n";

		foreach($result_array as $photo_link)
		{
			$result_final .= "\t<tr>".$photo_link."</tr>\n";
		}
		print "<strong>List of Photos</strong>";
		print "<hr>";
		print $result_final;
		print "<hr />";
}
/***************** End Functions **********************/
/************Build the category list with links to delete and edit ***********/

echo $header;
echo "<table width='100%' border='0' align='center' style='width: 100%;'>";


/*** End category Listing ****************************************************/
switch ($op) {
	case "edit_category":
		edit_category();
		break;

	case "delete_category":
		delete_category();
		break;

	case "delete_photo":
		delete_photo($pid);


	default:
	list_photos();
	listCategories();


}

echo "</table>";
echo $design_footer;
?>