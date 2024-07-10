<?php
// /tests/bootstrap.php

require_once __DIR__ . '../../config/database.php';
require_once __DIR__ . '/../src/controllers/UserController.php';
require_once __DIR__ . '/../src/controllers/OrderController.php';
require_once __DIR__ . '/../src/models/Model.php';
require_once __DIR__ . '/../src/models/User.php';
require_once __DIR__ . '/../src/models/Order.php';

use App\Config\Database;

$db = Database::connect();
