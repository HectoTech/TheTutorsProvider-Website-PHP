<?php
include('Includes/connection.php'); 
if(isset($_GET["sid"]))
{
    $Student_id = $_GET["sid"];   
    $result = $conn->query("SELECT * FROM chat where Sid = $Student_id");
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row['Time'] . '<br />';
        echo $row['Message'] . '<br />';        
    }
}
}
?>