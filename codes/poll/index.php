<?php
include_once 'functions.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Poll</title>
    
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
                <a class="brand" href="#">myPoll</a>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    </div>
    <!-- main body -->
    <div class="row-fluid">
        <!-- content area -->
        <div class="span9">
            <h1>Poll</h1>
            <?php
           
            $op = $_REQUEST['op'];
            $qid = $_REQUEST['qid'];
            $aid = $_REQUEST['aid'];

            switch ($op) {
                case lists:
                    listPolls();
                    break;
                case show:
                    showPoll($qid);
                    break;
                case edit:
                    editForm($qid);
                    break;
                case add:
                    addPollForm();
                    break;
                case delete:
                    deletePoll($qid);
                    break;
                case save:
                    addPoll();
                    break;
                case vote:
                    addVote($aid, $qid);
                    break;
                case result:
                    showResult($qid);
                    break;
                default:
                    listPolls();
            }
      
            ?>
        </div>


        <div class="span3">
            <h2>Actions</h2>
            <ul class="unstyled">
                <li><i class="icon-list"></i><a href="index.php?op=lists">List Polls</a>
                <li><i class="icon-plus"></i><a href="index.php?op=add">Add Poll</a>
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