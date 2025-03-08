<?php

namespace App\Model\Entity;

use App\Model\Entity\Model;

class Usuario implements Model
{
    protected ?int $id;
    protected string $userName;
    protected string $email;
    protected string $password;

    public function __construct(?int $id = null, string $userName, string $email, string $password)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }
    // Implementación de la interfaz Model
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function attributes(): array
    {
        return [
            'user_name' => $this->userName,  // Nombre de columna en snake_case
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}