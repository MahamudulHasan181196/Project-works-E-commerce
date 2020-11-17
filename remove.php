<?php
session_start();
$id=$_SESSION['adminsid'];

if(!isset($_SESSION['adminsid']) || empty($_SESSION['adminsid'])){
  header("location: login.php");
  exit;
}
  include  'config.php';
 $id=$_GET['id']; 
 $q="UPDATE `delevery_details` SET `flag` = '1' WHERE `delevery_details`.`id` = $id";  
 mysqli_query($conn,$q);
 header('location:dashborad.php');
?>