<?php

function fetchAll(){

        try{
                $stmt = getDB()->prepare("SELECT * FROM CryptoCoins WHERE id = :id");
                $stmt->execute([":id"=>1]);
                $btc = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt = getDB()->prepare("SELECT * FROM CryptoCoins WHERE id = :id");
                $stmt->execute([":id"=>2]);
                $doge = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt = getDB()->prepare("SELECT * FROM CryptoCoins WHERE id = :id");
                $stmt->execute([":id"=>3]);
                $eth = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                $stmt->execute([":id"=>2]);
                $top_score = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                $stmt->execute([":id"=>3]);
                $middle_score = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                $stmt->execute([":id"=>4]);
                $bottom_score = $stmt->fetch(PDO::FETCH_ASSOC);

                $all  = array(
                        "btc" => array(
                                "coin_value" => $btc['coin_value'],
                                "percent_change" => $btc['percent_change'],
                                "pull_date" => $btc['pull_date']
                        ),
                        "doge" => array(
                                "coin_value" => $doge['coin_value'],
                                "percent_change" => $doge['percent_change'],
                                "pull_date" => $doge['pull_date']
                        ),
                        "eth" => array(
                                "coin_value" => $eth['coin_value'],
                                "percent_change" => $eth['percent_change'],
                                "pull_date" => $eth['pull_date']
                        ),
                         "first" => array(
                                "username" => $top_score['user_name'],
                                "score" => $top_score['score'],
                                "date" => $top_score['date_created']
                        ),
                        "second" => array(
                                "username" => $middle_score['user_name'],
                                "score" => $middle_score['score'],
                                "date" => $middle_score['date_created']
                        ),
                        "third" => array(
                                "username" => $bottom_score['user_name'],
                                "score" => $bottom_score['score'],
                                "date" => $bottom_score['date_created']
                        )

                );
                $response = json_encode($all);
                return $response;
        }catch(Exception $e){
                return array("status"=>400, "message"=>"Unsucessful");
        }

}

?>
