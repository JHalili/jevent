<!DOCTYPE html>
<?php
if(isset($_POST['Submit'])){
  include("config.php");
  session_start();
  if($db == false){
    echo "failed to connect\n";
    die();
  }

  $myemail = mysqli_real_escape_string($db,$_POST['email']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']);

  $sql = "SELECT name, username FROM User U WHERE e_mail = '$myemail' AND password = '$mypassword'";
  $result = mysqli_query($db,$sql);

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row
 $error = "";
  if($count == 1) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['login_user'] = $row['username'];
    header("location: home.php");
  }else {
    $error = "Your Login Name or Password is invalid!";
  }
  mysqli_free_result($result);
}
?>

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
      <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
      <img id="profile-img" class="profile-img-card" src="images/user.png"></p>
      <form class="form-signin" method="post" action = "index.php">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <span class="error" style="color:red"> <?php echo $error;?></span>
        <button class="btn btn-lg btn-primary btn-block btn-signin" name="Submit" type="submit">Sign in</button>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="button" onclick="location.href = 'sign_up.php';">Sign up</button>
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
