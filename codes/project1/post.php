<?php

//get pid from request

$pid = $_REQUEST['id'];

function getPost($id) {
    $mysqli = new mysqli("localhost", "root", "", "myblog");

    //select posts
    $sql = "SELECT p.id, p.title AS title, p.text as text, p.created as created, a.id AS authorID, a.fname AS firstname, a.lname AS lastname FROM posts p, authors a WHERE p.author_id = a.id AND p.id = ? ORDER BY created DESC";
    //prepare statement
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('i', $id);
    
    $stmt->execute();

    $stmt->bind_result($id, $title, $text, $created, $authorID, $firstname, $lastname);

    
    while($stmt->fetch()) {
        $html  = '<div class="post-detail">';
        $html .= '<h1>'.$title .'</h1>';
        $html .= '<address><span class="icon-user"></span> <a href="author.php?aid='.$authorID .'">'. $firstname .' '. $lastname . ' </a>  <span class="icon-calendar"></span> '.date('d M Y h:i:s a', strtotime($created)) .'</address>';
        $html .= '<p>'. nl2br($text) .'</p>';
        $html .= '</div>';

        echo $html;

    }

    $stmt->close();

    $mysqli->close();
    
 }

 /*function to get navigation footer */
 
 function getNavigation() {
    $mysqli = new mysqli("localhost", "root", "", "myblog");

    //select posts
    $sql = "SELECT id, title from posts ORDER BY created DESC";
    
    //prepare statement
    $stmt = $mysqli->prepare($sql);

    $stmt->execute();
    
    $stmt->store_result();

    $stmt->bind_result($id, $title);

    $li ='';

    for($i = 1; $i <= $stmt->num_rows(); $i++) {
        $li .= '<li><a href="post.php?id='.$i.'">'. $i . '</a></li>';
    }

    echo '<ul class="pager">';
    echo $li;
    echo '</ul>';

    $stmt->close();

    $mysqli->close();
    
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog</title>
    
    <!-- Bootstrap stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- to be responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

</head>

<body>

<div class="container-fluid">
    <!-- top navigation bar -->
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">myBlog</a>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="authors.php">Authors</a></li>
                <li><a href="#">Categories</a></li>
            </ul>
        </div>
    </div>
    <!-- main body -->
    <div class="row-fluid">
        <!-- content area -->
        <div class="span9">
            <h2>Post Details</h2>
            <?php
                getPost($pid);
            ?>
            <?php
              getNavigation();
            ?>
        </div>
        <!-- sidebar -->
        <div class="span3">
            <div class="sidebar">
            <h2>Sidebar</h2>
            </div>
        </div> <!--sidebar -->

    </div>
    <!-- footer -->
    <div class="span12">
    <address>Copyright &copy; 2005-2012. Suhreed Sarkar. All rights reserved.</address>
    </div>
    
</div>

<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>