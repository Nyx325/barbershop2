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
      <form action="agregar_servicio.php" method="POST">
        <legend>Agregar un servicio</legend>
        <div>
          <label>Descripción</label>
          <input type="text" name="descripcion" required>
        </div>
        <div>
          <label>Precio</label>
          <input type="number" step="0.01" name="precio" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar</button>
      </form>
    </section>
  </div>

  <?php require __DIR__ . "/../../static/components/footer.php" ?>
</body>
</html>
