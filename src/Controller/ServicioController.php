<?php
namespace App\Controller;

use App\Model\Entity\Model;
use App\Model\Entity\Servicio;
use App\Model\Repository\Repository;
use App\Model\Repository\ServicioRepository;

class ServicioController {
  private static ?ServicioController $instance = null;

  protected final Repository $repo;

  private function __construct()
  {
    $this->repo = ServicioRepository::getInstance();
  }

  public static function getInstance(): ServicioController {
    if(self::$instance == null){
      self::$instance = new ServicioController();
    }
    return self::$instance;
  }

  public function add(Servicio $data): void {
    $this->repo->add($data);
  }

  public function update(Servicio $data): void {
    $this->repo->update($data);
  }

  public function get(int $id): ?Model {
    return $this->repo->get($id);
  }

  public function delete(int $id): void {
    $this->repo->delete($id);
  }

  /**
   * Retorna un arreglo de objetos Servicio.
   *
   * @return Servicio[]
   */
  public function getAll(): array {
    return $this->repo->getAll();
  }
}
