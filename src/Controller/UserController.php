<?php
namespace App\Controller;

use App\Model\Entity\Model;
use App\Model\Entity\Usuario;
use App\Model\Repository\Repository;
use App\Model\Repository\UserRepository;

class UserController {
  private static UserController $instance;

  protected final Repository $repo;

  private function __construct()
  {
    $this->repo = UserRepository::getInstance();
  }

  public function add(Usuario $data): void {
    $this->repo->add($data);
  }

  public function update(Usuario $data): void {
    $this->repo->update($data);
  }

  public function get(int $id): ?Model {
    return $this->repo->get($id);
  }

  public function delete(int $id): void {
    $this->repo->delete($id);
  }

  public function getAll(): array {
    return $this->repo->getAll();
  }
}
