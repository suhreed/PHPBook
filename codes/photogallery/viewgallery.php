<?php
include_once("config.inc.php");
include_once("design.inc.php");
// ??????????? ???
$result_array = array();
$counter = 0;

$cid = (int)($_GET['cid']);
$pid = (int)($_GET['pid']);

// ?????????? ??????
if( empty($cid) && empty($pid) ) {
  $number_of_categories_in_row = 4;
  $result = mysql_query( "SELECT c.id, c.name, COUNT(p.id) FROM category as c LEFT JOIN photos as p ON p.category_id = c.id GROUP BY c.id" );
	while( $row = mysql_fetch_array( $result ) ) {
	  $result_array[] = "<a href='viewgallery.php?cid=".$row[0]." '>" .$row[1]."</a> "."(".$row[2].")";
	}

mysql_free_result( $result );

$result_final = "<tr>\n";
      foreach($result_array as $category_link) {
			if($counter == $number_of_categories_in_row) {
				$counter = 1;
				$result_final .= "\n</tr>\n<tr>\n";
			} else
			$counter++;
			$result_final .= "\t<td>".$category_link."</td>\n";
		}
	if($counter){
	   if($number_of_categories_in_row-$counter)
	   $result_final .= "\t<td colspan='". ($number_of_categories_in_row-$counter)." '>&nbsp;</td>\n";
$result_final .= "</tr>";
	  }
   }


// ??????????? ??????
else if( $cid && empty( $pid ) ) {
	$number_of_thumbs_in_row = 5;
	$result = mysql_query( "SELECT id, caption, filename FROM photos WHERE category_id =' ".addslashes($cid)." '" );
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
$result = mysql_query( "SELECT caption, filename FROM photos WHERE id='".addslashes($pid)."'" );
list($photo_caption, $photo_filename) = mysql_fetch_array( $result );
$nr = mysql_num_rows( $result );
mysql_free_result( $result );

if(empty($nr)){
	$result_final = "\t<tr><td>No Photo found</td></tr>\n";
	} else {
	$result = mysql_query( "SELECT name FROM category WHERE id='".addslashes($cid)."'" );
	list($name) = mysql_fetch_array( $result );
	mysql_free_result( $result );

	$result_final .= "<tr>\n\t<td><a href='viewgallery.php'>Categories </a> &gt;	<a href='viewgallery.php?cid=$cid'>$name</a> </td>\n</tr>\n";

$result_final .= "<tr>\n\t<td align='center'><br /> <img src='".$images_dir."/".$filename."' border='0' alt='".$caption."' />	<br /> $caption </td> </tr>";
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