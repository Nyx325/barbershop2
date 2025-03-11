<?php
namespace App\Controller;

use App\Model\Entity\Model;
use App\Model\Entity\Cita;
use App\Model\Repository\Repository;
use App\Model\Repository\CitasRepository;

class CitasController {
  private static ?CitasController $instance = null;

  protected final Repository $repo;

  private function __construct()
  {
    $this->repo = CitasRepository::getInstance();
  }

  public static function getInstance(): CitasController {
    if(self::$instance == null){
      self::$instance = new CitasController();
    }
    return self::$instance;
  }

  public function add(Cita $data): void {
    $this->repo->add($data);
  }

  public function update(Cita $data): void {
    $this->repo->update($data);
  }

  public function get(int $id): ?Model {
    return $this->repo->get($id);
  }

  public function delete(int $id): void {
    $this->repo->delete($id);
  }

  /**
   * Retorna un arreglo de objetos Cita.
   *
   * @return Cita[]
   */
  public function getAll(): array {
    return $this->repo->getAll();
  }
}
