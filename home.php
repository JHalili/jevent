<!DOCTYPE html>
<html lang="en">
<?php
include('session.php');
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Source code of Campus Events">
  <meta name="author" content="Joana Halili AND Rubin Deliallisi">
  <title>Campus Event</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <?php include_once("analyticstracking.php") ?>
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
          <li><a href="#">Groups</a></li>
          <li><a href="#">Sources</a></li>
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
          <li><a href="#">Profile</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Create Group</a></li>
              <li><a href="#">Manage Groups</a></li>
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
  <div class="container">
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail First" src="images/city.jpg">
              <div class="caption">
                <h3>Event 1</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail Second" src="images/tech.jpg">
              <div class="caption">
                <h3>Event 2</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail Third" src="images/person.jpg">
              <div class="caption">
                <h3>Event 3</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail First" src="images/sport.jpg">
              <div class="caption">
                <h3>Event 4</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail Second" src="images/flower.jpg">
              <div class="caption">
                <h3>Event 5</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail Third" src="images/food.jpg">
              <div class="caption">
                <h3>Event 6</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail First" src="images/texture.jpg">
              <div class="caption">
                <h3>Event 7</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail Second" src="images/cats.jpg">
              <div class="caption">
                <h3>Event 8</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img alt="Bootstrap Thumbnail Third" src="images/car.jpg">
              <div class="caption">
                <h3>Event 9</h3>
                <p>
                  Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p>
                  <a class="btn btn-primary" href="#">More</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1">
      </div>
    </div>
  </div>
  <footer class="bs-footer" role="contentinfo">
    <div class="container">
      <p>jevent.tk © 2016 <a href="imprint.php">Imprint</a>
      </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

  </html>
