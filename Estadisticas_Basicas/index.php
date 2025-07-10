<?php
declare(strict_types=1);
require_once __DIR__ . '/controllers/procesar.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas Básicas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Calculadora de Estadísticas Básicas</h2>
        <?php include 'Views/formulario.php'; ?>
    </div>
</body>
</html>
