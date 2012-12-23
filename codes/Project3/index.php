<?php

require_once 'functions.inc.php';

echo "<h1>Photo Gallery</h1>";
echo "<a href='index.php?op=addCategory'>Add Categry</a>";

//listCategories();

$op = $_REQUEST['op'];
$cid = (int) $_REQUEST['cid'];
$pid = (int) $_REQUEST['pid'];
$category_name = $_POST['category_name'];


switch($op) {
	case viewCategory:
		listPhotos($cid);
		break;

	case listCategories:
		listCategories;
		break;
	case addCategory:
		showCategoryForm();
		break;

	case add_category:
		addCategory($_POST('category_name'));
		break;

	default:
		listCategories();
}