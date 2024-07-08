<?php
/**
 * Summary of namespace App\Models
 */
namespace App\Models;

class Order extends Model {
    protected $table = 'orders';

    public function __construct($db) {
        parent::__construct($db);
    }
}
