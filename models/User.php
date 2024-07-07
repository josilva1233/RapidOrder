<?php
// /models/User.php
namespace App\Models;

class User extends Model {
    protected $table = 'users';

    public function __construct($db) {
        parent::__construct($db);
    }
}
