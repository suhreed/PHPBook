<?php
//include 'latest_posts.php';

//database connection info
$host="localhost";
$user = "root";
$pass = "";
$db = "myblog";

//establish database connection
$mysqli = new mysqli($host, $user, $pass, $db);

//select posts
$sql = "SELECT p.id, p.title AS title, p.text as text, p.created as created, a.id AS authorID, a.fname AS firstname, a.lname AS lastname FROM posts p, authors a WHERE p.author_id = a.id ORDER BY created DESC";

//query database and store result for use
$result = $mysqli->query($sql, MYSQLI_STORE_RESULT);


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
                <li><a href="#">Categories</a></li>
            </ul>
        </div>
    </div>
    <!-- main body -->
    <div class="row-fluid">
        <!-- content area -->
        <div class="span9">
            <h1>Welcome to my blog!</h1>
            <?php
            while ($post = $result->fetch_object()) {
                echo '<div class="post">';
                echo '<h3><a href="post.php?id='.$post->id.'">'.$post->title . '</a></h3>';
                echo '<address><span class="icon-user"></span> <a href="author.php?aid='.$post->authorID .'">'. $post->firstname .' '. $post->lastname . ' </a> <span class="icon-calendar"></span> '. date("d M Y h:i:s a", strtotime($post->created)) .'</address>';
                echo '<p>'.substr($post->text, 0, 250).' ... <a class="btn btn-primary" href="post.php?id='.$post->id .'">read more...</a></p>.';
                echo "<hr />";
                echo "</div>";
            }
            
            $result->close();
            
            ?>
        </div>
        <!-- sidebar -->
        <div class="span3">
            <div class="sidebar">
            <h2>Sidebar</h2>
            <?php
                include_once('sidebar.php');

                //show latest posts
                getLatestPosts();

                //get  authors
                getAuthorsList();
            ?>
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