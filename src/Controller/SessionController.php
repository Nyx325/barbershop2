<?php

namespace App\Controller;

use App\Controller\UserController;
use App\Model\Entity\Usuario;

class SessionController {
  private static ?SessionController $instance = null;

  protected final UserController $usrController;

  private function __construct(){
    $this->usrController = UserController::getInstance();
  }

  public static function getInstance(): SessionController {
    if(self::$instance == null){
      self::$instance = new SessionController();
    }

    return self::$instance;
  }

  public function logIn(string $user, string $pwd): void {
    if (session_status() == PHP_SESSION_ACTIVE){
      return;
    }

    $users = $this->usrController->getAll();
    foreach ($users as $user) {
      if($user->userName === $user && $user->password === $pwd){
        session_start();
        $_SESSION["user"] = $user;
      }
    }
  }

  public function getUser(): ?Usuario {
    if (session_status() == PHP_SESSION_NONE){
      return null;
    }

    return $_SESSION["user"];
  }
}
