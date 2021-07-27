<?php

function set_coin_value($id, $coin_value){
        $date = date('Y/m/d H:i:s');
        $value = (float)$coin_value;
        $stmt = getDB()->prepare("SELECT * FROM CryptoCoins WHERE id = :id");
        $stmt->execute([":id"=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
                $old_value = $result['coin_value'];
                try{
                $percent_change = (1 - $old_value/$value) * 100;
                }catch(DivisionByZeroError $e){
                        return array("status"=>403, "message"=>"Dividing by zero", "new_value"=>$value, "old_value"=>$result['coin_value']);
                }
                $stmt = getDB()->prepare("UPDATE CryptoCoins SET coin_value = :coin_value WHERE id = :id");
                //try{
                $stmt->execute(array(
                        ":coin_value" => $value,
                        ":id" => $id
                ));
                $stmt = getDB()->prepare("UPDATE CryptoCoins SET pull_date = :pull_date WHERE id = :id");
                $stmt->execute(array(
                        ":pull_date" => $date,
                        ":id" => $id
                ));
                $stmt = getDB()->prepare("UPDATE CryptoCoins SET percent_change = :percent_change WHERE id = :id");
                $stmt->execute(array(
                        ":percent_change" => $percent_change,
                        ":id" => $id
                ));
                //}catch(Exception $e){
                //      return array("status"=>403, "message"=>"Unsuccessful", "new_value"=>$value, "old_value"=>$result['coin_value']);
                //}
                return array("status"=>"200", "message"=>"Successfully Updated");
        }
        else{
                return array("status"=>"403", "message"=>"Unsupported CryptoCurrency");
        }

}

?>

