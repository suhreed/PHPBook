<?php
require_once 'admin.functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog - Administration Panel</title>
    
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
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="admin.php">Admin</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    </div>
    <!-- main body -->
    <div class="row-fluid">
        <!-- content area -->
        <div class="span9">
            <h1>Administration Panel</h1>
            <?php
            $op = $_REQUEST['op'];
            $pid = $_REQUEST['pid'];
            $aid = $_REQUEST['aid'];

            switch ($op) {
                case edit:
                    editForm($pid);
                    break;
                case update:
                    editPost($pid);
                    break;
                case add:
                    addPostForm();
                    break;
                case save:
                    addPost();
                    break;
                case delete:
                    deletePost($pid);
                    break;
                case publish:
                    publishPost($pid);
                    break;
                case unpublish:
                    unpublishPost($pid);
                    break;
                case lists:
                default:
                    listPosts();
            }
            ?>
        </div>


        <div class="span3">
            <h2>Qucik Actions</h2>
            <ul class="unstyled">
                <li><i class="icon-list"></i><a href="admin.php?op=lists">List Posts</a>
                <li><i class="icon-plus"></i><a href="admin.php?op=add">Add Post</a>
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