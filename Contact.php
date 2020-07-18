<!DOCTYPE html>
<?php
include('Classes/ContactClass.php');
session_start();
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
    <title>Contact Us</title>    
    <link rel="stylesheet" href="style/ContactStyle.css">
    <style>
        #contact-section{
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.9)),url("Images/contact.jpg") no-repeat fixed;
    background-size: cover;
    background-position: center;
    /* background-image: url(../Images/contact.jpg); */
    height: 100%;
    width: 100%;    
}

    </style>
</head>
<body>
    <nav class="navbar">
        <img src="Images/Logo.jpg" width="100" style="align-items: center;margin-left: 40%;" height="50" alt="">
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">The Tutors Provider</a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <?php        
          if(!isset($_SESSION["role"]))
          {
              echo"<a href='login.php' class='btn btn-primary'>Login/Register</a>";
          }
          elseif(!isset($_SESSION["role"])){
                echo"<a href='login.php' class='btn btn-primary'>Login/Register</a>";
              }
          else{
              echo"<a href='Logout.php' class='btn btn-primary'>Logout</a>";
          }
          
            ?>     
          <ul class="navbar-nav ml-auto">            
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
              <a class="nav-link" href="index.php#tutor">Tutors</a>
            </li>  
            <li class="nav-item">
                <a class="nav-link" href="index.php#story">Success Stories</a>
              </li>         
            <li class="nav-item">
                <a class="nav-link" href="index.php#blog">Blogs</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="#">News</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="Contact.php">Contact</a>
            </li>            
          </ul>
        </div>
      </nav>
      <div class="embed-responsive embed-responsive-21by9">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5115.129678764388!2d67.05177061452953!3d24.968057872367094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340f3065194fb%3A0x6a11d555ad33a16a!2sSector%2010%20North%20Karachi%20Twp%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1590092732315!5m2!1sen!2s" ></iframe>
      </div>
      <section id="contact-section">
        <div class="container">
          <h2>Contact Us</h2>
          <div class="row">
          <form action="Contact.php" method="post" enctype="multipart/form-data">
            <div class="contact-form">
              <div clas="col">
                <i class="fa fa-map-marker"> </i><span class="form-info">Al-Rahim Arcade A-12 Second-Floor North karachi</span><br />
                <i class="fa fa-phone"> </i><span class="form-info">0340-121620-1</span><br />
                <i class="fa fa-envelope"> </i><span class="form-info">muhammad.faraz9@yahoo.com</span><br />
              </div>
              <div class="col">
                  <input type="text" name="Name" placeholder="Your Name"/><br />
                  <input type="email" name="Email" placeholder="Your Email"/><br />
                  <textarea rows="5" cols="50" name="Body" placeholder="Your Message"></textarea>                  
                  <input class="submit" type="submit" name="Send" value="Send"/>
                </form>
              </div>
              <?php
             if(isset($_POST['Send'])){
                $em = new EmailSend();
                $em->Name = $_POST['Name'];
                $em->email = $_POST['Email'];
                $em->Body = $_POST['Body'];                
                $em->SendEmail($em);
             }
            ?>
              </div>
            </div>          
            
        </div>
    </section>
</body>
</html>