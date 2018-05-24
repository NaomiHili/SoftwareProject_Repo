<?php
        
    $Name = $_POST["pname"];
    $Surname = $_POST["psurname"];
    $Housname = $_POST["housename"];
    $Street = $_POST["street"];
    $Locality1 = $_POST["locality"];
    $Postcode = $_POST["postcode"];
    $MobileNum = $_POST["mobileNumber"];
    $Doctor1 = $_POST["yourDoctor"];
    
    $Email = $_POST["email"];
    $Username = $_POST["username"];
    $Password = $_POST["password"];

    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');

    $Docquery = "select Doctor_Id from Doctor_tbl where Name = '$Doctor1'";

    $Doctorrow = mysqli_query($conn,$Docquery);
    
    $row = mysqli_fetch_row($Doctorrow);
    
    $Doctor = $row[0];

    $Locquery = "select Locality_Id from Locality_tbl where Name = '$Locality1'";

    $Localityrow = mysqli_query($conn,$Locquery);

    $row1 = mysqli_fetch_row($Localityrow);
    

    $Locality = $row1[0];

    $query1 = "INSERT INTO Account_tbl (Username, Email, Password) VALUES('$Username','$Email','$Password')";
    echo $query1;
    //mysqli_query($conn,$query1) or die (mysql_error($conn)); calling this in the if statment below
    

    $accquery = "select Account_Id from Account_tbl where Username = '$Username'";
    
    $Accountrow = mysqli_query($conn,$accquery) or die (mysql_error($conn));

    $row2 = mysqli_fetch_row($Accountrow); //or die (mysql_error($conn));  testing with

    $Account = $row2[0];


    $conn1 = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');

    
    $query2 = "INSERT INTO Patient_tbl (Name, Surname, House_name, Street, PostCode, Mobile_number,Locality_Id, Doctor_Id,Account_Id) VALUES('$Name','$Surname','$Housname','$Street','$Postcode','$MobileNum',(select Locality_Id from Locality_tbl where Name = '$Locality1'), (select Doctor_Id from Doctor_tbl where Name = '$Doctor1'), (select Account_Id from Account_tbl where Username = '$Username') )";

    echo $query2;
    //mysqli_query($conn1,$query2); calling this in the if statment
    
     //echo"<script>window.location.href='registration.php';alert('Validation fields .');</script>";
    
    if($Name == "" || $Surname == "" || $Housname == "" || $Street == "" || $Postcode == "" || $Username == "" || $Email == "" || $Password == "")
    {
        echo"<script>window.location.href='registration.php';alert('Please fill in all the fields.');</script>";
        
    }
    else if (!($MobileNum > 77000000 && $MobileNum < 99999999))
    {
      echo"<script>window.location.href='registration.php';alert('Incorrect mobile number .');</script>";   
    }
    else
    {
        echo"<script>window.location.href='login.php';alert('Welcome you have registered and logged in to the system.');</script>";
        mysqli_query($conn,$query1);
        mysqli_query($conn1,$query2);
    }
    


?>

