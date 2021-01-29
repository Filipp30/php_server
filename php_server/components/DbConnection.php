<?php

namespace DbConnection;
use PDO;
class DbConnection{
    public function get_db(): PDO{
        $db_connection = $_ENV['DB_CONNECTION'];
        $db_name= $_ENV['DB_NAME'];
        $db_host = $_ENV['DB_HOST'];
        $db_user = $_ENV['DB_USERNAME'];
        $db_pass = $_ENV['DB_PASSWORD'];
        $DSN = $db_connection.':host='.$db_host.';dbname='.$db_name;
        return $PDO = new PDO($DSN,$db_user,$db_pass);
    }

//     public function get_db(){
//         $db_name="mvc";
//         $dsn = 'mysql:host=localhost:3306;dbname='.$db_name;
//         $pdo = new PDO($dsn,'root','root');
//         return $pdo;
//     }

}