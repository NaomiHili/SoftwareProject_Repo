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
    
    $result1 = mysqli_query($conn, $query1) or die ("Error in query". mysqli_error($conn));
    
    $result2 = mysqli_query($conn, $query2) or die ("Error in query". mysqli_error($conn));
    
    $result3 = mysqli_query($conn, $query3) or die ("Error in query". mysqli_error($conn));

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
                    if ($_SESSION['rowl'] = "Doctor" && $name != "Guest" && $_SESSION['rowl'] != "Patient")
                    {
                  echo "<a class='dropdown-item' href='doctor.php' data-toggle='modal' data-target='#selectDoctor'>Doctors</a>
                        <a class='dropdown-item' href='patient.php' data-toggle='modal' data-target='#selectPatient'>Patients</a>
                        <a class='dropdown-item' href='appointment.php' data-toggle='modal' data-target='#selectAppointment'>Appointments</a>
                        <a class='dropdown-item' href='medication.php'>Medication</a> ";
                    }
                    else if($_SESSION['rowl'] = "Patient" && $name != "Guest")
                    {
                      echo "<a class='dropdown-item' href='patient.php' data-toggle='modal' data-target='#selectPatient'>Patients</a>
                            <a class='dropdown-item' href='appointment.php' data-toggle='modal' data-target='#selectAppointment'>Appointments</a>
                            <a class='dropdown-item' href='medication.php'>Medication</a> ";  
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
        
        <form class="px-4 py-3" method="post" action="ContactUs.php">
         <div class="form-group">
            <label>Our Email address</label>
            <input type="email" class="form-control" id="ourEmail" name="OurEmail" value="naomi.hili.a100807@mcast.edu.mt" readonly>
          </div>
         <br>
          <div class="form-group">
            <label>Your Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="User_email">
          </div>
          <br> 
          <div class="form-group">
            <label>Question:</label>
            <input type="text" class="form-control" id="question" name="questionTitel">
          </div>
          <br>  
          <div class="form-group">
            <label>How can we help you:</label>
            <textarea class="form-control" id="question" rows="3" name="Question"></textarea>
          </div>
          
          <button type="submit" class="btn btn-outline-success" name="submit">Send your Question</button>
        </form>
        
        <br>
        <nav class="navbar fixed-bottom navbar-dark bg-dark">
          <a class="navbar-brand" href="#">© Naomi Hili SWD4.2A - 2018</a>
        </nav>
    </body>
</html>

<?php
     
       if (isset($_POST['submit'])) 
        {   
            $Our_Email = $_POST['OurEmail'];
            $User_Email = $_POST['User_email'];
            $titel = $_POST['questionTitel'];
            $question = $_POST['Question'];
            
            require($_SERVER["DOCUMENT_ROOT"].'/phpmailer/PHPMailerAutoload.php'); #load the library required for phpmailer 
            
            $username = 'naomi.hili.a100807@mcast.edu.mt';
            $password = 'Pizzaplace21';
            $comments = "User: $User_Email has a question: $question";
            $subject = "$titel";
            $emailTo = "$Our_Email";
            $mail = new PHPMailer(); #createing a new instance
            $mail->isSMTP(); 
            $mail->isHtml(true);
            $mail->Host = 'smtp.office365.com';
            #$mail->SMTPDebug = 2; #include client and server messges
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->Body = $comments;
            $mail->Subject = $subject;
            $mail->From = 'naomi.hili.a100807@mcast.edu.mt'; #sender
            $mail->AddAddress($emailTo); #recepient

            if (!$mail->Send()) #sending the email
            {
                echo "Message was not sent";
                echo "Mailer Error: ". $mail->ErrorInfo;
            }
            else
                echo"<script>window.location.href='ContactUs.php';alert('Message sent.');</script>"; //alert and a redirection
       }
       
?>
