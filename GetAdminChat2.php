<?php
include('Includes/connection.php'); 
session_start();
if (isset($_SESSION['mychatid'])){
    $std = $_SESSION['mychatid'];    
    $result = $conn->query("SELECT * FROM adminchat where Sid = $std");
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row['Time'] . '<br />';
        echo $row['Message'] . '<br />';        
    }
}
// unset($_SESSION['mychatid']);
echo "faraz";
}

?>