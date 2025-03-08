<?php
namespace App\Model\Repository;

require __DIR__ . "/../config.php";

use Exception;
use PDO;

class Connector
{
    private static ?Connector $instance;

    protected final string $db_host;
    protected final string $db_user;
    protected final string $db_pass;
    protected final string $db_name;

    private function __construct()
    {
        $this->db_host = $_ENV["DB_HOST"] ?? "localhost";
        $this->db_user = $_ENV["DB_USER"] ?? "root";
        $this->db_pass = $_ENV["DB_PASS"] ?? "";

        if ($_ENV["DB_NAME"] == null) {
            throw new Exception("No se definió DB_NAME en el archivo .env");
        }

        $this->db_name = $_ENV["DB_NAME"];
    }

    public static function getInstace(): Connector
    {
        if (self::$instance == null) {
            self::$instance = new Connector();
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return new PDO(
            'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8mb4',
            $this->db_user,
            $this->db_pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lanza excepciones
                PDO::ATTR_EMULATE_PREPARES => false // Desactiva prepares emulados
            ]
        );
    }
}
