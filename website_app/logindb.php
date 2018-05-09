<?php

    session_start();  // so user will know is he is logged in.

        
    $_SESSION ["Username"] = $_POST["username"];    //saving username in session
    $_SESSION ["Password"] = $_POST["password"];    //saving password in session

    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');


    $query1 = "SELECT FROM Account_tbl WHERE(Username ='$Username' && Password ='$Password')";
    
    //if($Username == "" || $Password == "")
    //{
    //    echo "Error please enter username and password";
    //}

    
    echo $_SESSION[Username];
    echo $_SESSION[Password];
    header("Location: index.php");
    
    
    mysqli_query($conn,$query1);

    
    
 

?>