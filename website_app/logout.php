<?php
    session_start(); //starts the session
?>
  

<?php
   session_destroy(); //stops session for the user
   echo"<script>window.location.href='index.php';alert('You are logged out and in webpage as Guest ');</script>"; 

?>
