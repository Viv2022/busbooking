<?php
session_start();
require('../../authentication/connection.php');
$email = $_GET['email'];
$token = $_GET['token'];
$currentDate = date("Y-m-d H:i:s");

$check_token = "SELECT * FROM register_token WHERE email = '$email' AND token = '$token' ";
$result = $conn->query($check_token);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie-edge" />
        <link rel="stylesheet" href="signup.css" />
        <script src="signup.js"></script>
        <title>hello</title>
    </head>
<?php 

if($result->num_rows === 1){
    $row = $result->fetch_assoc();
    if($row['expirydate'] >= $currentDate ){

      $username = substr($email, 0, 10);
      $_SESSION['user']=$username;
      $_SESSION['email']=$email;
?>

    <body>
        <div class="container" id="container">
            <form name="signup" action = "save.php" onsubmit="return validateForm()" method = "POST">
                <h1>Register</h1>
                <br><br>
                <input type="text" name="name" id="name" placeholder="Full name" />
                <input type="text" name="user" id="user" value="<?php echo $username; ?>" readonly/>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" readonly />
                <input type="password" name="pass" id="pass" placeholder="password"/>
                <input type="password" name="repass" id="repass" placeholder="confirm password"/>
                <input
                    class="btn"
                    type="submit"
                    id="button"
                    name="commit"
                    value="Submit"
                    tabindex="3"
                    class="lastInput"
                /> 
        </form>

    </body>
</html>
<?php    

    }  
}else echo "Link Expired";

?>
