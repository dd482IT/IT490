<?php

        function deposit($id, $coins){
                try{
                        $stmt = getDB()->prepare("SELECT * FROM Wallet WHERE user_id = :user_id");
                        $stmt->execute([":user_id"=>$id]);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                        $new_balance = $result['coins'] + $coins;

                        $stmt = getDB()->prepare("UPDATE Wallet SET coins = :coins WHERE user_id = :user_id");
                        $stmt->execute(array(
                                ":coins" => $new_balance,
                                ":user_id" => $id
                        ));

                        return array("status"=>200, "message"=>"Successfully Deposited", "new_balance"=>$new_balance);
                }catch(Exception $e){
                        return array("status"=>403, "message"=>"Unsuccessful");
                }
        }
?>
