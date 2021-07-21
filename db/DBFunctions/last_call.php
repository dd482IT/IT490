<?php
function lastCall($coin_name){
        $id = 0;
        $date = date('Y-m-d H:i:s');
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
                $date1 = date_create($date);
                $date2 = date_create($result["pull_date"]);
                $diff = $date2->diff($date1);
                if ($diff->h >= 1){
                        return true;
                }
                else{
                        return false;
                }
        }else{
                return false;
        }
        }catch(Exception $e){
                return false;
        }

}
?>
~
