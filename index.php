<?php
require __DIR__ . "/vendor/autoload.php";

use App\Controller\CitasController;

$ctrl = CitasController::getInstance();
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

  <!---
  -------------------------------------
  |            |                      |
  |            |                      |
  |   img      |        section       |
  |            |                      |
  |            |                      |
  -------------------------------------
  --->
  <div>
  <div>
  <section>
    <p>
      Bienvenido a la Barbershop, el lugar donde el estilo y la precisión se
      encuentran para brindarte una experiencia única de cuidado personal.
      Nuestro equipo de barberos expertos combina técnicas tradicionales con
      las últimas tendencias para ofrecerte cortes, afeitados y arreglos de
      barba impecables. Relájate en un ambiente moderno y acogedor mientras
      te ayudamos a lucir tu mejor versión. ¡Reserva tu cita hoy y déjanos
      redefinir tu estilo!
    </p>
  </section>

  <?php require __DIR__ . "/static/components/footer.php" ?>
</body>
</html>
