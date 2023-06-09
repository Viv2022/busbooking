<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, intial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie-edge" />
        <link rel="stylesheet" href="signin/style.css" />
        <title>hello</title>
    </head>
	<body>
		<div class="container" id="container">
			<div class="form-container sign-up-container">
				<form name="f1" action="authentication/authentication.php" method= "POST">
					<h1>Faculty Sign In</h1>
					<br><br>
					<input type="text" id="user" name="user" placeholder="User Name" />
					<input type="password" id="pass" name="pass" placeholder="Password" />
					<input type="hidden" id="role" name="role" value="faculty"/>
					<a href="forget_pass/verify/verify.html">Forgot your password?</a>	
					<button type="submit" id="btn">Sign In</button>
					<p>New ? <a href="register/verify/verify.html">Create an account</a></p>
				</form>
	</div>
	<div class="form-container sign-in-container">
		<form name="f1" action = "authentication/authentication.php" method = "POST">  
			<h1>Student Sign In</h1>
			<br><br>
			<input type="text" id="user" name="user" placeholder="User Name" />
			<input type="password" id="pass" name="pass" placeholder="Password" />
			<input type="hidden" id="role" name="role" value="student"/>
			<a href="forget_pass/verify/verify.html">Forgot your password?</a>
			<button type="submit" id="btn">Sign In</button>
			<p>New ? <a href="register/verify/verify.html">Create an account</a></p>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Login to ride with us</p>
				<button class="ghost" id="signIn">Student</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Welcome Back!</h1>
				<p>Login to ride with us</p>
				<button class="ghost" id="signUp">Faculty</button>
			</div>
		</div>
	</div>
</div>

<script src="signin/main.js"></script>
    </body>
</html>
