<?php
namespace App\Model\Entity;

interface Model {
    public function getId(): ?int;
    public function setId(int $id);
    public function attributes(): array;
}