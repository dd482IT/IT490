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
					<input type="text" name="login" required/>
					<input type="password" name="password" required/>
					<input type="submit" name="submit" value="Login" id=".flash-message"/>
				</form>
			</div>
		</body>
</head> 
<html>

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


