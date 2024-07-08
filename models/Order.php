<?php
// /models/User.php
namespace App\Models;

class Order extends Model {
    protected $table = 'orders';

    public function __construct($db) {
        parent::__construct($db);
    }
}
