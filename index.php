<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Source code of Campus Events">
    <meta name="author" content="Joana Halili AND Rubin Deliallisi">
    <title>Campus Event</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
  <?php include_once("analyticstracking.php") ?>
  <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="images/user.png"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="button" onclick="location.href = 'home.php';">Sign in as Guest</button>
            </form>
            <!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div>
        <!-- /card-container -->
    </div>
    <!-- /container -->
    <footer class="bs-footer" role="contentinfo">
        <div class="container">
            <p>jevent.tk © 2016</p>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>
