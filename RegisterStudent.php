<!DOCTYPE html>
<?php
include('Classes/StudentRegisterClass.php');
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
    <title>Register Yourself</title>
    <!-- <link rel="stylesheet" href="style/Login-Style.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.butt{
    color: white !important;
    background : blue !important;
}
:root{
    --main-font:'pacifico',cursive;
}
body{
    background-image: url('Images/home-page.png');
    background-repeat: no-repeat;
    background-size: cover;
}
header{
    /* height: 100vh; */
    width: 100%;    
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    user-select: none;    
}
.main-header{
    text-align: center;    
    transform: 1s;
}
.main-header:hover{
    -webkit-box-shadow: 6px -7px 51px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 6px -7px 51px 0px rgba(0,0,0,0.75);
box-shadow: 6px -7px 51px 0px rgba(0,0,0,0.75);
}
.main-header h1{
    font-size: 3rem;
    font-family: var(--main-font);
    color: blue;
    margin: 20px;
}
.main-header h3{
    font-size: 1.5rem;    
    margin: 20px;
    color: palevioletred;
}
.main-header hr{
    width: 50%;
    padding: 5px;
    margin: auto;
    border: none;
    background-color: yellow;
    color: black;
}
.main-header input{
    width: 90%;
    padding: 1rem;
    margin: 20px;
    border: none;
    border-bottom: 2px solid gray;
    /* font-size: 1.3rem; */
    background: transparent;
    outline: none;
}
.main-header input:hover{
    border: 1px solid yellow;
}
.main-header input:focus{
    border: 1px solid yellow;
}
.main-header button{
    padding: 1rem 3rem;
    font-size: 1rem;
    width : 250px;
    background: blue;
    color: papayawhip;
    border: none;
    /* border-radius: 50px; */
    cursor: pointer;
    /* transition: 1s;*/
} 
/* .main-header button:hover{
    transform: scale(2,1);
} */
.main-header a{
    font-size: 20px;
    color:blue ;
    text-decoration: none;
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
            <a href="Login.php" class="btn btn-primary">Login/Register</a>
        
        </div>
      </nav>
      <br />
    <header>
        <div class="main-header">
            <h1>Student Registration</h1>
            <hr/>
            <h3>Welcome to The Tutor's Provider Website</h3>
            <form action="RegisterStudent.php" method="post" enctype="multipart/form-data">
            <input type="text" name="Name" id="" placeholder="Student's Full Name">            
            <input type="email" name="email" id="email" placeholder="Email Address"><br />
            <input type="password" name="pass" id="pass" placeholder="Password"><br />
                    
            <span>By Registration You are bound to </span><a href="TermsStudents.html">Our Terms and Condition</a><br />
            <input type="submit" class="btn btn-primary butt" name="SignUpStd" id="" value="SignUp">   
            </form>

            <?php
             if(isset($_POST['SignUpStd'])){
                $std = new StudentRegister();
                $std->Sname = $_POST['Name'];
                $std->Semail = $_POST['email'];
                $std->Spass =  $_POST['pass'];

                $std->SignUp_Std($std);
             }
            ?>
            <br />
            <!-- <button>Register with Google</button> -->
        </div>
    </header>
    <br />
</body>
</html>