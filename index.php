<?php
require __DIR__ . "/vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/side_img.css">
    <title>Barbershop</title>
</head>
<body>
  <?php require __DIR__ . "/static/components/header.php" ?>

  <div class="middle-container">
    <div class="img-background"></div>
    <section>
      <h3>Bienvenido mi estimado compatriota</h3>
      <p>
        Barbershop, el lugar donde el estilo y la precisión se
        encuentran para brindarte una experiencia única de cuidado personal.
        Nuestro equipo de barberos expertos combina técnicas tradicionales con
        las últimas tendencias para ofrecerte cortes, afeitados y arreglos de
        barba impecables. Relájate en un ambiente moderno y acogedor mientras
        te ayudamos a lucir tu mejor versión. ¡Reserva tu cita hoy y déjanos
        redefinir tu estilo!
      </p>
      <img src="/static/img/1.jpg" alt="Imagen de la barbería" style="max-height: 200px; width: auto;"></img>
    </section>
  </div>

  <?php require __DIR__ . "/static/components/footer.php" ?>
</body>
</html>
