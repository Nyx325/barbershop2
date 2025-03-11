<?php

namespace App\Model\Repository;

use App\Model\Entity\Model;
use App\Model\Entity\Servicio;
use App\Model\Repository\Repository;
use InvalidArgumentException;

class ServicioRepository extends Repository
{
    private static ?ServicioRepository $instance = null;

    private function __construct()
    {
        parent::__construct("servicios");
    }

    public static function getInstance(): ServicioRepository
    {
        if (self::$instance == null) {
            self::$instance = new ServicioRepository();
        }

        return self::$instance;
    }

    protected function instanceObj(array $db_response): Model
    {
        // Verificar campos requeridos
        $requiredFields = ['id', 'descripcion', 'precio'];
        foreach ($requiredFields as $field) {
            if (!isset($db_response[$field])) {
                throw new InvalidArgumentException("Falta el campo requerido: $field");
            }
        }

        return new Servicio(
            description: $db_response["descripcion"],
            precio: (float) $db_response["precio"],
            id: (int) $db_response["id"]
        );
    }
}
