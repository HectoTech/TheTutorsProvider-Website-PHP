<?php

include('Includes/connection.php'); 
if(isset($_GET["cid"]))
{
  global $con;
  $del_id = $_GET["cid"];
  $del_query_contact = "delete from contact where Cid = '$del_id' ";
  $run_del_query_contact = mysqli_query($conn , $del_query_contact);
  if($run_del_query_contact)
  {
    echo"<script>alert('Successfully Deleted the Contact..')</script>";
    echo"  <script>window.location.href = 'SeeContact.php'</script>";
  }
}

if(isset($_GET["tid"]))
{
  global $con;
  $del_id_tutor = $_GET["tid"];
  $del_query_tutor = "delete from tutorreg where Tid = '$del_id_tutor' ";
  $run_del_query_tutor = mysqli_query($conn , $del_query_tutor);
  if($run_del_query_tutor)
  {
    echo"<script>alert('Successfully Deleted the Tutor..')</script>";
    echo"  <script>window.location.href = 'SeeAllTutors.php'</script>";
  }
}

if(isset($_GET["sid"]))
{
  global $con;
  $del_id_std = $_GET["sid"];
  $del_query_std = "delete from studentreg where Sid = '$del_id_std' ";
  $run_del_query_std = mysqli_query($conn , $del_query_std);
  if($run_del_query_std)
  {
    echo"<script>alert('Successfully Deleted the student..')</script>";
    echo"  <script>window.location.href = 'SeeAllStudents.php'</script>";
  }
}
?>