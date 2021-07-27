<?php
function lastCall($id){
        $date = date('Y-m-d H:i:s');
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
