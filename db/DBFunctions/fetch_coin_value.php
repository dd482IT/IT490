<?php
function fetch_coin_value($coin_name){
        try{
        $stmt = getDB()->prepare("SELECT * FROM CryptoCoins WHERE coin_name = :coin_name LIMIT 1");
        $stmt->execute([":coin_name"=>$coin_name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){

                return array("status"=>200, "coin_value"=>$result["coin_name"], "percent_change"=>$result["percent_change"]);

        }
        else{
                return array("status"=>400, "message"=>"Unsupported CryptoCurrency");
        }
        }catch(Exception $e){
                return array("status"=>400, "message"=>"Unsuccessful");
        }
}

?>
