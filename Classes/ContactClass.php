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
        
        
        $query1 = "INSERT INTO contact (NAme,Email,Message) VALUES('$e->Name' , '$e->email' , '$e->Body')";                    
        $is_inserted_login = mysqli_query($conn,$query1);
        if($is_inserted_login){
            echo "<script>alert('Message has been sent')</script>";
        }
        else{
            echo "<script>alert('There is some problem in sending..wait please')</script>";
        }

     
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
