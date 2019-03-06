<?php

class Database {
    
    public static $host = 'localhost';
    public static $user = 'root';
    public static $password = '';
    public static $dbname = 'crud';
    
    public static function connect() {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname.";charset=utf8", self::$user, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array()) {
        $data = "";
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if ( explode(' ', strtoupper($query))[0] == 'SELECT' ) {
            $data = $statement->fetchAll();
        } else if ( explode(' ', strtoupper($query))[0] == 'INSERT' ) {
            $data = "inserted";
        } else if ( explode(' ', strtoupper($query))[0] == 'UPDATE' ) {
            $data = "updated";
        } else if ( explode(' ', strtoupper($query))[0]  == 'DELETE' ) {
            $data = "deleted";
        }
        return $data;
    }
}

?>