<?php
namespace App\Model\Repository;

require __DIR__ . "/../../config.php";

use Exception;
use PDO;

class Connector
{
    private static ?Connector $instance = null;

    protected final string $db_host;
    protected final string $db_user;
    protected final string $db_pass;
    protected final string $db_name;
    protected final string $db_port;

    private function __construct()
    {
        $this->db_host = $_ENV["DB_HOST"] ?? "localhost";
        $this->db_port = $_ENV["DB_PORT"] ?? "3306";
        $this->db_user = $_ENV["DB_USER"] ?? "root";
        $this->db_pass = $_ENV["DB_PASS"] ?? "";

        if ($_ENV["DB_NAME"] == null) {
            throw new Exception("No se definió DB_NAME en el archivo .env");
        }

        $this->db_name = $_ENV["DB_NAME"];
    }

    public static function getInstance(): Connector
    {
        if (self::$instance == null) {
            self::$instance = new Connector();
        }

        return self::$instance;
    }

    public function getConnection(): PDO {
        return new PDO(
            "mysql:host={$this->db_host};port={$this->db_port};dbname={$this->db_name};charset=utf8mb4",
            $this->db_user,
            $this->db_pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}
