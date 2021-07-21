<?php

require_once(__DIR__ . '/lib/path.inc');
require_once(__DIR__ . '/lib/get_host_info.inc');
require_once(__DIR__ . '/lib/databaseLib.inc');

//separate files for DB calls so it's easier to divide work
require(__DIR__."/dbconnection.php");
require(__DIR__."/dbfunctions/login.php");
require(__DIR__."/dbfunctions/register.php");
require(__DIR__."/dbfunctions/fetch_coin_value.php");
require(__DIR__."/dbfunctions/set_coin_value.php");
require(__DIR__."/dbfunctions/last_call.php");
require(__DIR__."/dbfunctions/api_call.php");
//TODO add more as they're developed

function request_processor($req){
        echo "Received Request".PHP_EOL;
        echo "<pre>" . var_dump($req) . "</pre>";
        if(!isset($req['type'])){
                return "Error: unsupported message type";
        }
        //Handle message type
        $type = $req['type'];
        switch($type){
                case "login":
                        return login($req['username'], $req['password']);
                case "register":
                        return register($req["username"], $req["email"], $req["password"]);
                case "validate_session":
                        return validate($req['session_id']);
                case "echo":
                        return array("return_code"=>'0', "message"=>"Echo: " .$req["message"]);
                case "getAPI":
                        if (lastCall($req['coin'])){
                                $api_call = getAPI($req['coin']);
                                error_log("API Response: " . var_export($api_call, true));
                                $json = json_decode($api_call, true);
                                if(isset($json)){
                                        return $json['data']['amount'];
                                }else{
                                        return array("return code"=>'400', "message"=>"Invalid API Call");
                                }
                                $request = "Hello";
                        }
                        else{
                                return array("return_code"=>'400', "message"=>"Too soon");
                        }
                        return $request;
        }
        return array("return_code" => '0',
                "message" => "Server received request and processed it");
}
//will probably need to update the testRabbitMQ.ini path here
$server = new databaseServer("databaseServer.ini", "sampleServer");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>

