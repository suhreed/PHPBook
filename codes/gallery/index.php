<?php
//include 'latest_posts.php';

//database connection info
$host="localhost";
$user = "root";
$pass = "";
$db = "gallery";

//establish database connection
//$mysqli = new mysqli($host, $user, $pass, $db);

function getCategories() {
    global $host, $user, $pass, $db;
    
    $mysqli = new mysqli($host, $user, $pass, $db);

    $sql = "SELECT id, name FROM category ORDER BY name";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($id, $name);

    while($stmt->fetch()) {
            $html = '<ul class="categories">';
            $html .= '<li><a href="category.php?id='.$id.'">'.$name . '</a></li>';
            $html .= "</ul>";
        }
    echo $html;   

    $stmt->close();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Photo Gallery</title>
    
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
                <a class="brand" href="#">myGallery</a>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php">Categories</a></li>
                <li><a href="index.php">Photos</a></li>
            </ul>
        </div>
    </div>
    <!-- main body -->
    <div class="row-fluid">
        <!-- content area -->
        <div class="span9">
            <h1>Welcome to Photo Gallery!</h1>
            <?php
             getCategories();
            
            ?>
        </div>
        <!-- sidebar -->
        <div class="span3">
            <div class="sidebar">
            <h2>Sidebar</h2>
            <?php
                getCategories();
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