
<?php

   
    if(isset($_POST['submitnew']))
    {
        $conn = mysqli_connect('localhost', 'root','','Hospital_db','3306') or die ('Cannot connect to the db');
        
        $DoctorId = 0;
        $LocalityId = 0;
        
        $Doctorname = $_POST['dname'];
        $DLocality = $_POST['locality']; // this is already getting the locality id
        
        //echo "name: ".$DLocality;   
        
        $query = "SELECT * FROM Doctor_tbl WHERE Name = '$Doctorname'";

        $result = mysqli_query($conn, $query) or die ("Error in query 1". mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result))
        {
           $DoctorId = $row['Doctor_Id'];
        }
        
        $Doctorsurname = $_POST['dsurname'];
        $DHousename = $_POST['housename'];
        $DStreet = $_POST['street'];
        $DPostcode = $_POST['postcode'];
        $DMobilenumber = $_POST['mobileNumber'];
        
        $queryUpdate = "UPDATE `Doctor_tbl` SET `Name` = '$Doctorname', `Surname` = '$Doctorsurname', `House name/ num` = '$DHousename', `Street` = '$DStreet', `PostCode` = '$DPostcode', `Mobile_number` = '$DMobilenumber', `Locality_Id` = '$DLocality' WHERE `Doctor_tbl`.`Doctor_Id` = $DoctorId";
        
        
        mysqli_query($conn,$queryUpdate) or die (mysqli_error($conn));
        
         echo"<script>window.location.href='doctor.php?ourDoctors=$DoctorId';alert('Doctor_tbl in Database updated. ');</script>"; //alert and a redirection
    
    }



?>