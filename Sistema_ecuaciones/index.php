<?php
declare(strict_types=1);
require_once __DIR__ . '/Controllers/resolver.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Ecuaciones 2x2 Mejorado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Resolución de Sistema de Ecuaciones (2x2) - Método de Cramer</h2>
        <?php include 'Views/Formulario.php'; ?>
    </div>
</body>
</html>
