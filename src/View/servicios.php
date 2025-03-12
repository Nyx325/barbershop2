<?php
namespace App\View;

require __DIR__ . "/../../vendor/autoload.php";

use App\Controller\ServicioController;

$ctrl = ServicioController::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/side_img.css">
    <link rel="stylesheet" href="/static/css/default_table.css">
    <title>Servicios</title>
</head>
<body>
  <?php require __DIR__ . "/../../static/components/header.php" ?>

  <div class="middle-container">
    <div class="img-background"></div>
    <section>
      <table>
        <thead>
          <tr>
            <td>Descripcion</td>
            <td>Precio</td>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($ctrl->getAll() as $service) {
              ?>
                <tr>
                  <td><?php echo $service->description; ?></td>
                  <td><?php echo number_format($service->precio, 2, '.', ''); ?></td>
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
