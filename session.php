<?php
   include('config.php');
   session_start();

   $username_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select * from User U where U.username = '$username_check'");

   $row_session = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = true;
   if(!isset($_SESSION['login_user'])){
     $login_session = false;
     header("location:index.php");
   }
?>
