
<?php

   
    if(isset($_POST['updateTable']))
    {
        $conn = mysqli_connect('localhost', 'root','','Hospital_db','3306') or die ('Cannot connect to the db');
        
        $PatientId = 0;
        $LocalityId = 0;
        
        $Patientname = $_POST['pname'];
        $PLocality = $_POST['locality']; // this is already getting the locality id
        
        echo "name: ".$PLocality;   
        
        $query = "SELECT * FROM Patient_tbl WHERE Name = '$Patientname'";

        $result = mysqli_query($conn, $query) or die ("Error in query 1". mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result))
        {
           $PatientId = $row['Patient_Id'];
        }
        
        $Patientsurname = $_POST['psurname'];
        $PHousename = $_POST['housename'];
        $PStreet = $_POST['street'];
        $PPostcode = $_POST['postcode'];
        $PMobilenumber = $_POST['mobileNumber'];
        
        $queryUpdate = "UPDATE `Patient_tbl` SET `Name` = '$Patientname', `Surname` = '$Patientsurname', `House_name` = '$PHousename', `Street` = '$PStreet', `PostCode` = '$PPostcode', `Mobile_number` = '$PMobilenumber', `Locality_Id` = '$PLocality' WHERE `Patient_tbl`.`Patient_Id` = $PatientId";
        
        
        mysqli_query($conn,$queryUpdate) or die (mysqli_error($conn));
        
         echo"<script>window.location.href='patient.php?ourPatients=$PatientId';alert('Patient_tbl in Database updated. ');</script>"; //alert and a redirection
    
    }



?>