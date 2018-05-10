<?php
    
 //   if(isset($_GET['logout'])) 
//    {
  //      session_destroy();
    //    unset($_SESSION['username']);
      //  header('location: login.php');
//    }

   session_start(); //starts the session
   session_destroy(); //stops session for the user
   header("Location: login.php"); // after session distroy you are re directed to the index page
   exit();


?>
