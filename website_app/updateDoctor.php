
<?php
    
    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');

    $query = "select * from Doctor_tbl"; // query for all the items inthe doctor tabel 
    $query1 = "select * from Doctor_tbl  where Doctor_Id = $DoctorId";
    
    $result = mysqli_query($conn, $query) or die ("Error in query 1". mysqli_error($conn));
    
    $result1 = mysqli_query($conn1, $query1) or die ("Error in query 2". mysqli_error($conn));
        
        $DoctorID = $_POST['ourDoctors'];
        $Doctorname = $_POST['dname'];
        $Doctorsurname = $_POST['dsurname'];
        $DHousename = $_POST['housename'];
        $DStreet = $_POST['street'];
        $DLocality = $_POST['locality'];
        $DPostcode = $_POST['postcode'];
        $DMobilenumber = $_POST['mobileNumber'];
    
    if(isset($_POST['submitnew']))
    {
        $queryUpdate = "UPDATE Doctor_tbl WHERE Doctor_Id = $DoctorID  SET Name = '$Doctorname', Surname = '$Doctorsurname', House name/num = '$DHousename', Street = '$DStreet', PostCode = '$DPostcode', Mobile_number = '$DMobilenumber' , Locality_Id = '$DLocality'";
    
    }



?>