<?php
/**
 * Summary of namespace App\Config
 */
namespace App\Config;

use PDO;

class Database {
    public static function connect() {
        $db = new PDO('mysql:host=localhost;dbname=rapidorder', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
