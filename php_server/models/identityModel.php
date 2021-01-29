<?php


namespace Model;

use DbConnection\DbConnection;
use PDO;

class identityModel{

    public function add_user_into_database($data): bool{
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "INSERT INTO users(username,email,password,first_name,last_name)VALUES(?,?,?,?,?)";
        $query=$pdo->prepare($sql);
        return $result = $query->execute(
            [$data->username,$data->email,$data->password,$data->first_name,$data->last_name]);
    }

    public function get_user_from_database($data){
        $db_connection = new DbConnection();
        $pdo = $db_connection->get_db();
        $sql = "SELECT id,email FROM users WHERE username=? AND password=?";
        $query=$pdo->prepare($sql);
        $query->execute([$data->username,$data->password]);
        $result= $query->fetch(PDO::FETCH_OBJ);
        if ($result == true){
            return $result;
        }else{
            return false;
        }
    }
}