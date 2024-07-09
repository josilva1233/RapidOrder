<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    public static function connect() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=rapidorder', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            // Handle connection errors - outputting the error message for debugging purposes
            echo 'Connection failed: ' . $e->getMessage();
            // You might want to log the error instead of showing it in production
            // error_log('Connection failed: ' . $e->getMessage());
            exit; // Stop execution upon connection failure
        }
    }
}
