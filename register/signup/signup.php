<?php
require('../../authentication/connection.php');
$email = $_GET['email'];
$token = $_GET['token'];
$currentDate = date("Y-m-d H:i:s");

$check_token = "SELECT * FROM registration WHERE email = '$email' AND token = '$token' ";
$result = $conn->query($check_token);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie-edge" />
        <link rel="stylesheet" href="signup.css" />
        <title>hello</title>
    </head>
<?php 

if($result->num_rows === 1){
    $row = $result->fetch_assoc();
    if($row['expiryDate'] >= $currentDate ){

      $username = substr($email, 0, 10);
      $department = substr($username, 1, 2);
?>

    <body>
        <div class="container" id="container">
            <form name="f2" action = "../../authentication/signup.php" method = "POST">
                <h1>Register</h1>
                <br><br>
                <input type="text" name="name" id="name" placeholder="Full name" />
                <input type="text" name="user" id="user" value="<?php echo $username; ?>" readonly/>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" readonly />
                <input type="password" name="pass" id="pass" placeholder="password"/>
                <input type="password" name="repass" id="pass" placeholder="confirm password"/>

                <button>submit</button>
                

			
        </form>

    </body>
</html>
<?php    
    
    }  
}else echo "Link Expired";

?>
