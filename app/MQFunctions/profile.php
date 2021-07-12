<?php
function proifle($id){
	try{
		require_once(__DIR__.'/../../lib/path.inc');
		require_once(__DIR__.'/../../lib/get_host_info.inc');
		require_once(__DIR__.'/../../lib/rabbitMQLib.inc');

		$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
		$msg = array("id"=>$id, "type"=>"profile");
		$response = $client->send_request($msg);
		return $response;
	}
	catch(Exception $e){
		return $e->getMessage();
	}
}
?>
