<?php 
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
session_start();
?>

<!--
<form method="POST">
<input type="text" name="username" require> Username </input>
<input type="password" name="password" require/>  Password </input>
<input type="password" name="confirm_password" require/>  Confirm Password </input>
<input type="email" name="email" require/>  Email </input>
<input type="submit" name="submit" value="Login"/>
</form>
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px;  margin: 0 auto; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required> 
                <span class="invalid-feedback"></span>
            </div>
			<div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required>
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>


<?php


if(isset($_POST["submit"])){
	$username = null;
	$password = null;
	$email = null;
	$confirm_password = null; 
	$isValid = true;
	
		//TODO validate	
		if (isset($_POST["email"])) {
			$email = $_POST["email"];
		}
		if (isset($_POST["password"])) {
			$password = $_POST["password"];
		}
		if (isset($_POST["confirm_password"])) {
			$confirm_password = $_POST["confirm_password"];
		}
		if (isset($_POST["username"])) {
			$username = $_POST["username"];
		}
        // Prepare a select statementSS
		if (!isset($email) || !isset($password) || !isset($username) || !isset($confirm_password)) {
			$isValid = false;
			
		}
		
		if ($password != $confirm_password) {
			$isValid = false;
			flash("Passwords do not match");
			//die();
		}
        
		if ($isValid) {
			$response = register($username, $email, $password);
		}
		else{
			flash("Invalid Input, please try again");
			//die();
		}

	
	if($response->status == 200){
		flash("Sucessful account creation!");
		//die(header("Location: /app/login.php"));
		var_dump($response);
	}
	elseif($response->status == 200){
		flash("Account already exists!");
		//die();
		var_dump($response);
	}else{
		flash("There was an error");
		//die();
		var_dump($response);
	}
	

}
?>
<?php require(__DIR__ . "/Functions/flash.php");

