<?php

namespace App\Model\Entity;

class Ctia implements Model {
    public int $id;
    public string $date;
    public int $servicio;
    public int $usuario;

    function __construct()
    {
        
    }
}