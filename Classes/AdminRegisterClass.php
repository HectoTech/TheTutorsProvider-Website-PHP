
<?php

class Admin{        
            
    public $Aid;
    public $AName;    
    public $AEmail;        
    public $APass ;
    public $APassRec;    
    public $AImage;    
    public $role = "Admin";  
    public function InsertAdmin(Admin $a){ 
        include('Includes/connection.php');                          
        $query_insert_admin = "INSERT INTO adminreg (AName,AEmail,APass,role,PassRec,AdminImage) VALUES('$a->AName , '$a->AEmail' , '$a->APass' , '$a->role' , '$a->APassRec' , '$a->AImage')";                    
        $is_inserted_admin = mysqli_query($conn,$query_insert_admin);        
        if($is_inserted_admin)
        {
            echo "<script>alert('Admin Inserted Successfully')</script>";
            // echo"  <script>window.location.href = 'Login.php'</script>"; 
        }
        else{
            echo "<script>alert('fill all fields Correctly')</script>";
        }               
    }
    public function GetAdminName(Admin $a){        
        include('Includes/connection.php'); 
        $query_ann = "SELECT AName FROM adminreg where AEmail = '$a->AEmail' ";                    
        $run_query = mysqli_query($conn , $query_ann);
        while($rd = mysqli_fetch_array($run_query))
        {           
         $name = $rd['AName'];
        }
            
           echo "<h3>$name</h3>";
        
    }
    public function GetAdminImage(Admin $a){        
        include('Includes/connection.php'); 
        $query_ann = "SELECT AdminImage FROM adminreg where AEmail = '$a->AEmail' ";                    
        $run_query = mysqli_query($conn , $query_ann);
        while($rd = mysqli_fetch_array($run_query))
        {           
         $Image = $rd['AdminImage'];
        }
            
           echo "<img src=$Image class='profile'>";
        
    }


}

?>