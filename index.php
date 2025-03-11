<?php
require __DIR__ . "/vendor/autoload.php";

use App\Controller\ServicioController;

$ctrl = ServicioController::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require __DIR__ . "/static/components/header.php" ?>

    <section>
        <h1></h1>
    <?php
    foreach ($ctrl->getAll() as $servicio) {
      echo $servicio->description . "<br>";
    }

    ?>
    </section>

    <?php require __DIR__ . "/static/components/footer.php" ?>
</body>
</html>
