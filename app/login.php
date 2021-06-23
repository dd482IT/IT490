<?php
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
require_once(__DIR__ . "/Functions/flash.php");
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
		echo "hi, line 56"; 
	}
	else{
		echo "There was an error";
	}
	
	if(isset($response)){
		echo "hi, line 63"; 
		echo $response;
		if($response["status"] == 200){	
			echo "hi, line 65"; 
			unset($response["password"]);
			//$_SESSION["user"] = $response['data'];
			header("Location: home.php");
			$username = null;
			$email = null;
			$password = null;
			$isValid = true; 
		}
		else{
			//var_export($response);
			echo "There was an error retrieving data";
		}
	}
	else{
		echo "There was an error retrieving data";
	}

}
?>

<!-- 
Login

    A form must ask for login details [X]
        either username or email (one input field should allow either)[X]
            You'll need a way to determine if it's an email or a username and validate accordingly[X]
        password (follows same rules as registration)[]
    All data should be valid before being sent out[]
    Find the single user by email or username[]
        Return their id, username, email, password[]
    Verify the password(hash) from the db compared to the password from the form[]
    If there's a validation error or general error return the appropriate message[]
    If the password matches[]
        unset the password from the result set (we don't want it to leak from this scope/context)[]
        return the data pulled from the db[]
    Have the app store the user details in a session[]
        Make sure the session doesn't get lost between pages[]
        Set the session cookie to be secure and httponly and set other flags to improve security[]
    On successful login redirect the user to a home/dashboard page[]

Navigation bar

    include this nav on every page except logout
    include login, register, logout
        these must be functional
        The navigation state should change based on whether or not the user is logged in
    feel free to include any other links but use href="#" so it's there as a mockup for future features

-->


