<?php
namespace App;

require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
