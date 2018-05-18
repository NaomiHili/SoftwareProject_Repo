<?php
     // email confirmation and validations done on thurday 17th  
     // i added 2 new collums to the account_tbl tocken and email confirm
    
    function redirect() {
        header('Location: login.php');
    }

    if (!isset($_GET['Email']) || !isset($_GET['token']))
    {
        redirect()
    }
    else
    {
        $conn =mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');
        
        $con = new mysqli(host:'localhost', username:'naomi', paswd:'test123', dname:'Hospital_db');
        
        $email = $_GET['Email'];
        $token = $_GET['token'];
        
        $sql = $con->query("select Account_Id from Account_tbl where Email = '$Email' and token = '$token' and EmailConfirm = 0");
        
        if($sql-> num_row > 0)
        {
            $con->query(query:"UPDATE Account_tbl SET is EmailConfirm = 1 , token = '' where email = '$Emali'");
            
            echo "Your email had been verified now you can log in";    
        }
        else
        {
          redirect();  
        }
    }
    
?>