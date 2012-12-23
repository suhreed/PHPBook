<?php
include_once 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My News Reader</title>
    
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
                <a class="brand" href="#">myNewsReader</a>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    </div>
    <!-- main body -->
    <div class="row-fluid">
        <!-- content area -->
        <div class="span9">
            <h1>Fresh News!</h1>
            <?php
           // listFeeds();

            $op = $_REQUEST['op'];
            $id = $_REQUEST['id'];


            switch ($op) {
                case show:
                    showFeed($id);
                    break;
                case edit:
                    editForm($id);
                    break;
                case add:
                    addForm();
                    break;
                case addfeed:
                    addFeed();
                    break;
                case save:
                    saveFeed($id);
                    break;
                case delete:
                    deleteFeed($id);
                    break;
                //case list:
                default:
                    listFeeds();
            }
      
            ?>
        </div>


        <div class="span3">
            <h2>Actions</h2>
            <ul class="unstyled">
                <li><i class="icon-list"></i><a href="index.php?op=list">List Feeds</a>
                <li><i class="icon-plus"></i><a href="index.php?op=add">Add Feed</a>
            </ul>
        </div> 

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