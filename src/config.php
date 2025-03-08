<?php
require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;

// Cargar variables de entorno del archivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
