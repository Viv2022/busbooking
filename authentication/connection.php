<?php      
    $host = "localhost";  
    $user = "type your username";  
    $password = 'type your password';  
    $db_name = "busbooking";  
      
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  
