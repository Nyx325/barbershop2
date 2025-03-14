<?php
namespace App\View;

require __DIR__ . "/../../vendor/autoload.php";

use App\Controller\ServicioController;
use App\Model\Entity\Servicio;

$ctrl = ServicioController::getInstance();

    // Verifica si los datos están definidos y no están vacíos
    if (!isset($_POST["descripcion"], $_POST["precio"]) || empty($_POST["descripcion"]) || !is_numeric($_POST["precio"]) || $_POST["precio"] <= 0) {
        // Si hay error en los datos, muestra el mensaje de error
        echo '<h1>Error</h1>';
        echo '<p>Descripción o precio no válidos. Por favor, asegúrate de que ambos campos estén completos.</p>';
        echo '<button onclick="history.back()" class="btn btn-primary">Volver</button>';
        exit; // Termina el script para evitar que se ejecute el código posterior
    } else {
        // Crear un servicio
        $servicio = new Servicio(
            $_POST["descripcion"],  // Descripción
            (float)$_POST["precio"]  // Precio convertido a flotante
        );

        // Llamar al controlador para agregar el servicio
        $ctrl->add($servicio);

        // Redirigir a la página de servicios
        header("Location: servicios.php");
        exit;
    }
?>
