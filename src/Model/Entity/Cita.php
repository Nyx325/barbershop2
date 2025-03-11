<?php

namespace App\Model\Entity;

class Cita implements Model {
    public ?int $id;
    public string $fecha;
    public int $servicio;
    public int $usuario;

    function __construct(string $fecha, int $servicio, int $usuario, ?int $id = null)
    {
      $this->id = $id;
      $this->fecha = $fecha;
      $this->usuario = $usuario;
      $this->servicio = $servicio;
    }

  function getId(): ?int{
    return $this->id;
  }

  function setId(int $id): void {
    $this->id = $id;
  }

  function attributes(): array{
    return [
      "fecha" => $this->fecha,
      "servicio" => $this->servicio,
      "usuario" => $this->usuario
    ];
  }
}
