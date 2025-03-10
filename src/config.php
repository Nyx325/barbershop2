<?php
namespace App;

require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
