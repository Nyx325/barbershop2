<?php
require __DIR__ . "/vendor/autoload.php";

use App\Controller\UserController;

$ctrl = UserController::getInstance();
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

    <h1>Elementos</h1>
    <?php
    $results = $ctrl->getAll();
    
    foreach ($results as $result) {
        echo $result->id . " " . $result->userName . " " . $result->email . "<br>";
    }
    ?>

    <?php require __DIR__ . "/static/components/footer.php" ?>
</body>
</html>
