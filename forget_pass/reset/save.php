<?php
session_start();
require('../../authentication/connection.php');


$email = $_SESSION['email'];
$pass = $_GET['pass'];
$hashpass = md5($pass);

$result = $conn->query($sql);

$sql = "UPDATE student SET password='$hashpass' WHERE email='$email')";
$result = $conn->query($sql);
$sql2 = "DELETE FROM register_token WHERE email = '$email'";
$result2 = $conn->query($sql2);

session_unset();
session_destroy();


header("Location:../../index.html");

?>
