<?php
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
require_once(__DIR__ . "/Functions/safe_echo.php");
session_start();
?>

<html>
<head>
	<title> Login </title> 

	<style>
	</style>
		<body> 
			<div class="loginbox">
				<form method="POST">
					<input type="text" name="username" required/>
					<input type="password" name="password" required/>
					<input type="submit" name="submit" value="Login" id=".flash-message"/>
				</form>
			</div>
		</body>
</head> 
<html>

<?php


if(isset($_POST["submit"])){
	$username = null;
	$email = null;
	$password = null;
	$isValid = true; 

	//TODO validate
	if (isset($_POST["username"])) {
		if(filter_var($username, FILTER_VALIDATE_EMAIL)){
			$email = $_POST["username"];
		}else{
			$username = $_POST["username"];
		}
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
		$response = login($username, $password);
		//print_r($respone);
	}
	else{
		flash("There was an error retrieving data");
	}
	
	if(isset($response)){
		if($response->status == 200){	
			unset($response->password);
			$_SESSION["user"] = $response->username;
			$_SESSION["email"] = $response->email;
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


