<?php

class TutorRegister{

    public $Tname;
    public $Temail;
    public $Tpass;
    public $Trole = "Tutor";
    public $Taddress;
    public $Tcontact;
    public $Tcnic;
    public $Tcity;
    public $Tmode;
    public $TLocation;
    public $Tsubjects;
    public $Tpassrec;
    public $Tphoto;
    public $Tdemo;
    public $Tcv;
    public $Tid;

    public function SignUp_Tut(TutorRegister $T){
        include('Includes/connection.php'); 
        // global $conn;                 
        $query = "INSERT INTO tutorreg (TName,TEmail,TPass,role) VALUES('$T->Tname' , '$T->Temail' , '$T->Tpass'  ,'$T->Trole' )";                    
        $query1 = "INSERT INTO login (Email,Pass,role) VALUES('$T->Temail' , '$T->Tpass' , '$T->Trole')";                    
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

    public function CompleteInfo(TutorRegister $C){
        include('Includes/connection.php'); 
        $query_update = "UPDATE tutorreg SET TAddress = '$C->Taddress', TContact = '$C->Tcontact' , PassRec = '$C->Tpassrec' , TCnic = '$C->Tcnic', TCV = '$C->Tcv', TDemo = '$C->Tdemo', TPhoto = '$C->Tphoto' , Mode = '$C->Tmode', Subjects = '$C->Tsubjects', Location = '$C->TLocation', City = '$C->Tcity' where Tid = '$C->Tid' ";                                
        // $query = "INSERT INTO tutorreg (TAddress,TContact,TCnic,TCV,TDemo,TPhoto,PassRec,Mode,Subjects,Location,City) VALUES('$C->Taddress' , '$C->Tcontact' , '$C->Tcnic' , '$C->Tcv' , '$C->Tdemo' , '$C->Tphoto' , '$C->Tpassrec' , '$C->Tmode' , '$C->Tsubjects' , '$C->TLocation' , '$C->Tcity')";                    
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