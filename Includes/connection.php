<?php
$server_name = "localhost";
$sname = "root";
$spassword = "";
$dbname = "tutorswebsite";

$conn = mysqli_connect($server_name,$sname,$spassword,$dbname);
if(!$conn)
{
    echo "<script>alert('fill all fields Correctly')</script)";
}
?>