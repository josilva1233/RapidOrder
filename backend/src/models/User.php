<?php
/**
 * Summary of namespace App\Models
 */
namespace App\Models;

class User extends Model {
    protected $table = 'users';

    public function __construct($db) {
        parent::__construct($db);
    }
}
