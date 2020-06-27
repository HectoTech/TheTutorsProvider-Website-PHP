<?php

class PasswordForgot{
    
    public $PEmail;
    public $PPassState;    

    public function RecoverPassword(PasswordForgot $rec){
        include('Includes/connection.php');                 
        $O_Pass =  "";
        $O_Email = "";        
        $query = "SELECT * FROM login where Email = '$rec->PEmail' AND PassRec = '$rec->PPassState' ";                    
        $run_query = mysqli_query($conn , $query);
        while($rd = mysqli_fetch_array($run_query))
        {           
          $O_Pass = $rd["Pass"];                           
          $O_Email = $rd["Email"];                           
        }
        if($O_Email == $rec->PEmail){
          echo "<script>alert('your password is $O_Pass ');</script> ";
        }
        else{
          echo "<script>alert('Invalid Email OR Statement');</script> ";
        }                

    }
}

?>