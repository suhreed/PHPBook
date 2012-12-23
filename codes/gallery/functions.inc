<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "gallery";


/* Lists all categories */
function listCategories() {
  	
  	global $host, $user, $pass, $db;
  	
  	$mysqli = new mysqli($host, $user, $pass, $db);

    //select question
    $sql = "SELECT id, name FROM category ORDER BY name ASC";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($cid, $name);

    $html = "<ul>";    
    while($stmt->fetch()) {
        $html .= '<li><a href="index.php?op=viewCategory&cid='.$cid.'">'. $name .'</a></li>';
    } 
    $html .= "</ul>";
	echo $html;
    
    $stmt->close();
    $mysqli->close();
}


/* lists all photos */
function listPhotos($cid=null) {
	global $host, $user, $pass, $db;
  	
  	$mysqli = new mysqli($host, $user, $pass, $db);

  	if(!empty($cid)){
  		$sql = "SELECT id, filename, caption 
  		   		FROM photos 
  		   		WHERE category_id = $cid 
  		   		ORDER BY id DESC";
  	} else {
  		$sql = "SELECT id, filename, caption 
  		   		FROM photos 
  	    		ORDER BY id DESC";
  	}

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $cid);
    $stmt->execute();
    $stmt->bind_result($pid, $filename, $caption);

    echo "<h2>List of Images";
    while ($stmt->fetch()) {
    	echo "<img src='".$filename."' alt='".$caption ."' />";
    }

    $stmt->close();
    $mysqli->close();
}

/* Shows Category Add/Edit Form */

function showCategoryForm() {
	$html = '<form name="category" action="index.php" method="post">';
	$html .= 'Category Name: <input type="text" name="category_name" value="" />';
	$html .= '<input type="hidden" name="op" value="add_category" />';
	$html .= '<input type="submit" value="Submit" />';
	$html .= '</form>';

	echo $html;
}

/* adds a new category */
function addCategory($category) {
	global $host, $user, $pass, $db;
  	
  	$mysqli = new mysqli($host, $user, $pass, $db);

  	$sql = "INSERT INTO category ('name') VALUES($category)";
  	$stmt->prepare($sql);
  	$stmt->bind_param('s', $category);
  	$stmt->execute();
  	echo "Category $category added successfully!";
}

/* edits an existing category */
function editCategory($cid) {

}

/* deletes a ctageory */
function deleteCategory($cid) {

}

/* adds a photo */
function addPhoto() {

}

/* edits a photo */
function editPhoto($pid) {

}

/* deletes a photo */
function deletePhoto($pid) {

}