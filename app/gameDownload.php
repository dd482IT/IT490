<?php

require_once(__DIR__ . "/MQFunctions/sendGame.php");

$user = $_POST["user"];
$coins = $_POST["coin"];
$score = $_POST["score"];
var_dump($coins);
$data = array("user"=>$user,"coin_count"=>$coins,"score"=>$score);
$json = json_encode($data);
sendGame($json);

?>