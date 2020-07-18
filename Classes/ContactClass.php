<?php
  class EmailSend{
    //attributes
    public $Cid;
    public $Name;
    public $email;
    public $Body;

    //method

    public function SendEmail(EmailSend $e){
        include('Includes/connection.php'); 
        // require_once('PHPMailerAutoload.php');
        // require_once('class.phpmailer.php');
        // require_once('class.smtp.php');
        // $mail = new PHPMailer;

        // $mail->SMTPDebug = 0;                               // Enable verbose debug output

        // $mail->isSMTP();                                      // Set mailer to use SMTP
        // $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;                               // Enable SMTP authentication
        // $mail->Username = 'muhammad.faraz9@yahoo.com';                 // SMTP username
        // $mail->Password = 'faraz@NED123';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;                                    // TCP port to connect to

        // $mail->setFrom('muhammad.faraz9@yahoo.com', 'Customer Care of The Tutors Provider');
        // $mail->addAddress( $e->email, $e->Name);     // Add a recipient        
        // $mail->addReplyTo($e->email);    
        // $mail->isHTML(true);                                  // Set email format to HTML

        // $mail->Subject = $e->email;
        // $mail->Body    = $e->Body;
        
        $query1 = "INSERT INTO contact (NAme,Email,Message) VALUES('$e->Name' , '$e->email' , '$e->Body')";                    
        $is_inserted_login = mysqli_query($conn,$query1);
        if($is_inserted_login){
            echo "<script>alert('Message has been sent')</script>";
        }
        else{
            echo "<script>alert('There is some problem in sending..wait please')</script>";
        }

        // if(!$mail->send()) {
        //     echo 'Message could not be sent.';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        // } else {            
        //     echo "<script>alert('Message has been sent')</script>";
        // }    
                }
        public function GetAllContacts(EmailSend $em){
            include('Includes/connection.php');                          
            $query_contact = "SELECT * FROM contact";                    
            $is_get_contact = mysqli_query($conn,$query_contact);                
            while($rd5 = mysqli_fetch_array($is_get_contact))
            {   
                $em->Cid =  $rd5["Cid"];                       
                $em->Name =  $rd5["Name"];                       
                $em->email = $rd5["Email"];        
                $em->Body = $rd5["Message"];
                
                echo"
                <tr>            
                <td>$em->Name</td>
                <td>$em->email</td>
                <td>$em->Body</td>                        
                <td><a href='Delete.php?cid=$em->Cid' style='margin-top:10px;' class='logout'>Delete</a></td>                        
                </tr>
                ";
            }     
        }     
}
?>
