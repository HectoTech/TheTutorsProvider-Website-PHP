<!DOCTYPE html>
<?php
include('Classes/LoginClass.php');
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="style/Login-Style.css">
    <style>
      .butt{
    color: white !important;
    background : blue !important;
}
    </style>
</head>
<body style=" background-image: url('Images/home-page.png');  background-repeat: no-repeat;   background-size: cover;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">The Tutors Provider</a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
         
        </div>
      </nav>
      <br />
    <header>
        <div class="main-header">
            <h1>Login</h1>
            <hr/>
            <h3>Welcome to The Tutor's Provider Website</h3>
            <form action="Login.php" method="post" enctype="multipart/form-data">
            <input type="email" name="email" id="email" placeholder="Username" required><br />
            <input type="password" name="pass" id="pass" placeholder="Password" required><br />
            <a href="RegisterTutor.php">Do not have account..? Register as Tutor</a><br />
            <a href="RegisterStudent.php">Do not have account..? Register as Student</a><br />            
            <a href="ForgotPass.php">Forgot password..?</a>            <br />                    
            <input type="submit" class="btn btn-primary butt" name="Signin_Log" id="" value="Login">
            </form>
            <?php
            if(isset($_POST['Signin_Log'])){
              $Log = new Login();
              $Log->Email = $_POST['email'];
              $Log->Password =  $_POST['pass'];   
              $Log->Signin($Log);
            }
            ?>
            <br />
        </div>
    </header>
</body>
</html>