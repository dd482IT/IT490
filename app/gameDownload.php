<?php

require_once(__DIR__ . "/MQFunctions/sendGame.php");

$user = $_POST["user"];
$coins = $_POST["coins"];
$score = $_POST["score"];
$multi=$_POST["multi"]; 
$data = array("user"=>$user,"coin_count"=>$coins,"score"=>$score,"multiplier"=>$multi);
$json = json_encode($data);
sendGame($json);

?>