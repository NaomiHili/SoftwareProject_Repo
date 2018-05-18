 <!DOCTYPE html>
 <html> 
    <?php
      // email confirmation and validations done on thurday 17th  
      // i added 2 new collums to the account_tbl tocken and email confirm
      $msg = "";
     
     if(isset($_POST['submit']))
     {
        $conn = mysqli_connect("localhost", "root", "", "Hospital_db","3306")  or die ('Cannot donnect to the db');
         
         $con = new mysqli(host:'localhost', username:'naomi', paswd:'test123', dname:'Hospital_db');
         
        $Email = $conn->real_escape_string($_POST["email"]);
        $Username = $conn>real_escape_string($_POST["username"]);
        $Password = $conn->real_escape_string($_POST["password"]);
         
         // email confirmation and validations done on thurday 17th
         
    if($Username == "" || $Email == "" || $Password == ||)
        $msg= "Please check your inputs!";
    else
    {
        $sql = $con->query(query:"select Account_Id from Account_tbl where email='$Email'");
        if($sql->num_row > 0){
            $msg = "Email already exists in the databse!";
        } else{
            $token = 'qwertyuiopasdfghjklzxcvbnm
            QWERTYUIOPASDFGHJKLZXCVBNM
            1234567890!%^&*)(';
	       $token = str_shuffle($token);
	       echo substr($token, 0, 10);
            
            $con->query(query: " INSERT INTO Account_tbl(Username,Email, Password, EmailConfirm,Token) VALUES ('$Username', '$Email', '$Password', '0', '$token'); ");
            
            //send the email wil phpmailer
            
             require($_SERVER["DOCUMENT_ROOT"].'/phpmailer/PHPMailerAutoload.php');
                
            
            use phpmailer/phpmailer/phpmailer;
            
            include_once "phpmailer/phpmailer.php";
            
            $mail = new phpmailer();
            $mail->setFrom(address: "derekmemorial@gmail.com");
            $mail->addAddress($Email, $Username);
            $mail->Subject = "Please Verify your email!";
            $mail->isHTML(isHTML: true);
            $mail->Body = " 
            please click on the link below: <br> <br>
            
            <a href='http://link.com/PHPEmailconfirmation/confirm.php?email=$email&token=$token'>Click here</a>
            ";
             
            if ($mail->send())
                $msg = "You have been registered please verify your email";
            else
                $msg = "Something wrong happend please try again";
        }
    }
         
}
     


?>
     
     
 </html>
 