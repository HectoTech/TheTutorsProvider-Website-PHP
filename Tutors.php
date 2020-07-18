<!DOCTYPE html>
<?php
session_start();
include('Classes/LoginClass.php');
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
    <title>Our Tutors</title>
    <link rel="stylesheet" href="style/Home.css">
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">The Tutors Provider</a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">                      
          <a href="index.php" class="btn btn-info">Back To Home</a>
        </div>
      </nav>
      <br />

      <nav class="navbar">
        <p><center class="heading">Our Qualified Tutors</center></p>
    </nav>  
    <div class='card-deck'>  
      <?php  
      $roles = "";    
     
         include('Includes/connection.php');       
         global $conn;    
         $query5 = "SELECT * FROM tutorreg";          
         $run_query5 = mysqli_query($conn , $query5) or die("Error: " . mysqli_error($conn));
         while($rd5 = mysqli_fetch_array($run_query5))
         {          
          $tid =  $rd5["Tid"];                       
          $Name = $rd5["TName"];        
          $Address = $rd5["TAddress"];
          $Contact = $rd5["TContact"];                    
          $Photo = $rd5["TPhoto"];
          $std_id_meet = 0;
          if(isset($_SESSION['role'])){
            $roles = $_SESSION["role"]; 
          if($roles == "Student"){                                             
            echo"        
          
            <div class='card'>        
            <img src=$Photo class='card-img-top'>    
            <div class='card-body'>
              <h5 class='card-title'>$Name</h5>            
            </div>
            <div class='card-footer'>                                     
            <a href='Details.php?tid=$tid' class='btn btn-info'>Details</a><br /><br />           
            <a href='RequestMeetup.php?tid=$tid' class='btn btn-success'>Request a Meeting</a><br /><br />
          </div>
          </div> ";
          }          
          else if($roles == "Tutor"){
            echo"                   
            <div class='card'>            
              <img src=$Photo class='card-img-top'>            
              <div class='card-body'>
                <h5 class='card-title'>$Name</h5>            
              </div>
              <div class='card-footer'>                                                      
              <a href='Details.php?tid=$tid' class='btn btn-success'>Details</a><br /><br />
              </div>
            </div>            
  
          ";
          }
          }
          if($roles == ""){
          echo" 
                  
          <div class='card'>
            
            <img src=$Photo class='card-img-top'>
            
            <div class='card-body'>
              <h5 class='card-title'>$Name</h5>            
            </div>
            <div class='card-footer'>                                
            <a href='Details.php?tid=$tid' class='btn btn-info'>Details</a><br /><br />
            <a href='RequestMeetup.php?tid=$tid' class='btn btn-success'>Request a Meeting</a><br /><br />
            </div>
          </div>          

        ";
          }
         }   
        
        
      ?>       
      </div>

</body>
</html>