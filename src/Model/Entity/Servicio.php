<?php
namespace App\Model\Entity;

class Servicio implements Model {
    public ?int $id;
    public string $description;
    public float $precio;

    public function __construct(string $description, float $precio, ?int $id = null) {
        $this->id = $id;
        $this->description = $description;
        $this->precio = $precio;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function attributes(): array
    {
        return [
            "id" => $this->id,
            "descripcion" => $this->description,
            "precio" => $this->precio
        ];
    }
}
