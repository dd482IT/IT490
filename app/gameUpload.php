<?php
require_once(__DIR__ . "/MQFunctions/getCoin.php");

//$inventory = getInventory(); 
$data = getAll();
$coins = json_decode($data, true);
//$items = json_decode($inventory, true);
//$extra_lives = $coins['extra_lives']; 
$btc_pc = $coins['btc']['percent_change'];
$eth_pc = $coins['eth']['percent_change'];
$doge_pc = $coins['doge']['percent_change'];

echo $btc_pc . "," . $eth_pc . "," . $doge_pc;

?>