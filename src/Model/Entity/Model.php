<?php
namespace App\Model\Entity;

interface Model {
    public function getId(): ?int;
    public function setId(int $id): void;
    public function attributes(): array;
}
