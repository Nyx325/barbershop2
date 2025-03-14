<?php
namespace App\View;

require __DIR__ . "/../../vendor/autoload.php";
  
use App\Controller\ServicioController;

function eliminar() {
  if(!isset($_GET["id"])){
    return;
  }

  $id = $_GET["id"];
  $ctrl = ServicioController::getInstance();
  $ctrl->delete($id);
}

try {
  eliminar();
} catch (\Throwable $th) {
  error_log($th->getMessage());
}

header("Location: servicios.php");
exit;
