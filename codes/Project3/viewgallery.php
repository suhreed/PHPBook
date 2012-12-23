<?php

include_once("config.inc.php");
include_once("design.inc.php");

// ??????????? ???
$result_array = array();
$counter = 0;

$cid = (int)($_GET['cid']);
$pid = (int)($_GET['pid']);

// 
if( empty($cid) && empty($pid) ) {
  $number_of_categories_in_row = 4;
  $sql = "SELECT c.id, c.name, COUNT(p.id) 
  		  FROM category as c 
  		  LEFT JOIN photos as p 
  		  ON p.category_id = c.id 
  		  GROUP BY c.id" );
  $stmt->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($category_id, $category, $photonum);
  while($stmt->fetch()) {
  	$html .="<a href='gallery.php?cid=".$category_id."'>". $category . "</a> ($photonum)";
  }
  
   echo $html;
   
  $stmt->close();
   
  }
  

// ??????????? ??????
else if( $cid && empty( $pid ) ) {
	$number_of_thumbs_in_row = 5;
	$result = mysql_query( "SELECT photo_id, photo_caption, photo_filename FROM gallery_photos WHERE photo_category=' ".addslashes($cid)." '" );
	$nr = mysql_num_rows( $result );

	if( empty( $nr ) ) {
	  $result_final = "\t<tr><td>No Category found</td></tr>\n";
	  } else {
		while( $row = mysql_fetch_array( $result ) ) {
		  $result_array[] = "<a href='viewgallery.php?cid=$cid&pid=" .$row[0]."'><img src='".$images_dir."/tb_".$row[2]."' border='0' alt='".$row[1]."' /></a>";
		}
	mysql_free_result( $result );
	$result_final = "<tr>\n";
	foreach($result_array as $thumbnail_link) {
		if($counter == $number_of_thumbs_in_row) {
				$counter = 1;
				$result_final .= "\n</tr>\n<tr>\n";
		} else
		$counter++;
$result_final .= "\t<td>".$thumbnail_link."</td>\n";
	}

if($counter){
	if($number_of_photos_in_row-$counter)
 $result_final .= "\t<td colspan='".($number_of_photos_in_row-$counter)."'>&nbsp;</td>\n";
 $result_final .= "</tr>";
	}
  }
}

// ????? ???? ????? ??????
else if( $pid ) {
$result = mysql_query( "SELECT photo_caption,photo_filename FROM gallery_photos WHERE photo_id='".addslashes($pid)."'" );
list($photo_caption, $photo_filename) = mysql_fetch_array( $result );
$nr = mysql_num_rows( $result );
mysql_free_result( $result );

if(empty($nr)){
	$result_final = "\t<tr><td>No Photo found</td></tr>\n";
	} else {
	$result = mysql_query( "SELECT category_name FROM gallery_category WHERE category_id='".addslashes($cid)."'" );
	list($category_name) = mysql_fetch_array( $result );
	mysql_free_result( $result );

	$result_final .= "<tr>\n\t<td><a href='viewgallery.php'>Categories </a> &gt;	<a href='viewgallery.php?cid=$cid'>$category_name</a> </td>\n</tr>\n";

$result_final .= "<tr>\n\t<td align='center'><br /> <img src='".$images_dir."/".$photo_filename."' border='0' alt='".$photo_caption."' />	<br /> $photo_caption </td> </tr>";
	}
}

// ???????? ?????? ???? ??????
//?????? ?????????? ????? ???
echo $design_header;
//????? ????? ?? ??????
echo "<table width='100%' border='0' align='center' style='width: 100%;'>";
//?????? ?????? ??????
echo $result_final;
//????? ???
echo "</table>";
//?????????? ????? ???
echo $design_footer;
?>