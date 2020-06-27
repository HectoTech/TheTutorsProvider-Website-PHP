<!DOCTYPE html>
<?php
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
    <link rel="stylesheet" href="Style.css">    
    <title>About-CEO</title>    
    <style>
        .img-wrap{
    width: 100%;
}
.img-wrap img{
    width: 200px;
    border-radius: 50%;
}
label{
    font-size : 20px;
    font-weight : bold;
    color : purple;
}
@media only screen and (max-width: 550px) {
    .img-wrap img{
      margin-left : 130px;
      align-items: center;
      align-content: center;
    }
    .container{
        /* background-color: rebeccapurple; */
        margin-top : 0px ;
    }
  }
    </style>
</head>
<body>
<?php

if(isset($_GET["tid"]))
        {
        include('Includes/connection.php');  
        $Tutor_id = $_GET["tid"];        
        $query4 = "SELECT * FROM tutorreg where Tid = '$Tutor_id' ";          
        $run_query4 = mysqli_query($conn , $query4);
        while($rd5 = mysqli_fetch_array($run_query4))
        {                                       
            $Cv = $rd5["TCV"];
            $Demo = $rd5["TDemo"];
            $Mode = $rd5["Mode"];            
            $City = $rd5["City"];            
            $Name = $rd5["TName"];                                
            $Photo = $rd5["TPhoto"];          
        }             
        echo "
            
            <div class='container' style='margin-top:100px ;'>
            <div class='row'>
                <div class='col-sm-5'>
                    <div class='img-wrap'>
                        <img src='$Photo' class='img-ceo'>                        
                    </div>
                </div>
                <div class='col-sm-7'>
                    <h1 class='text-center'>$Name</h1>
                    <label>Mode of Teaching</label>
                    <p class='card-text text-info'>$Mode</p>
                    <label>City of Teaching</label>
                    <p class='card-text text-info'>$City</p>
                    <label>Download Demo Video Lecture</label><br />
                    <a href='DownloadDemo.php?tdemo=$Demo'>Download Lecture Link</a><br /><br />
                    <label>Download Resume of Teacher</label><br />
                    <a href='DownloadCv.php?tcv=$Cv'>Download Resume Link</a>                
                    
                </div>                
            </div>
            </div>
        ";
    }

?>
</body>
</html>
