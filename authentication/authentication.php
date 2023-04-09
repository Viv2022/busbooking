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
      
        $sql = "select * from student where student_id = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $sql1 = "select * from faculty where faculty_id = '$username' and password = '$password'";  
        $result1 = mysqli_query($conn, $sql1);  
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);  
        $count1 = mysqli_num_rows($result1);  
  
        if($count == 1){     
            $_SESSION['loggedIn']=true;
            $_SESSION['usernow']=$username;
            $_SESSION['passnow']=$password;
            $_SESSION['displayname']=$row['name'];
            $_SESSION['role']='student';
            header("location:../dash/index.php");  
            exit(); 
        }  
       
        if($count1 == 1){     
            $_SESSION['loggedIn']=true;
            $_SESSION['usernow']=$username;
            $_SESSION['passnow']=$password;
            $_SESSION['displayname']=$row1['name'];
            $_SESSION['role']='faculty';
            header("location:../dash/index.php");  
            exit(); 
        }
 
       
        else{
            $_SESSION['error'] = "Invalid username or password";
            header("location:../index.html"); 
            exit(); 
        }
?>
