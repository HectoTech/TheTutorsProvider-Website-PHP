<?php
  class EmailSend{
    //attributes
    public $Name;
    public $Subject;
    public $Body;

    //method

    public function SendEmail(EmailSend $e){
        include('Includes/connection.php'); 
        require_once('PHPMailerAutoload.php');
        require_once('class.phpmailer.php');
        require_once('class.smtp.php');
        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '<sender email>';                 // SMTP username
        $mail->Password = '<sender password>';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('<sender email>', 'Customer Care of The Tutors Provider');
        $mail->addAddress('<sender email>', $e->Name);     // Add a recipient        
        $mail->addReplyTo('<sender email>');    
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $e->Subject;
        $mail->Body    = $e->Body;
        
        $query1 = "INSERT INTO contact (NAme,Email,Message) VALUES('$e->Name' , '$e->Subject' , '$e->Body')";                    
        $is_inserted_login = mysqli_query($conn,$query1);

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {            
            echo "<script>alert('Message has been sent')</script>";
        }    
                }
}
?>
