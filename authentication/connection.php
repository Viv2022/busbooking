<?php      
    $host = "localhost";  

    $user = "username";  
    $password = 'your password';  
    $db_name = "busbooking2";  
    
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  
