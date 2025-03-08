<?php
namespace App;

require __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Configurar Eloquent
$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'] ?? "localhost",     // Usando la variable de entorno
    'database' => $_ENV['DB_NAME'] ?? "barbershop", // Usando la variable de entorno
    'username' => $_ENV['DB_USER'] ?? "root", // Usando la variable de entorno
    'password' => $_ENV['DB_PASS'], // Usando la variable de entorno
    'charset' => 'utf8',
]);

// Hacer que Eloquent funcione globalmente
$capsule->setAsGlobal();
$capsule->bootEloquent();
