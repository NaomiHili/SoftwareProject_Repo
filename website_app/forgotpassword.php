<?php

if (isset($_POST['submit1'])) 
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        //Connect to db
        $conn = mysqli_connect('localhost', 'root','','Hospital_db','3306') or die ('Cannot connect to the db');
        $query = "SELECT * FROM Account_tbl WHERE Username='$username' AND Email='$email'";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_row($result)) 
        {
            $_SESSION['forgottenPassword'] = $row[3];
            $forgottenPassword = $_SESSION['forgottenPassword'];
            
            
            require($_SERVER["DOCUMENT_ROOT"].'/phpmailer/PHPMailerAutoload.php'); #load the library required for phpmailer
            
            
            $username = 'naomi.hili.a100807@mcast.edu.mt';
            $password = 'Pizzaplace21';
            $comments = "Your password was recovered it is: $forgottenPassword";
            $subject = "$_POST[username], your forgotten password was recovered.";
            $emailTo = "$email";
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
                echo"<script>window.location.href='login.php';alert('Message sent. ');</script>"; //alert and a redirection
        }
    }

?>