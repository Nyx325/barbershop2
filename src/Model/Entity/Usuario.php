<?php

namespace App\Model\Entity;

use App\Model\Entity\Model;

class Usuario implements Model
{
    public ?int $id;
    public bool $admin;
    public string $userName;
    public string $email;
    public string $password;

    public function __construct(string $userName, string $email, string $password, bool $admin, ?int $id = null)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->admin = $admin;
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
            'password' => $this->password,
            'admin' => $this->admin
        ];
    }
}
