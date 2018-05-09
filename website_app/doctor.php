<!DOCTYPE html>
   
   <?php
    
    $DoctorId = $_POST['ourDoctors'];
    echo "id: ".$DoctorId;
 
    
    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');
    $conn1 = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');
    $conn2 = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');
    $query = "select * from Doctor_tbl"; // query for all the items inthe doctor tabel 
    
    $query1 = "select * from Locality_tbl"; //query for the locality table
    
    $query2 = "select * from Doctor_tbl  where Doctor_Id = $DoctorId";

    
    $result = mysqli_query($conn, $query) or die ("Error in query 1". mysqli_error($conn));
    
    $result1 = mysqli_query($conn1, $query1) or die ("Error in query 2". mysqli_error($conn1));
    
   // $row1 = mysqli_fetch_assoc($result1);
    
    $result2 = mysqli_query($conn2, $query2) or die ($query2. mysqli_error($conn2));

    $row2 = mysqli_fetch_assoc($result2);
    echo $row2['Locality_Id'];

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
          <a class="navbar-brand" href="#"> </a>  <!-- add username in index page-->
          
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
                  <a class="dropdown-item" href="doctor.php">Doctors</a>
                  <a class="dropdown-item" href="patient.php">Patients</a>
                  <a class="dropdown-item" href="#">Appointments</a>
                  <a class="dropdown-item" href="#">Medication</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">About Us</a>
                  <a class="dropdown-item" href="#">Contact Us</a>
                </div>
                
              <li class="nav-item">
              
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                      Select doctor
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="submit" class="btn btn-primary" value="Choose doctor">
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
         <form method="post" action="doctor.php" name="doctorCRUD">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label> Name</label>
              <input type="text" class="form-control" id="d_name" name="dname" placeholder="Name" value="<?php echo $row2['Name'];?>">
            </div>
            <div class="form-group col-md-6">
              <label>Surname</label>
              <input type="text" class="form-control" id="d_surname" name="dsurname" placeholder="Surname" value="<?php echo $row2['Surname'];?>">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>House name/num</label>
              <input type="text" class="form-control" id="houseName/num"  name="housename" placeholder="House name/num"          value="<?php echo $row2['House name/ num'];?>">
            </div>
            
            <div class="form-group col-md-6">
              <label>Street</label>
              <input type="text" class="form-control" id="Street" name="street" placeholder="street" value="<?php echo $row2['Street'];?>">
            </div>
          </div>
          
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Locality</label>
              <select id="Locality" name="locality" class="form-control" value=''>
               <?php
                  while($row1 = mysqli_fetch_assoc($result1))
                  {
                    echo "<option value='$row1[Locality_Id]'";
                    if ($row2['Locality_Id']==$row1['Locality_Id']) echo " selected";
                    echo "> $row1[Name]</option>";
                  }
                ?>
              </select>
            </div>
            
            <div class="form-group col-md-6">
              <label>Country</label>
              <select id="country" class="form-control">
                <option selected>Malta</option>
              </select>
            </div>
          </div>
            

          
          <div class="form-row">
          <div class="form-group col-md-6">
              <label>PostCode</label>
              <input type="text" class="form-control" id="Postcode" name="postcode" value="<?php echo $row2['PostCode'];?>">
            </div>
            
            <div class="form-group col-md-6">
              <label>Mobile Number:</label>
              <input type="text" class="form-control" id="mobilenumber" name="mobileNumber" placeholder="Mobile number" value="<?php echo $row2['Mobile_number'];?>">
            </div>
            
            
            </div>
            
          
          <button type="submit" class="btn btn-outline-info" name="submit">Edit</button>
        </form>
    

        
        
        <nav class="navbar fixed-bottom navbar-dark bg-dark">
          <a class="navbar-brand" href="#">© Naomi Hili SWD4.2A - 2018</a>
        </nav>
    </body>
</html>