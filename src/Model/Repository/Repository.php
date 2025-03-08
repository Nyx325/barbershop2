<?php

namespace App\Model;

use App\Model\Entity\Model;
use App\Model\Repository\Connector;
use PDO;

abstract class Repository
{
    protected final Connector $connector;
    protected final string $table;

    public function __construct(string $table)
    {
        $this->connector = Connector::getInstace();
        $this->table = $table;
    }

    public function add(Model $obj)
    {
        $conn = $this->connector->getConnection();
        $table = $this->table;
        $attributes = $obj->attributes();

        // Construir la consulta SQL
        $columns = implode(', ', array_keys($attributes));
        $placeholders = ':' . implode(', :', array_keys($attributes));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

        $stmt = $conn->prepare($sql);

        // Vincular parámetros
        foreach ($attributes as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->execute();
        $obj->setId($conn->lastInsertId());
    }

    public function update($obj): void
    {
        $conn = $this->connector->getConnection();

        $table = $this->table;
        $attributes = $obj->attributes();
        $id = $obj->getId();

        // Construir SET clause
        $setClause = implode(', ', array_map(
            fn($key) => "{$key} = :{$key}",
            array_keys($attributes)
        ));

        $sql = "UPDATE {$table} SET {$setClause} WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Vincular parámetros (atributos + id)
        foreach ($attributes as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function get($id)
    {
        $conn = $this->connector->getConnection();
        $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->instanceObj($data) : null;
    }

    public function delete($id): void
    {
        $conn = $this->connector->getConnection();
        $stmt = $conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function getAll(): array
    {
        $conn = $this->connector->getConnection();
        $stmt = $conn->query("SELECT * FROM {$this->table}");
        return array_map([$this, 'instanceObj'], $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    /**
     * Crear un objeto a partir de la respuesta de una 
     * consulta a la base de datos
     */
    protected abstract function instanceObj(array $db_response): Model;
}
