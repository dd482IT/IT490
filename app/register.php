<?php 
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
session_start();
?>

<form method="POST">
<input type="text" name="username" require> Username </input>
<input type="password" name="password" require/>  Password </input>
<input type="password" name="confirm_password" require/>  Confirm Password </input>
<input type="email" name="email" require/>  Email </input>
<input type="submit" name="submit" value="Login"/>
</form>

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
			//flash("Passwords do not match");
		}
        
		if ($isValid) {
			$response = register($username, $email, $password);
		}
		else{
			//flash("Invalid Input, please try again");
		}

	
	if($response["status"] == 200){
		$_SESSION["user"] = $response["data"];
	}
	else{
		//flash("There was an error")
	}
	

}
?>
<?php require(__DIR__ . "/Functions/flash.php");

