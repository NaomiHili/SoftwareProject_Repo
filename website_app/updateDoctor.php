
<?php
   
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
        $queryUpdate = "UPDATE Doctor_tbl WHERE Doctor_Id = $_POST[ourDoctors] 
        SET Name = '$_POST['dname']', Surname = '$_POST['dsurname']', House name/num = '$_POST['housename']', Street = '$_POST['street']', 
        PostCode = '$_POST['postcode']', Mobile_number = '$_POST['mobileNumber']' , Locality_Id = '$_POST['locality']'";
    
    }



?>