<?php
session_start();
include('../../authentication/connection.php');
$bid = $_POST['bus_id'];
$brole = $_POST['role'];          
$rid = $_POST['route_id'];
$seats = $_POST['seats'];
$did = $_POST['driver_id'];
$sql="INSERT INTO bus VALUES ('$bid','$did','$rid','$seats','$brole')";

if (!ctype_digit($seats)) {
    $seats_error = "Number of seats must be an integer";
  }else if (!ctype_digit($bid)) {
    $seats_error = "Bus id must be an integer";
  }else if (!ctype_digit($rid)) {
    $seats_error = "Route id must be an integer";
  }else if (!ctype_digit($did)) {
    $seats_error = "Driver id must be an integer";
  }
else{
$query =mysqli_query($conn,$sql);
if($query){        
        header("Location: addbus.php");
    }
    else{
        echo 'Value exists';
    }
  }
?>




