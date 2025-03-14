<?php
namespace App\View;

require __DIR__ . "/../../vendor/autoload.php";

use App\Controller\SessionController;
use App\Controller\ServicioController;

$ctrl = ServicioController::getInstance();
$sessionCtrl = SessionController::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/side_img.css">
    <link rel="stylesheet" href="/static/css/default_table.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Servicios</title>
</head>
<body>
  <?php require __DIR__ . "/../../static/components/header.php" ?>

  <div class="middle-container">
    <div class="img-background"></div>
    <section>
      <nav>
          <button 
            onclick="window.location.href='formulario_servicio.php'"
            class="btn btn-success"
          >Agregar</button>
      </nav>
      <table>
        <thead>
          <tr>
            <td>Descripcion</td>
            <td>Precio</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($ctrl->getAll() as $service) {
              ?>
                <tr>
                  <td><?php echo $service->description; ?></td>
                  <td><?php echo number_format($service->precio, 2, '.', ''); ?></td>
                  <td>
                    <button 
                      onclick="window.location.href='eliminar_servicio.php?id=<?php echo $service->id; ?>'"
                      class="btn btn-danger"
                    >
                        Eliminar
                    </button>
                  </td>
                </tr>
              <?php
            }
          ?>
          </tbody>
      </table>
    </section>
  </div>

  <?php require __DIR__ . "/../../static/components/footer.php" ?>
</body>
</html>
