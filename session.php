<?php
   include('config.php');
   session_start();

   $email_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select U.email from User U where U.e_mail = '$email_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = true;
   if(!isset($_SESSION['login_user'])){
     header("location:index.php");
   }
?>
