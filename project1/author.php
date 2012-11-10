<?php

//get aid from request
$aid = $_REQUEST['aid'];

function getAuthor($id) {
    $mysqli = new mysqli("localhost", "root", "", "myblog");

    //select posts
    $sql = "SELECT id, fname, lname, email, twitter, web, profile, photo FROM authors WHERE id = ?";
    //prepare statement
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('i', $id);
    
    $stmt->execute();

    $stmt->bind_result($id, $fastname, $lastname, $email, $twitter, $web, $profile, $photo );

    
    while($stmt->fetch()) {
        $html  = '<div class="author-detail">';
        $html .= '<h1>'.$fastname .' '. $lastname .'</h1>';
        $html .= '<img src="'.$photo .'" width="200px" height="200px" align="right" class="img-polaroid" alt="Profile Picture" />';
        $html .= '<address><span class="icon-envelope"></span> '.$email .'<br/>';
        $html .= '<span class="icon-retweet"></span> ' . $twitter .'<br/>';
        $html .= '<span class="icon-home"></span> <a href="'.$web .'"> '. $web .'</a></adress>';
        $html .= '<p>'. nl2br($profile) .'</p>';
        $html .= '</div>';

        echo $html;
    }

    $stmt->close();

    $mysqli->close();
    
 }

 /*function to get navigation footer */
 
 function getPostsByAuthor($aid) {
    $mysqli = new mysqli("localhost", "root", "", "myblog");

    //select posts
    $sql = "SELECT id, title FROM posts WHERE author_id = ? ORDER BY created DESC";
    
    //prepare statement
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('i', $aid);

    $stmt->execute();
    
    $stmt->store_result();

    $stmt->bind_result($id, $title);

    $li ='';
 

   while($stmt->fetch()) {
       $li .= '<li><a href="post.php?id='.$id.'">'. $title . '</a></li>';
    }

    echo "<h4>Posts by this writer ... </h4>";
    echo '<ol>';
    echo $li;
    echo '</ol>';

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
            <h4>About the author</h4>
            <?php
                getAuthor($aid);
            ?>
            <?php
               getPostsByAuthor($aid);
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