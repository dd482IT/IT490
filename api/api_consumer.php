<?php

require_once(__DIR__ . '/../lib/path.inc');
require_once(__DIR__ . '/../lib/get_host_info.inc');
require_once(__DIR__ . '/../lib/rabbitMQLib.inc');
require(__DIR__ . '/api.php');


//separate files for DB calls so it's easier to divide work
//require(__DIR__."/dbfunctions/login.php");
//require(__DIR__."/dbfunctions/register.php");
//TODO add more as they're developed

function request_processor($req){
	echo "Received Request".PHP_EOL;
	echo "<pre>" . var_dump($req) . "</pre>";
	if(!isset($req['type'])){
		return "Error: unsupported message type";
	}
	//Handle message type
	$coin = $req['coin'];
	switch($coin){
		case "btc":
			return get_api("BTC-USD");
		case "eth":
			return get_api("ETH-USD"); 
		case "doge":
			return get_api("DOGE-USD"); 
		case "all":
			$coins = array("BTC-USD","ETH-USD","DOGE-USD");
			$temp_arr = array();
			$data = array();
			foreach ($coins as $coin) {
				$request = get_api($coin);
				$temp_arr = array("$coin"=>$request);
				$data = $data + $temp_arr;
			}
			return json_encode($data); 
	}
	
	return array("return_code" => '0',
		"message" => "Server received request and processed it");
}
//will probably need to update the testRabbitMQ.ini path here
$server = new rabbitMQServer("api_config.ini", "sampleServer");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>

