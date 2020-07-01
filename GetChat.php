<?php
session_start();
include('Includes/connection.php');   

$email1 =  $_SESSION["Std"] ; 
$query3 = "SELECT * FROM studentreg where SEmail = '$email1' ";          
$run_query3 = mysqli_query($conn , $query3);
while($rd1 = mysqli_fetch_array($run_query3))
{                         
    $std_id = $rd1["Sid"];    
}        
$result = $conn->query("SELECT * FROM chat where Sid = $std_id");
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row['Time'] . '<br />';
        echo $row['Message'] . '<br />';        
    }
}

?>