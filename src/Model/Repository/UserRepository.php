<?php
namespace App\Model\Repository;

use App\Model\Entity\Model;
use App\Model\Entity\Usuario;
use App\Model\Repository;
use InvalidArgumentException;

class UserRepository extends Repository {
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