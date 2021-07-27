<?php

        function fetchHighScores(){
                try{
                $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                $stmt->execute([":id"=>2]);
                $top_score = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                $stmt->execute([":id"=>3]);
                $middle_score = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                $stmt->execute([":id"=>4]);
                $bottom_score = $stmt->fetch(PDO::FETCH_ASSOC);

                $scores = array(
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
                $response = json_encode($scores, true);

                return $response;
                }catch(Exception $e){
                        return array("status"=>403, "message"=>"Unsuccessful");
                }

        }


?>
