<?php
require_once(__DIR__.'/../lib/path.inc');
require_once(__DIR__.'/../lib/get_host_info.inc');
require_once(__DIR__.'/../lib/databaseLib.inc');

function getAll(){
        try{

                $client = new DatabaseClient("apiServer.ini", "testServer");
                $msg = array("coin"=>"get_all");
                $response = $client->send_request($msg);
                return $response;
        }
        catch(Exception $e){
                return $e->getMessage();
        }
}
?>
