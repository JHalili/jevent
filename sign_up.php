<!DOCTYPE html>
<?php
//phpinfo();
if(isset($_POST["Sign_up"])){
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  include("config.php");
  session_start();
  if($db == false){
    echo "failed to connect\n";
  }
  $myname = mysqli_real_escape_string($db,$_POST['name']);
  $myemail = mysqli_real_escape_string($db,$_POST['email']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']);
  $myre_password = mysqli_real_escape_string($db,$_POST['re-password']);
  $mybirthdate = mysqli_real_escape_string($db,$_POST['birthdate']);
  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  if($myre_password != $mypassword){
    $myre_password = "Password does not match";
    header("location: sign_up.php");
  }
  $sql = "SELECT username FROM User WHERE username = '$myusername'" ;
  $result = mysqli_query($db,$sql);

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count != 0 ) {
    header("location: sign_up.php");
  }else {
    $sql = "INSERT INTO User (username, name, birthdate, e_mail, password) VALUES
    ('$myusername', '$myname', '$mybirthdate', '$myemail', '$mypassword')";
    $result = mysqli_query($db,$sql);
    $_SESSION['login_user'] = $myusername;
    header("location: home.php");
  }
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
      <form class="form-signin" method="post" action = "">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" required autofocus><br>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required><br>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required><br>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br>
        <input type="password" name="re-password" id="inputre-Password" onChange="checkPasswordMatch();" class="form-control" placeholder="Re-type Password" required>
        <span class="warning" id="pwdWarning"> </span> </p>
        <script>
          function checkPasswordMatch() {
              var password = $("#inputPassword").val();
              var confirmPassword = $("#inputre-Password").val();
              if (password != confirmPassword)
                  $("#pwdWarning").html("Passwords do not match!").css('color', 'red');
              else
                  $("#pwdWarning").html("Passwords match.").css('color', 'green');
          }

          $(document).ready(function () {
             $("#inputre-Password").keyup(checkPasswordMatch);
          });
        </script><br>
        <input type="date" name="birthdate" id="inputbirthdate" class="form-control" placeholder="yyyy-mm-dd" required><br>
        <button class="btn btn-lg btn-primary btn-block btn-signin" name="Sign_up" type="submit">Sign up</button>
      </form>
      <!-- /form -->
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
