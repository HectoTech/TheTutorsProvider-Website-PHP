<!DOCTYPE html>
<?php
include('Classes/TutorRegistrationCLass.php');
include('Classes/StudentRegisterClass.php');
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
    <title>Complete Bio</title>
    <link rel="stylesheet" href="style/completeform.css">       
    <style>
        .main-header textarea:hover{
    border: 1px solid yellow;
}
@import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root{
    --main-font:'pacifico',cursive;
}
.main-header h1{
    font-size: 3rem;
    font-family: var(--main-font);
    color: blue;
    margin: 20px;
}
.main-header label{
    width: 90%;
    padding: 1rem;
    margin: 20px;
    border: none;
    border-bottom: 2px solid gray;
    /* font-size: 1.3rem; */
    background: transparent;
    text-align:left;
    outline: none;
}
.butt{
    color: white !important;
    background : blue !important;
}
.main-header label:hover{
    border : 1px solid yellow;
}
.main-header{
    width : 500px;
}
    </style>
</head>
<body style=" background-image: url('Images/home-page.png');  background-repeat: no-repeat;   background-size: cover;"> 
    <br />
<header>
    <br />
    <?php
        if($_SESSION["role"] == "Student"){        
    ?>
        <div class="main-header">
            <h1>Complete Your Information student</h1>
            <hr/>
            <h3>Welcome to The Tutor's Provider Website</h3>
            <form action="CompleteInfo.php" method="post" enctype="multipart/form-data"> 
            <input type="number" name="Scontact" id="" placeholder="Contact Number" required>
            <input type="text" name="SPassRec" id="" placeholder="Password Recovery Statement" required>
            <input type="text" name="Class" id="" placeholder="Class Of Studying" required>            
            <input type="text" name="Inst" id="" placeholder="Institute Of Studying" required>
            <textarea name="SAddress" cols="60" rows="5" placeholder="Permanent Address" required></textarea>
            <br />            
            <input type="submit" class="btn btn-primary butt" name="Scomp" id="" value="Submit Information">
            </form>     
            <?php  
            if(isset($_POST['Scomp'])){   
                include('Includes/connection.php');   
                $Scom = new StudentRegister();                            
                $email =  $_SESSION["Std"] ; 
                $query4 = "SELECT * FROM studentreg where SEmail = '$email' ";          
                $run_query4 = mysqli_query($conn , $query4);
                while($rd = mysqli_fetch_array($run_query4))
                {           
                    $Scom->Sid = $rd["Sid"];        
                }                       
                $Scom->Saddress = $_POST['SAddress'];
                $Scom->Scontact = $_POST['Scontact'];
                $Scom->Spassrec = $_POST['SPassRec'];                
                $Scom->Sclass = $_POST['Class'];  
                $Scom->Scollege = $_POST['Inst'];          
                $Scom->CompleteInfo($Scom);
            }
            ?>     
            <br />
        </div>
    </header>
    <br/>
    <?php
        }      
        elseif($_SESSION["role"] == "Tutor"){        
    ?>
        <div class="main-header">
            <h1>Complete Your Information tutor</h1>
            <hr/>
            <h3>Welcome to The Tutor's Provider Website</h3>
            <form action="CompleteInfo.php" method="post" enctype="multipart/form-data">                                
                <input type="number" name="contact" id="" placeholder="Contact Number" required>               
                <input type="text" name="PassRec" id="" placeholder="Password Recovery Statement" required>
                <select name="Mode" class="selectbox" required>
                    <option selected>Select Mode of Teaching</option>
                    <option value="Home Tution">Home Tution</option>
                    <option value="Online Tution">Online Tution</option> 
                </select>
                <input type="text" name="Subjects" id="" placeholder="Enter Teaching Subjects e.g: phy , chem etc" required>
                <input type="text" name="Loc" id="" placeholder="Location of teaching" required>
                <input type="text" name="City" id="" placeholder="Your City" required>                                                             
                <input type="file" name="Demo" id="img"  style="display:none;" required/>  
                <label for="img">Click me to upload Demo Teaching Video</label>     
                <input type="file" name="Cnic" id="img1"  style="display:none;" required/>
                <label for="img1">Click me to upload CNIC Picture</label>         
                <input type="file" name="Photo" id="img2"  style="display:none;" required/>
                <label for="img2">Click me to upload Professional Picture</label>
                <input type="file" name="Cv" id="img3"  style="display:none;" required/>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  />
                <label for="img3">Click me to upload Professional Resume</label>        
                <textarea name="Address" cols="60" rows="5" placeholder="Permanent Address" required></textarea>
                <input type="submit" class="btn btn-primary butt" name="comp" id="" value="Submit Information">
            </form>        
            <?php         
            if(isset($_POST['comp'])){   
                include('Includes/connection.php');   
                $com = new TutorRegister();          
                $email =  $_SESSION["Tutor"] ; 
                $query4 = "SELECT * FROM tutorreg where TEmail = '$email' ";          
                $run_query4 = mysqli_query($conn , $query4);
                while($rd = mysqli_fetch_array($run_query4))
                {           
                    $com->Tid = $rd["Tid"];        
                }                       
                $com->Taddress = $_POST['Address'];
                $com->Tcontact = $_POST['contact'];
                $com->Tpassrec = $_POST['PassRec'];                
                $Photo = $_FILES["Photo"]["name"];
                $Photo_temp = $_FILES["Photo"]['tmp_name'];
                $info = pathinfo($_FILES["Photo"]["name"]);                
                $ext = $info['extension']; // get the extension of the file
                $newname =  $email.  '.'  .$ext; 
                $target = 'Images/Tutors/'.$newname;
                $com->Tphoto = $target;                
                move_uploaded_file( $Photo_temp, $target);                            
                $com->Tmode = $_POST['Mode'];
                $com->Tsubjects = $_POST['Subjects'];
                $com->TLocation = $_POST['Loc'];
                $com->Tcity = $_POST['City'];
                $Cv = $_FILES["Cv"]["name"];
                $Cv_temp = $_FILES["Cv"]['tmp_name'];
                $info1 = pathinfo($_FILES["Cv"]["name"]);                
                $ext1 = $info1['extension']; // get the extension of the file
                $newname_cv =  $email.  '.'  .$ext1; 
                $target1 = 'Images/Tutors/CV/'.$newname_cv;
                $com->Tcv = $target1;
                move_uploaded_file( $Cv_temp , $target1);                               
                $demo = $_FILES["Demo"]["name"];
                $demo_temp = $_FILES["Demo"]['tmp_name'];
                $info2 = pathinfo($_FILES["Demo"]["name"]);                 
                $ext2 = $info2['extension'];
                $newname_demo =  $email.  '.'  .$ext2; 
                $target2 = 'Images/Tutors/Demo/'.$newname_demo;
                $com->Tdemo = $target2;
                move_uploaded_file( $demo_temp , $target2);   
                //cnic
                $cnic = $_FILES["Cnic"]["name"];
                $cnic_temp = $_FILES["Cnic"]['tmp_name'];
                $info3 = pathinfo($_FILES["Cnic"]["name"]);                
                $ext3 = $info3['extension']; // get the extension of the file
                $newname_cnic =  $email.  '.'  .$ext3; 
                $target3 = 'Images/Tutors/Cnic/'.$newname_cnic;
                $com->Tcnic = $target3;
                move_uploaded_file( $cnic_temp , $target3);   
                $com->CompleteInfo($com);
            }
            ?>  
            <br />
        </div>
    </header>
    <br/>
    <?php
        }
    ?>
</body>
</html>