<?php

    session_start();  // so user will know is he is logged in.


    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');

    $query1 = "SELECT * FROM Account_tbl WHERE(Username ='$_POST[username]' && Password ='$_POST[password]')";
    
    $result1 = mysqli_query($conn,$query1) or die ("Error in query". mysqli_error($conn));
    
    if (mysqli_num_rows($result1) > 0)
    {
          
        $_SESSION ["Username"] = $_POST["username"];    //saving username in session
        $_SESSION ["Password"] = $_POST["password"];
        
        echo $_SESSION['Username'];
        echo $_SESSION['Password'];
        
         $row = mysqli_fetch_row($result1);
        
         $query2 = "SELECT count(*) FROM Doctor_tbl WHERE Account_Id = ".$row[0];
         $result2 = mysqli_query($conn,$query2) or die ("Error in query". mysqli_error($conn));
         $row1 = mysqli_fetch_row($result2);
        if($row1[0] > 0)
        {
            $_SESSION['rowl'] = "Doctor";
            echo "DOCTOR";
        }
        else
        {
            
         $query3 = "SELECT count(*) FROM Patient_tbl WHERE Account_Id = ".$row[0];
         $result3 = mysqli_query($conn,$query3) or die ("Error in query". mysqli_error($conn));
         $row2 = mysqli_fetch_row($result3);
            
            $_SESSION['rowl'] = "Patient";
            echo "PATINET";
            
        }
        
        
        header("Location: index.php");
    }
    else
    {
        header("Location: login.php");
    }
        
?>