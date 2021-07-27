<?php

        function checkTopScore($id, $score){

                try{
                        $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                        $stmt->execute([":id"=>2]);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                        $stmt = getDB()->prepare("SELECT * FROM Users where id = :id");
                        $stmt->execute([":id"=>$id]);
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        $username = $user['username'];

                        if ($score > (int)$result['score']){
                                $stmt = getDB()->prepare("UPDATE Top_Score SET (user_id, user_name, score) VALUES (:user_id, :user_name, :score) WHERE id = :id");
                                $stmt->execute(array(
                                        ":user_id"=>$id,
                                        ":user_name"=>$username,
                                        ":score"=>$score,
                                        ":id"=>1
                                ));
                        }else{
                                $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                                $stmt->execute([":id"=>3]);
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                if($score > (int)$result['score']){
                                        $stmt = getDB()->prepare("UPDATE Top_Score SET (user_id, user_name, score) VALUES (:user_id, :user_name, :score) WHERE id = :id");
                                        $stmt->execute(array(
                                                ":user_id"=>$id,
                                                ":user_name"=>$username,
                                                ":score"=>$score,
                                                ":id"=>2
                                        ));
                                }else{

                                        $stmt = getDB()->prepare("SELECT * FROM Top_Score WHERE id = :id");
                                        $stmt->execute([":id"=>4]);
                                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                        if($score > (int)$result['score']){
                                                $stmt = getDB()->prepare("UPDATE Top_Score SET (user_id, user_name, score) VALUES (:user_id, :user_name, :score) WHERE id = :id");
                                                $stmt->execute(array(
                                                        ":user_id"=>$id,
                                                        ":user_name"=>$username,
                                                        ":score"=>$score,
                                                        ":id"=>3
                                                ));

                                        }else{
                                                return array("staus"=>200, "message"=>"Not a top score");
                                }

                        }


                }
                }catch(Exception $e){
                        return array("status"=>403, "message"=>"Unsuccessful");
                }

        }

?>
