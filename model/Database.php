<?php

class Database {
    private static $dsn = 'mysql:host=localhost:3307;dbname=cis2454db';
    private static $username = 'admin';
    private static $password = 'pa55word';
    private static $db;
    
    private function __construct() {}
    
    public static function getDB () {
        if (!isset(self::$db)){
            try {
                self::$db = new PDO(self::$dsn,
                self::$username,  self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                exit();
            }
        }
        return self::$db;
    }
}
?>