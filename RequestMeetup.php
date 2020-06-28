<?php
session_start();
$roles = $_SESSION["role"];  
if($roles != ""){
    if(isset($_GET["tid"]))
        {
        include('Includes/connection.php');  
        $Tutor_id = $_GET["tid"];  
        $meet_id = 0;      
        $std_email = $_SESSION["Std"];
            //getting student detail
        $query_std_get = "SELECT * FROM studentreg where SEmail = '$std_email' ";          
        $run_query_std_get = mysqli_query($conn , $query_std_get);
        while($rd_std_get = mysqli_fetch_array($run_query_std_get))
        {                                       
            $std_id = $rd_std_get["Sid"];       
            $Std_name = $rd_std_get["SName"];       
        }
        $query_meet = "SELECT * FROM meeting where Tid = '$Tutor_id' AND Sid = '$std_id' ";          
        $run_query_meet = mysqli_query($conn , $query_meet);
        while($rd_meet = mysqli_fetch_array($run_query_meet))
        {                                       
            $meet_id = $rd_meet["Mid"];                   
        }
        if($meet_id == 0){
            $query_tut_get = "SELECT * FROM tutorreg where Tid = '$Tutor_id' ";          
            $run_query_tut_get = mysqli_query($conn , $query_tut_get);
            while($rd_tut_get = mysqli_fetch_array($run_query_tut_get))
            {                                            
                $tut_name = $rd_tut_get["TName"];       
            }
    
            //inserting details to the meeting table
            $query_meet_ins = "INSERT INTO meeting (Tid,TName,Sid,SName) VALUES('$Tutor_id' , '$tut_name' , '$std_id' , '$Std_name')";                    
            $is_inserted_meet = mysqli_query($conn,$query_meet_ins);        
            if($is_inserted_meet)
            {
                echo "<script>alert('Meeting is Requested...wait for the response..Thank You')</script>";
                echo"  <script>window.location.href = 'index.php'</script>"; 
            }
            else{
                echo "<script>alert('There is some problem in meeting..sorry for the inconvenience')</script>";
            }               
        }
        else{
            echo "<script>alert('You have already Requested')</script>";
            echo"  <script>window.location.href = 'index.php'</script>"; 
        }
        
        //getting tutor details   
      
        }
    }
    else{
        echo "<script>alert('Please Login with Student Account To Request a Demo')</script>";
        echo"  <script>window.location.href = 'index.php'</script>"; 
    }
?>