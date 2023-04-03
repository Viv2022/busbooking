<?php
    
    include('connection.php'); 
    session_start();
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from student where Username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1){     
            $_SESSION['loggedIn']=true;
            $_SESSION['usernow']=$username;
            $_SESSION['passnow']=$password;
            $_SESSION['displayname']=$row['Name'];
            header("location:../dash/index.php");  
            exit(); 
        }  
        else{
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  
