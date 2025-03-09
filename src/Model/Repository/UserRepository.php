<?php
namespace App\Model\Repository;

use App\Model\Entity\Model;
use App\Model\Entity\Usuario;
use App\Model\Repository\Repository;
use InvalidArgumentException;

class UserRepository extends Repository {
  private static ?UserRepository $instance = null; 

  private function __construct()
  {
    parent::__construct("usuarios");
  }

  public static function getInstance(): UserRepository {
    if(self::$instance == null){
      self::$instance = new UserRepository();
    }

    return self::$instance;
  }

  protected function instanceObj(array $db_response): Model
  {
    // Verificar campos requeridos
    $requiredFields = ['id', 'user_name', 'email', 'password'];
    foreach ($requiredFields as $field) {
      if (!isset($db_response[$field])) {
          throw new InvalidArgumentException("Falta el campo requerido: $field");
      }
    }

    return new Usuario(
      id: (int)$db_response['id'],
      userName: $db_response['user_name'],
      email: $db_response['email'],
      password: $db_response['password']
    );
  }
}
