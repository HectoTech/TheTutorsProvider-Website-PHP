<!DOCTYPE html>
<?php
session_start();
include('Classes/Slider.php');
include('Classes/AnnouncementClass.php');
include('Classes/BlogClass.php');
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
    <title>The Tutors Provider</title>
    <link rel="stylesheet" href="style/Home.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" type="text/css" href="style/Home.css"> -->   
</head>
<body style=" background-image: url('Images/home-page.png');  background-repeat: no-repeat;   background-size: cover;">
    <nav class="navbar">
        <img src="Images/Logo.jpg" width="100" style="align-items: center;margin-left: 40%;" height="50" alt="">        
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">The Tutors Provider</a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">           
            <?php    
            $roles = "";    
          if(!isset($_SESSION["role"]))
          {
              echo"<a href='login.php' class='btn btn-primary'>Login/Register</a>";
          }
          elseif(!isset($_SESSION["role"])){
                echo"<a href='login.php' class='btn btn-primary'>Login/Register</a>";
              }
          else{
              echo"<a href='Logout.php' class='btn btn-primary'>Logout</a>";                  
              $roles = $_SESSION["role"];  
          }
            ?>            
          <ul class="navbar-nav ml-auto">            
          <?php                                
          if( $roles == "Tutor")        
          {
            include('Includes/connection.php');  
            $email =  $_SESSION["Tutor"] ; 
            $query4 = "SELECT * FROM tutorreg where TEmail = '$email' ";          
            $run_query4 = mysqli_query($conn , $query4);
            while($rd = mysqli_fetch_array($run_query4))
            {                                       
                $Address = $rd["TAddress"];
                $Contact = $rd["TContact"];
            }        
            if($Address == "" && $Contact == ""){
              echo"<a href='CompleteInfo.php' class='btn btn-warning'>Complete your information</a>";                    
                }
          }
          elseif($roles == "Student"){
            
            include('Includes/connection.php');  
            $email1 =  $_SESSION["Std"] ; 
            $query3 = "SELECT * FROM studentreg where SEmail = '$email1' ";          
            $run_query3 = mysqli_query($conn , $query3);
            $std_id = 0;
            while($rd1 = mysqli_fetch_array($run_query3))
            {                         
                $std_id = $rd1["Sid"];
                $SAddress = $rd1["SAddress"];
                $SContact = $rd1["SContact"];
            }        
            if($SAddress == "" && $SContact == ""){
              echo"<a href='CompleteInfo.php' class='btn btn-warning'>Complete your information</a>";                    
                }
                // echo"<a href='Chat.php?sid=$std_id' class='chat'><i class='fal fa-comment'></i></a>";
              }           
              
          ?>
          
            <li class="nav-item active">              
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  About
                </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="AboutOwner.php">The CEO</a>
                  <a class="dropdown-item" href="AboutComp.php">The Tutors Providers</a>                
              </div>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#tutor">Tutors</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#news">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#story">Success Stories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#blog">Blogs</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="Contact.php">Contact</a>
            </li>            
          </ul>
        </div>
      </nav>      
      <a href="" class="upbtn"><i class="fas fa-arrow-up"></i></a>
      
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>        
        <div class="carousel-inner">          
        <?php
        $slide = new Slider();
        $slide->RecoverSlider($slide);
        ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="story">
      <nav class="navbar">
        <p><center class="heading">Success Stories</center></p>
    </nav>
      <div class="container">
        <div class="abc row">
            <div class="coll">            
                <img src="Images/Bcat.png" width="100" height="60" alt="">            
                <p class="counter">2000</p>
                <p class="counter-text">Addmission Test Success Stories</p>
            </div>
            <div class="coll">            
                <img src="Images/tution.png" width="100" height="60" alt="">            
                <p class="counter">2000</p>
                <p class="counter-text">Home Tutors Provided</p>
            </div>
            <div class="coll">            
                <img src="Images/future.png" width="100" height="60" alt="">            
                <p class="counter">2000</p>
                <p class="counter-text">Future Counsellings</p>
            </div>
            <div class="coll">            
                <img src="Images/online.png" width="100" height="60" alt="">            
                <p class="counter">2000</p>
                <p class="counter-text">Online Tutions Provided</p>
            </div>
    </div>
    </div>
    </div>
    <?php
      if($roles == "Student")
      {
        echo"<a href='Chat.php?sid=$std_id' class='chat'><i class='fal fa-comment'></i></a>";
      }
    ?>
    <div id="tutor">
    <nav class="navbar">
        <p><center class="heading">Top Tutors</center></p>
    </nav>  
    <div class='card-deck'>  
      <?php
         include('Includes/connection.php');       
         global $conn;    
         $query5 = "SELECT * FROM tutorreg limit 3";          
         $run_query5 = mysqli_query($conn , $query5) or die("Error: " . mysqli_error($conn));
         while($rd5 = mysqli_fetch_array($run_query5))
         {          
          $tid =  $rd5["Tid"];                       
          $Name = $rd5["TName"];        
          $Address = $rd5["TAddress"];
          $Contact = $rd5["TContact"];                    
          $Photo = $rd5["TPhoto"];
          $std_id_meet = 0;

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
          elseif($roles == ""){
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
      <a href="Tutors.php" class="btn btn-primary centered">See More</a>    
      <div id="news">
      <nav class="navbar">
        <p><center class="heading">Latest Announcement and Study Plans</center></p>
      </nav>
      <div class="card-deck">
      <?php
         $Announcements = new Announcement();
         $Announcements->RecoverAnnouncement($Announcements);
      ?>
    </div>
    <a href="Announcement.php" class="btn btn-primary centered">See More</a>    
    </div>
    
    <div id="blog">
    <nav class="navbar">
      <p><center class="heading">Blogs</center></p>
    </nav>

    <div class="card-deck">
    <?php
         $Blog = new Blog();
         $Blog->RecoverBlog($Blog);
      ?>
    </div>
    <a href="Blog.php" class="btn btn-primary centered">See More</a>    
    </div>
    <script src="jquery.counterup.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>    
    <script>
        jQuery(document).ready(function($){
            $('.counter').counterUp({
            delay: 10,
            time: 1000
            });
        });
    </script>      
</body>
</html>