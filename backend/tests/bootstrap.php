<?php
// /tests/bootstrap.php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../models/Model.php';
require_once __DIR__ . '/../models/User.php';

use App\Config\Database;

$db = Database::connect();
