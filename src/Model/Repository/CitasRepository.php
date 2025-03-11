<?php

namespace App\Model\Repository;

use App\Model\Entity\Cita;
use App\Model\Entity\Model;
use Psr\SimpleCache\InvalidArgumentException;
use App\Model\Repository\Repository;

class CitasRepository extends Repository{
  private static ?CitasRepository $instance = null;

  private function __construct()
  {
    parent::__construct("citas");
  }

  public static function getInstance(): CitasRepository
  {
    if (self::$instance == null) {
      self::$instance = new CitasRepository();
    }
    
    return self::$instance;
  }

  protected function instanceObj(array $db_response): Model
  {
    // Verificar campos requeridos
    $requiredFields = ['fecha', 'servicio', 'usuario', 'id'];
    foreach ($requiredFields as $field) {
      if (!isset($db_response[$field])) {
        throw new InvalidArgumentException("Falta el campo requerido: $field");
      }
    }

    return new Cita(
      fecha: $db_response["fecha"],
      servicio: (float) $db_response["servicio"],
      usuario: (int) $db_response["usuario"],
      id: (int) $db_response["id"]
    );
  }
}
