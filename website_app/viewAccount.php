 <!DOCTYPE html>
<?php
    session_start(); //start session for the user

//for update save collums in session post than do an updte query
?>

<?php
    
    
    if(!isset( $_SESSION['Username'])) 
    {
        $name = 'Guest';
    }
    else if(isset($_SESSION['Username']))
    {
        $name = $_SESSION['Username'];
    }
     

    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');
    
    $query = "select * from Doctor_tbl";
    
    $query1 = "select Name from Locality_tbl";
    
    $query2 = "select * from Patient_tbl";
    
    $query3 = "select * from Appointment_tbl";
    
    $result = mysqli_query($conn, $query) or die ("Error in query". mysqli_error($conn));
    
    $result1 = mysqli_query($conn, $query1) or die ("Error in query1". mysqli_error($conn));
    
    $result2 = mysqli_query($conn, $query2) or die ("Error in query2". mysqli_error($conn));
    
    $result3 = mysqli_query($conn, $query3) or die ("Error in query3". mysqli_error($conn));
    
   $query4 = "SELECT * FROM Account_tbl WHERE Username = $_SESSION[Username]";

   $result4 = mysqli_query($conn, $query4) 
                        or die ("Error in query4".mysqli_error($conn));
    $row4 = mysqli_fetch_assoc($result4);

?>
   
<html>
    <head>
        <title> Derek Memorial Hospital</title>
        <meta charset="UTF-8"/>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        
        <script src="js/javascript.js"></script> <!-- linking the js file to the index.php -->
        <script src='../runtime/jquery-3.2.1.min.js'></script>
        <srcipt src='../runtime/popper.min.js'></srcipt>   
    </head>
    <body>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <!--<img  width="30" height="30" class="d-inline-block align-top" alt="" > -->
          <a class="navbar-brand" href="#"> 
          <?php  
                
                if(isset($_SESSION['Username']))
                {
                    $name = $_SESSION['Username'];
                    echo "Welcome to DMH " .$name;
                }
              else
              {
                  $name = 'Guest';
                  echo "Welcome to DMH " .$name;
              }
            
           ?>
          
          </a>  <!-- add username in index page-->
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
               <li class="nav-item ">
                <a class="nav-link" href="#">Medical Center <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                 <?php
                    //echo $_SESSION['rowl'];
                    if (isset($_SESSION['rowl']) && $_SESSION['rowl'] == "Doctor" && $name != "Guest" && $_SESSION['rowl'] != "Patient")
                    {
                  echo "<a class='dropdown-item' href='doctor.php' data-toggle='modal' data-target='#selectDoctor'>Doctors</a>
                        <a class='dropdown-item' href='patient.php' data-toggle='modal' data-target='#selectPatient'>Patients</a>
                        <a class='dropdown-item' href='appointment.php' data-toggle='modal' data-target='#selectAppointment'>Appointments</a>
                        <a class='dropdown-item' href='medication.php'>Medication</a> ";
                    }
                    else if(isset($_SESSION['rowl']) && $_SESSION['rowl'] == "Patient" && $name != "Guest")
                    {
                      echo "<a class='dropdown-item' href='patient.php' data-toggle='modal' data-target='#selectPatient'>Patients</a>
                            <a class='dropdown-item' href='appointment.php' data-toggle='modal' data-target='#selectAppointment'>Appointments</a>";  
                    }

                    ?>
               
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="aboutUs.php">About Us</a>
                  <a class="dropdown-item" href="ContactUs.php">Contact Us</a>
                </div>
             
              
              
            
              <li class="nav-item">  <!-- there are 7 divs in the between the lii tags -->

                    <!-- Modal form pop up for the doctor selection -->
                    <div class="modal fade" id="selectDoctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Our Doctors</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>     
                          </div>
                          <div class="modal-body">
                            <div class="form-group col-md-6">
                              <label> Your doctor:</label>
                              <form method="post" action="doctor.php">
                              <select id="yourDoctor" name="ourDoctors" class="form-control">
                                 <?php
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                    echo "<option value=".$row['Doctor_Id'].">". $row['Name']."</option>";
                                  }
                                ?>
                              </select>
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-outline-danger" value="Choose doctor">
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </li>
              
              
              <li class="nav-item"> <!-- nav item for patients -->
                    <!-- Modal -->
                    <div class="modal fade" id="selectPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Our Patients</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>    
                          </div>
                          <div class="modal-body">
                            <div class="form-group col-md-6">
                              <label> Your Patients:</label>
                              <form method="post" action="patient.php">
                              <select id="yourPatient" name="ourPatients" class="form-control">
                                 <?php
                                  while($row1 = mysqli_fetch_assoc($result2))
                                  {
                                    echo "<option value=".$row1['Patient_Id'].">". $row1['Name']."</option>";
                                  }
                                ?>
                              </select>
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-outline-info" value="Choose your patient">
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
              </li>
              
            <li class="nav-item">
                    <!--Appointment selection Modal -->
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
                                  while($row3 = mysqli_fetch_assoc($result3))
                                  {
                                    echo "<option value=".$row3['Appointment_Id'].">". $row3['Appointment_Id']."</option>";
                                  }
                                ?>
                              </select>
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-outline-danger" value="Choose Appointment">
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
                    <a class="dropdown-item" href="viewAccount.php">View account</a>
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
         <form method="post" action="viewAccount.php" name="doctorCRUD">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label> Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $row4['Username']; ?>">
            </div>
          </div>
          
          <div class="form-row">
              <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="emial" value="<?php echo $row4['Email']; ?>">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Password</label>
              <input type="password" class="form-control" id="password"  name="password"  value="<?php $row4['Password']; ?>">
            </div>
             </div>
            
            <br>  
          <button type="submit" class="btn btn-outline-info" name="update">Save new Details</button>
        </form>
        <br>
        <nav class="navbar fixed-bottom navbar-dark bg-dark">
          <a class="navbar-brand" href="#">© Naomi Hili SWD4.2A - 2018</a>
        </nav>
             
    </body>
</html>