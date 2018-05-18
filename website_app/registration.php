<?php
    $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');

    $query = "select Name from Doctor_tbl";
    
    $query1 = "select Name from Locality_tbl";
    
    $result = mysqli_query($conn, $query) or die ("Error in query". mysqli_error($conn));
    
    $result1 = mysqli_query($conn, $query1) or die ("Error in query". mysqli_error($conn));
    
?>


<!DOCTYPE html>
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
        <script src="js/javascript.js"></script> <!-- this is my js file -->
    </head>
    <body>
    
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">DMH</a>
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
                  <a class="dropdown-item" href="doctor.php" data-toggle="modal" data-target="#exampleModal">Doctors</a>
                  <a class="dropdown-item" href="patient.php" data-toggle="modal" data-target="#exampleModal">Patients</a>
                  <a class="dropdown-item" href="appointment.php" data-toggle="modal" data-target="#exampleModal">Appointments</a>
                  <a class="dropdown-item" href="#">Medication</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">About Us</a>
                  <a class="dropdown-item" href="#">Contact Us</a>
                </div>
              </li>
            </ul>
            
             <div class="btn-group mr-sm-2">
              <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
                </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="login.php">Logout</a>
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
        
        <form method="post" action="registerdb.php" name="registration" onsubmit="formValidation()">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" id="P_name" name="pname" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
              <label>Surname</label>
              <input type="text" class="form-control" id="P_surname" name="psurname" placeholder="Surname">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>House name/num</label>
              <input type="text" class="form-control" id="houseName/num"  name="housename" placeholder="House name/num">
            </div>
            <div class="form-group col-md-6">
              <label>Street</label>
              <input type="text" class="form-control" id="Street" name="street" placeholder="street">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Locality</label>
              <select id="Locality" name="locality" class="form-control">
               <?php
                  while($row = mysqli_fetch_assoc($result1))
                  {
                    echo "<option> $row[Name]</option>";
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
              <input type="text" class="form-control" id="Postcode" name="postcode">
            </div>
            
            <div class="form-group col-md-6">
              <label>Mobile Number:</label>
              <input type="text" class="form-control" id="mobilenumber" name="mobileNumber" placeholder="Mobile number">
            </div>
            
            <div class="form-group col-md-6">
              <label> Your doctor:</label>
              <select id="yourDoctor" name="yourDoctor" class="form-control">
               <?php
                  while($row = mysqli_fetch_assoc($result))
                  {
                    echo "<option> $row[Name]</option>";
                  }
                ?>
              </select>
            </div>
            
            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" id="Email" name="email" placeholder="Email">
            </div>
            
            </div>
            
            <div class="form-row">
               <div class="form-group col-md-6">
              <label>Username</label>
              <input type="text" class="form-control" id="Username" name="username" placeholder="Username">
                </div>
            
            <div class="form-group col-md-6">
              <label>Password</label>
              <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
                </div>
           </div>    
          
          <button type="submit" class="btn btn-outline-info" name="submit">Sign Up</button>
        </form>
        
        
        <nav class="navbar fixed-bottom navbar-dark bg-dark">
          <a class="navbar-brand" href="#">© Naomi Hili SWD4.2A - 2018 </a>
        </nav>
    </body>
</html>
