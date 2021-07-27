<?php
function register($username, $email, $password){
        //from dbconnection.php
        try{
        $stmt = getDB()->prepare("SELECT * FROM Users WHERE username = :username LIMIT 1");
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->execute([":username" => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
                return array("status"=>403, "message"=>"1st stmt was unsuccessful");
        }
        if($result){
                return array("status"=>400, "message"=>"Username or Email already in use");
        }
        else{
                try{
                $stmt_2 = getDB()->prepare("INSERT INTO Users(username, email, password) VALUES(:username, :email, :password)");
                $stmt_2->execute(array(
                        ":username" => $username,
                        ":email" => $email,
                        ":password" => $hash
                ));
                $e = $stmt_2->errorInfo();
                }catch(Exception $e){
                        return array("status"=>403, "message"=>"2nd stmt was unsuccessful");
                }

                try{
                $stmt = getDB()->prepare("SELECT * FROM Users WHERE username = :username LIMIT 1");
                $stmt->execute([":username"=>$username]);
                $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
                }catch(Exception $e){
                        return array("status"=>403, "message"=>"3rd stmt was unsuccessful");
                }

                try{
                $stmt = getDB()->prepare("INSERT INTO Wallet(user_id) VALUES (:user_id)");
                $stmt->execute([":user_id"=>$user_info['id']]);
                }catch(Exception $e)
                {
                        return array("status"=>403, "message"=>"Insert into Wallet was unsuccessful");
                }

                if ($e[0] == "00000"){
                        return array("status"=>200, "message"=>"Account Successfully Created");
                }
                else{
                        return array("status"=>400, "message"=>"do something");
                }
        }
}
?>
