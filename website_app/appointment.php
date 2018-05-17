 <!DOCTYPE html>
   
   <?php
    session_start(); //start session for the user
    ?>
   
   <?php
    
    $AppointmentsId = $_POST['ourAppointments'];
    echo "Id: " . $AppointmentsId . ",";
 
    
    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');

    $D_query = "select * from Doctor_tbl"; // query for all the items int he doctor tabel 

    $P_query = "select * from Patient_tbl"; // query for all the items int he doctor tabel 
    
    $A_query = "select * from Appointment_tbl"; //query for the appointment table
    
    $AID_query = "select * from Appointment_tbl  where Appointment_Id = $AppointmentsId"; // selec the table id

    
    $D_result = mysqli_query($conn, $D_query) or die ("Error in query 1". mysqli_error($conn)); // doctor result
    
    $P_result = mysqli_query($conn, $P_query) or die ("Error in query 2". mysqli_error($conn)); // patient result
    
    $A_result = mysqli_query($conn, $A_query) or die ("Error in query 3". mysqli_error($conn)); // appointment table 
    
    $AID_result = mysqli_query($conn, $AID_query) or die ($AID_query. mysqli_error($conn)); // appointment Id result

    $row2 = mysqli_fetch_assoc($AID_result);
    echo  "AId: ".$row2['Appointment_Id'] . ",";

    $row3 = mysqli_fetch_assoc($D_result);
    echo  " DId: ".$row3['Doctor_Id'] . ",";
    
    $row4 = mysqli_fetch_assoc($P_result);
    echo  " PId: ".$row4['Patient_Id']. ",";   
    
    $row5 = mysqli_fetch_assoc($A_result);
    echo  " APId: ".$row5['Appointment_Id']; 

?>
   
   <html>
    <head>
        <title> Derek Memorial Hospital</title>
        <meta charset="UTF-8"/>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

       
        <script src='../runtime/jquery-3.2.1.min.js'></script>
        <srcipt src='../runtime/popper.min.js'></srcipt>   
    </head>
    <body>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">DMH</a>  <!-- add username in index page-->
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#">Medical Center <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="doctor.php" data-toggle="modal" data-target="#selectDoctor">Doctors</a>
                  <a class="dropdown-item" href="patient.php" data-toggle="modal" data-target="#selectPatient">Patients</a>
                  <a class="dropdown-item" href="appointment.php" data-toggle="modal" data-target="#selectAppointment">Appointments</a>
                  <a class="dropdown-item" href="#">Medication</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">About Us</a>
                  <a class="dropdown-item" href="#">Contact Us</a>
                </div>
                
                  <li class="nav-item">

                    <!--Doctor selection Modal -->
                    <div class="modal fade" id="selectAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Our Appointments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>     
                            </div>
                          <div class="modal-body">
                            <div class="form-group col-md-6">
                              <label> Your Appointments:</label>
                              <form method="post" action="appointment.php">
                              <select id="yourAppointment" name="ourAppointments" class="form-control">
                                 <?php
                                  while($row = mysqli_fetch_assoc($A_result))
                                  {
                                    echo "<option value=".$row['Appointment_Id'].">". $row['Appointment_Id']."</option>";
                                  }
                                ?>
                              </select>
            
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-outline-warning" value="Choose appointment">
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
              </li>  
                          
                </li>
            </ul>
            
             <div class="btn-group mr-sm-2">
              <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
                </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="logout.php" name="logout">Logout</a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="">View account</a>
                    <a class="dropdown-item" href="registration.php">Create account</a>
                  </div>
            </div>
            
            <form class="form-inline my-2 my-lg-0 mr-sm-2">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form>    
                          
          </div>
        </nav>
        
        <br>
         <form method="post" action="appointment.php" name="appointmentCRUD">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label> Patient Name</label>
              <input type="text" class="form-control" id="p_name" name="pname" placeholder="Patinet_Name" value="<?php echo $row4['Name'];?>">
            </div>
            <div class="form-group col-md-6">
              <label>Doctor Name</label>
              <input type="text" class="form-control" id="d_name" name="dsname" placeholder="Doctor_Name" value="<?php echo $row3['Name'];?>">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date</label>
              <input type="date" class="form-control" id="date"  name="date" placeholder="App_date"  value="<?php echo $row5['Date'];?>">
            </div>
            
            <div class="form-group col-md-6">
              <label>Time</label>
              <input type="text" class="form-control" id="time" name="time" placeholder="App_time" value="<?php echo $row5['Time'];?>">
            </div>
          </div>     
            
            <div class="form-group">
            <label>Appointment Breif</label>
            <textarea type="text" class="form-control" rows="3" value="" readonly> <?php echo $row5['Appointment_brief'];?> </textarea>  
            <!-- readonly at the end of the tag -->
          </div>
          
          <button type="submit" class="btn btn-outline-info" name="submit">Edit</button>
        </form>
    
        <nav class="navbar fixed-bottom navbar-dark bg-dark">
          <a class="navbar-brand" href="#">© Naomi Hili SWD4.2A - 2018</a>
        </nav>
    </body>
</html>