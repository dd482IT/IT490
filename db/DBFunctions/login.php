<?php
function login($username, $password){
	//from dbconnection.php
	$stmt = getDB()->prepare("SELECT * FROM Users WHERE username = :username LIMIT 1");
	$stmt->execute([":username"=>$username]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	//TODO do proper checking, maybe user doesn't exist
	if($result){
		$hash = password_hash($password, PASSWORD_BCRYPT);
		if(password_verify($password, $result["password"])){
			unset($result["password"]);//never return password, there's no need to
			return array("status"=>200, "username"=>$result["username"], "email"=>$result["email"]);
			//send user data back so app can use it
		}
		else{
			//must return proepr message blah blah blah see below
			return array("status"=>403, "message"=>"Incorrect Password");
		}
	}
	else{
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status"=>400, "message"=>"User doesn't exist");
	}
}
?>

