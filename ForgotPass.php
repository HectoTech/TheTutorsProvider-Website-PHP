<!DOCTYPE html>
<?php
include('Classes/PassRecoveryClass.php');
// session_start();
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
    <title>Forgot Password?</title>
    <link rel="stylesheet" href="style/Login-Style.css">    
    <style>
          .butt{
    color: white !important;
    background : blue !important;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">The Tutors Provider</a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <a href="Login.php" class="btn btn-primary">Login/Register</a>
          
        </div>
      </nav>
      <br />
      <header>
        <div class="main-header">
            <h1>Password Recovery</h1>
            <hr/>
            <h3>Welcome to The Tutor's Provider Website</h3>
            <form action="ForgotPass.php" method="post" enctype="multipart/form-data">
            <input type="email" name="email"  placeholder="Write Your Email" required><br />
            <input type="text" name="passRecovery"  placeholder="Password Recovery Statement" required><br />                             
            <input type="submit" class="btn btn-primary butt" name="PassRec" id="" value="Recover Password">
            </form>           
            <br />
            <?php
                if(isset($_POST['PassRec']))
                {     
                    $fpr = new PasswordForgot();                                         
                    $fpr->PEmail = $_POST['email'];      
                    $fpr->PPassState =  $_POST['passRecovery'];  
                    $fpr->RecoverPassword($fpr);
                }
            ?>
        </div>
    </header>
</body>
</html>