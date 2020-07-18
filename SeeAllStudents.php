<!DOCTYPE html>
<?php
session_start();
include('Includes/connection.php');   
include('Classes/AdminRegisterClass.php');
include('Classes/StudentRegisterClass.php');
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">    
    <title>Check All Tutors</title>
</head>
<body>
<div class="main">
    <input type="checkbox" id="tick">  
    <!--header area start-->
    <div class="header">
      <label for="tick">
        <i class="fas fa-bars" id="sidebar_Button"></i>
      </label>
      <div class="left">
        <h3>The Tutors <span>Provider</span></h3>
      </div>
      <div class="right">
      <?php    
    $roles = "";    
    $email = "";
    if(!isset($_SESSION["role"]))
    {
        echo"<a href='login.php' class='logout'>Login/Register</a>";
    }
    // elseif(!isset($_SESSION["role"])){
    //     echo"<a href='login.php' class='btn btn-primary'>Login/Register</a>";
    //     }
    else{
        echo"<a href='Logout.php' class='logout'>Logout</a>";                  
        $roles = $_SESSION["role"];  
        $email = $_SESSION["Admin"];  
    }
?>   
      </div>
    </div>
    
   
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">      
      <center>
      <?php
            $image = new Admin();
            $image->AEmail = $email;
            $image->GetAdminImage($image);
        ?>    
        <?php
            $name = new Admin();
            $name->AEmail = $email;
            $name->GetAdminName($name);
        ?>        
      </center>
      <a href="AdminHome.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="SeeAllTutors.php"><i class="fas fa-chalkboard-teacher"></i><span>See All Tutors</span></a>
      <a href="SeeContact.php"><i class="far fa-id-card"></i><span>Check Contact</span></a>
      <a href="AdminChatControl.php"><i class="fas fa-sms"></i><span>Chat Control</span></a>  
      <a href="SeeAllStudents.php"><i class="fas fa-user-graduate"></i><span>See All Students</span></a>
      <a href="InsertAnnouncement.php"><i class="fas fa-bullhorn"></i><span>Insert Announcement</span></a>  
      <a href="#"><i class="fab fa-blogger-b"></i><span>Insert Blogs</span></a>  
      <a href="#"><i class="fas fa-sliders-h"></i><span>Insert Slider</span></a>  
      <a href="#"><i class="fas fa-users-cog"></i><span>Insert Admin</span></a>     
    </div>
    <!--sidebar end-->

    <div class="content" style="background-image: url('Images/home.jpg');  background-repeat: no-repeat;   background-size: cover;">
    <table class="content-table">
        <thead>          
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Student Address</th>
            <th scope="col">Student Contact</th>
            <th scope="col">Student Email/LoginID</th>
            <th scope="col">Student Class</th>
            <th scope="col">Student College</th>            
            <th scope="col">Delete Student</th>            
          </tr>
        </thead>
        <tbody>

<?php
    $std = new StudentRegister();
    $std->GetAllStudents($std);
?>
</tbody>
      </table> 
    </div>
  </div>

</body>
</html>