<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Final Project: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Final Project</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>
        <!--Bootstrap's navigation bar-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav navbar-nav">
                        <li><a href="/"><img alt="loCal" src="/img/logo.png"/></a></li>
                        <li id="dropdowns">
                            <div>
                                <a href="upload.php"><button type="button" class="btn btn-default">Upload</button></a>
                                <!--Bootstrap dropdown folder of calendars-->
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Folders
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="uploads.php">My Uploads</a></li>
                                        <li><a href="index.php">My Saved</a></li>
                                        <li role="separator" class="divider"></li>
                                        <?php $folders = CS50::query("SELECT * FROM folders WHERE user_id = ? AND calendar_id = ?", $_SESSION["id"], NULL);
                                            foreach($folders as $folder): ?>
                                                <li><a href="folder.php?name=<?=$folder["folder_name"]?>"><?=$folder["folder_name"]?></a></li>
                                        <?php endforeach ?>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="add_folder.php">+ Add Folder</a></li>
                                        <li><a href="delete_folder.php">- Delete Folder</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <!--Bootstrap dropdown of account options-->
                        <li id="dropdowns"><div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php
                                    $users = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
                                    print($users[0]["username"]);
                                ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="password.php">Change Password</a></li>
                                <li><a href="logout.php">Sign out</a></li>
                            </ul>
                        </div></li>
                        
                        
                        <li id="dropdowns">
                            <div class="input-group">
                                <a>
                                    <form action="search.php" method="post">
                                        <input type="text" name="input" value="" class="form-control" placeholder="Search for..."/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit" value="Search">Go!</button>
                                        </span>
                                    </form> 
                                </a>
                            </div>
                        </li>
                    </ul>
                <?php endif ?>
                    
            </div>
        </nav>

    <div id="middle">