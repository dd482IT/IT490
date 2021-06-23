<?php 
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
session_start();
?>

<form method="POST">
<input type="text" name="username" require/>
<input type="password" name="password" require/>
<input type="confirmpassword" name= "confirmpassword" require/>
<input type="email" name="email" require/>
<input type="submit" name="submit" value="Login"/>
</form>

<?php


if(isset($_POST["submit"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$isValid = true;
	
		//TODO validate
		if (isset($_POST["email"])) {
			$email = $_POST["email"];
		}
		if (isset($_POST["password"])) {
			$password = $_POST["password"];
		}
		if (isset($_POST["confirm"])) {
			$confirm = $_POST["confirm"];
		}
		if (isset($_POST["username"])) {
			$username = $_POST["username"];
		}
        // Prepare a select statementSS
		if (!isset($email) || !isset($password) || !isset($confirm)) {
			$isValid = false;
		}
        
		if ($isValid) {
			$response = register($username, $password);
		}
		else{
			echo "Invalid credentials";
		}

	
	if($response["status"] == 200){
		$_SESSION["user"] = $response["data"];
	}
	else{
		var_export($response);
	}
	

}
?>


