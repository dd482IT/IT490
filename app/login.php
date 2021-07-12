<?php
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
require_once(__DIR__ . "/Functions/safe_echo.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: 0 auto;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="login" class="form-control">
                
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>

<!--
<html>
<head>

	<link rel="stylesheet" href="/styles/nav.css">
	<title> Login </title> 

	<style>
	</style>
		<body> 
			<div class="loginbox">
				<form method="POST">
					<input type="text" name="login" required/>
					<input type="password" name="password" required/>
					<input type="submit" name="submit" value="Login" id=".flash-message"/>
				</form>
			</div>
		</body>
</head>
<html>
-->	

<?php


if(isset($_POST["submit"])){
	$login = null;
	$email = null;
	$password = null;
	$isValid = true; 

	//TODO validate
	if (isset($_POST["login"])) {
		$login = $_POST["login"];
    }else{
		$isValid = false;
	}

	if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }else{
		$isValid = false;
	}
	
	
	
	//calls function from MQPublish.inc.php to communicate with MQ
	if($isValid){
		$response = login($login, $password);
		//var_export($response, true);
	}
	else{
		flash("There was an error retrieving data");
	}
	
	if(isset($response)){
		if($response->status == 200){	
			unset($response->password);
			$_SESSION["user"] = $response->user_id;
			$_SESSION["email"] = $response->email;
			$login = null;
			$email = null;
			$password = null; 
			flash("Sucessessfull Login");
			die(header("Location: home.php"));

			
		}
		else{
			flash("Incorrect Credentials");
		}
	}
	else{
		flash("There was an error retrieving data");
	}

}
?>
<?php require(__DIR__ . "/Functions/flash.php");


