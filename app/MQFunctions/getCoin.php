
<?php
function getCoin($coin){
	try{

		require_once(__DIR__.'/../../lib/path.inc');
		require_once(__DIR__.'/../../lib/get_host_info.inc');
		require_once(__DIR__.'/../../lib/rabbitMQLib.inc');
		require_once(__DIR__ . "/../Functions/safe_echo.php");
		$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
		$msg = array("coin"=>$coin,"type"=>"getAPI");
		$response = $client->send_request($msg);
		return $response;
	}
	catch(Exception $e){
		return $e->getMessage();
	}
}
?>
