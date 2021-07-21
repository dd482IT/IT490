<?php
function register($username, $email, $password){
        //from dbconnection.php
        try{
        $stmt = getDB()->prepare("SELECT * FROM Users WHERE username = :username LIMIT 1");
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->execute([":username" => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
                return array("status"=>400, "message"=>"Username or Email already in use");
        }
        else{
                $stmt_2 = getDB()->prepare("INSERT INTO Users(username, email, password) VALUES(:username, :email, :password)");
                $stmt_2->execute(array(
                        ":username" => $username,
                        ":email" => $email,
                        ":password" => $hash
                ));
                $e = $stmt_2->errorInfo();
                if ($e[0] == "00000"){
                        return array("status"=>200, "message"=>"Account Successfully Created");
                }
                else{
                        return array("status"=>400, "message"=>"do something");
                }
        }
        }catch(Exception $e){
                return array("status"=>400, "message"=>"Unsuccessful");
        }
}
?>

