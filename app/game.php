<?php
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
require_once(__DIR__ . "/Functions/safe_echo.php");
require_once(__DIR__ . "/Functions/isLoggedIn.php");
session_start();
?>

<style>

.body { margin: 0px; }
      #game { width: 100vw; height: 100vh; }
      canvas { width: 100%; height: 100%; }

</style>

<frameborder="0" src="https://itch.io/embed-upload/4211130?color=000000" allowfullscreen="" width="1280" height="740"><a href="https://misl3d.itch.io/endless-crypto">Play Endless Crypto on itch.io</a></iframe>

<?php
require_once(__DIR__ . "/MQFunctions/sendGame.php");

$email= $_SESSION["email"];
$coins = null;
$score = null; 
$multiplier = null; 
$data = array("coin_count"=>$coins,"score"=>$score,"multiplier"=>$multiplier);
$json = json_encode($data);
//sendGame($json);





?>