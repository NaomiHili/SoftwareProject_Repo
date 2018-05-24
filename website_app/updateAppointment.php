<?php

   
    if(isset($_POST['update']))
    {
        $conn = mysqli_connect('localhost', 'root','','Hospital_db','3306') or die ('Cannot connect to the db');
        
        $AppointmentId = 0;

        $AppointmentId = $_POST['appId'];
        
        
        $query = "SELECT * FROM Appointment_tbl WHERE Appointment_Id = '$AppointmentId'";

        $result = mysqli_query($conn, $query) or die ("Error in query 1". mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result))
        {
           $AppointmentId = $row['Appointment_Id'];
        }
        
        $Date = $_POST['date'];
        $Time = $_POST['time'];
        $AppointmentBrief = $_POST['Appbrief'];
        
        $queryUpdate = "UPDATE `Appointment_tbl` SET `Date` = '$Date', `Time` = '$Time', `Appointment_brief` = '$AppointmentBrief' 
        WHERE `Appointment_tbl`.`Appointment_Id` = $AppointmentId";
        
        
        mysqli_query($conn,$queryUpdate) or die (mysqli_error($conn));
        
         echo"<script>window.location.href='appointment.php?ourAppointments=$AppointmentId';alert('Appointment_Id in Database updated. ');</script>"; //alert and a redirection
    
    }



?>