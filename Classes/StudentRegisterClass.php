<?php

class StudentRegister{

    public $Sname;
    public $Semail;
    public $Spass;
    public $Srole = "Student";
    public $Saddress;
    public $Scontact;
    public $Sclass;
    public $Spassrec;
    public $Scollege;
    public $Sid;
    public function SignUp_Std(StudentRegister $S){
        include('Includes/connection.php'); 
        // global $conn;
        $query = "INSERT INTO studentreg (SName,SEmail,SPass,role) VALUES('$S->Sname' , '$S->Semail' , '$S->Spass' ,'$S->Srole' )";                    
        $query1 = "INSERT INTO login (Email,Pass,role) VALUES('$S->Semail' , '$S->Spass' , '$S->Srole')";                    
        $is_inserted_login = mysqli_query($conn,$query1);
        $is_inserted = mysqli_query($conn,$query);
        if($is_inserted && $is_inserted_login)
        {
            echo "<script>alert('Thank You For Registeration')</script>";
            echo"  <script>window.location.href = 'Login.php'</script>"; 
        }
        else{
            echo "<script>alert('fill all fields Correctly')</script>";
        }                
    }
    public function CompleteInfo(StudentRegister $C){
        include('Includes/connection.php'); 
        $query_update = "UPDATE studentreg SET SAddress = '$C->Saddress', SContact = '$C->Scontact' , PassRec = '$C->Spassrec' , SClass = '$C->Sclass' , SCollege = '$C->Scollege'  where Sid = '$C->Sid' ";                                        
        $is_Completed = mysqli_query($conn,$query_update);
        if($is_Completed)
        {
            echo "<script>alert('Thank You For Completion')</script>";
            echo"  <script>window.location.href = 'index.php'</script>"; 
        }
        else{
            echo "<script>alert('fill all fields Correctly')</script>";
        }          
    }
}


?>