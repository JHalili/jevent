<?php include_once('session.php') ?>
<!-- Dummy nav bar to move down content-->
<nav class="navbar navbar-static-top"></nav>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">Campus Event</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="maintenance.php">Maintenance</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="upcoming_events.php">Upcoming</a></li>
                        <li><a href="created_events.php">Created</a></li>
                        <li><a href="invited_events.php">Invited</a></li>
                    </ul>
                </li>
            </ul>
            <div class="col-sm-3 col-md-3">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="q">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><?php echo $row_session['name'] ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Create Group</a></li>
                        <li><a href="#">Manage Groups</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="create_event.php">Create Event</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Settings</a></li>
                        <li>
                            <a href="logout.php" onclick="logout();">Log Out</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Report Problem</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container -->
</nav>