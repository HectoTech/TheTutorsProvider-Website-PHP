<?php
class Login{
    public $Email;
    public $Password;

    public function Signin(Login $l){
        include('Includes/connection.php');        
        $query = "SELECT * FROM login where Email = '$l->Email' AND Pass = '$l->Password' ";          
        $run_query = mysqli_query($conn , $query);
        $o_Email = "";                 
        $o_Pass = "";
        $o_role = "";
        while($rd = mysqli_fetch_array($run_query))
        {           
        $o_Email = $rd["Email"];                 
        $o_Pass = $rd["Pass"];
        $o_role = $rd["role"];
        }
        if($o_Email == $l->Email && $o_Pass == $l->Password && $o_role == "Admin")
        {
        $_SESSION["Admin"] = $l->Email;
        echo "<script>alert('Welcome Admin')</script> ";
        echo"  <script>window.location.href = 'AdminHome.php'</script>";  
        $_SESSION["role"] = $o_role;
        }
        else if($o_Email == $l->Email && $o_Pass == $l->Password && $o_role == "Student")
        {
        $_SESSION["Std"] = $l->Email;        
        $_SESSION["role"] = $o_role;
        echo "<script>alert('Welcome Student')</script> ";
        echo"  <script>window.location.href = 'index.php'</script>";  
        }
        else if($o_Email == $l->Email && $o_Pass == $l->Password && $o_role == "Tutor")
        {
        $_SESSION["Tutor"] = $l->Email;
        $_SESSION["role"] = "Tutor";
        echo "<script>alert('Welcome Tutor')</script> ";
        echo"  <script>window.location.href = 'index.php'</script>";  
        }
        else{
        echo "<script>alert('Invalid UserID Or Password')</script> ";
        exit();
        }
    }
}




?>