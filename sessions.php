<?php
   include("connection.php");
   
   
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"SELECT last_name FROM student WHERE email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   

   $login_session = $row['last_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:sin_in.php");
      die();
   }
?>