<?php

function set_coin_value($coin_name, $coin_value){
        $date = date('Y/m/d H:i:s');
        $id = 0;
        switch($coin_name){
                case "btc":
                        $id = 1;
                case "doge":
                        $id = 2;
                case "eth":
                        $id = 3;

        }
        try{
        $stmt = getDB()->prepare("SELECT * FROM CryptoCoins WHERE id = :id");
        $stmt->execute([":id"=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
        $percent_change = getPercentChange($coin_value, $old_value);
        $stmt = getDB()->prepare("UPDATE CryptoCoins SET (coin_value, percent_change, pull_date) VALUES (:coin_value, :percent_change, :pull_date) WHERE id = :id");
        $stmt->execute(array(
                ":coin_value" => $coin_value,
                ":percent_change" => $percent_change,
                ":pull_date" => $date,
                ":id" => $id
        ));
        return array("status"=>"200", "message"=>"Successfully Updated");
        }
        else{
                return array("status"=>"403", "message"=>"Unsupported CryptoCurrency");
        }
        }catch(Exception $e){
                return array("status"=>400, "message"=>"Unsuccessful");
        }

}

function getPercentChange($new_value, $old_value){
        $percent_change = ($new_value - $old_value)/$old_value;
        return $percent_change;
}

?>
