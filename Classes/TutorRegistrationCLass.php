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
    public $experience;
    public $Attract_statement;        
    public $university;
    public $TCode;

    public function SignUp_Tut(TutorRegister $T){
        include('Includes/connection.php'); 
        // global $conn;         
        $a = rand(10,100000); 
        $b = rand(10,10000); 
        $name_code = 'TP#' .$a . $b;        
        $query = "INSERT INTO tutorreg (TName,TCode,TEmail,TPass,role) VALUES('$T->Tname' ,'$name_code', '$T->Temail' , '$T->Tpass'  ,'$T->Trole' )";                    
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
        $query_update = "UPDATE tutorreg SET TAddress = '$C->Taddress', TContact = '$C->Tcontact' , PassRec = '$C->Tpassrec' , TCnic = '$C->Tcnic', TCV = '$C->Tcv', TDemo = '$C->Tdemo', TPhoto = '$C->Tphoto' , Mode = '$C->Tmode', Subjects = '$C->Tsubjects', Location = '$C->TLocation', City = '$C->Tcity' , Experience = '$C->experience' , Attract_Statement = '$C->Attract_statement' , University = '$C->university' where Tid = '$C->Tid' ";                                        
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
    public function GetAllTutors(TutorRegister $t){
        include('Includes/connection.php');                          
        $query_tutor = "SELECT * FROM tutorreg";                    
        $is_get_tutor = mysqli_query($conn,$query_tutor);                
        while($rd5 = mysqli_fetch_array($is_get_tutor))
        {                         
            $t->tid =  $rd5["Tid"];                       
            $t->Name = $rd5["TName"];        
            $t->Address = $rd5["TAddress"];
            $t->Contact = $rd5["TContact"]; 
            $t->Cv = $rd5["TCV"];                                
            $t->Photo = $rd5["TPhoto"];
            $t->code = $rd5["TCode"];
            $t->Demo = $rd5["TDemo"];
            $t->Mode = $rd5["Mode"];            
            $t->Cnic = $rd5["TCnic"];  
            $t->City = $rd5["City"];                                
            $t->experience = $rd5["Experience"];  
            $t->University = $rd5["University"];  
            $t->Subject = $rd5["Subjects"];                 
            echo"
            <tr>            
            <td>$t->tid</td>
            <td >$t->Name</td>
            <td>$t->Address</td>
            <td>$t->Contact</td>
            <td>$t->code</td>
            <td>$t->Mode</td>
            <td>$t->City</td>
            <td>$t->experience</td>
            <td>$t->University</td>
            <td>$t->Subject</td>
            <td><a href='DownloadDemo.php?tdemo=$t->Demo' class='logout'>Download</a></td>
            <td><a href='DownloadCV.php?tcv=$t->Cv' class='logout'>Download</a></td>
            <td><a href='DownloadCnic.php?tcnic=$t->Cnic' class='logout'>Download</a></td>
            <td><a href='Delete.php?tid=$t->tid' class='logout'>Delete</a></td>                        
            <td><img src=$t->Photo class='profile' width=50 height=50 /></td>            
          </tr>
            ";
        }          
    }   
}


?>

