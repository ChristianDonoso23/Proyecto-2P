<?php
require_once __DIR__ . '/Controllers/Resolver.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Ecuaciones - Resolver</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-calculator"></i> Sistema de Ecuaciones</h1>
        <p>Resuelve sistemas de ecuaciones lineales de 2x2 y 3x3</p>
    </div>

    <div class="container">
        <div class="form-section">
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-edit"></i> Datos del Sistema</h2>
                </div>
                <div class="card-body">
                    <?php require_once __DIR__ . '/Views/Formulario.php'; ?>
                </div>
            </div>
        </div>

        <div class="result-section">
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-chart-line"></i> Resultado</h2>
                </div>
                <div class="card-body">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span><?= htmlspecialchars($error) ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($resultado)): ?>
                        <div class="result-content">
                            <h4><i class="fas fa-check-circle"></i> Solución encontrada:</h4>
                            <?php if (is_array($resultado)): ?>
                                <div class="variables-grid">
                                    <?php foreach ($resultado as $var => $val): ?>
                                        <div class="variable-item">
                                            <span class="variable-name"><?= htmlspecialchars($var) ?></span>
                                            <span class="variable-value"><?= htmlspecialchars(number_format((float)$val, 4)) ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="result-message">
                                    <i class="fas fa-info-circle"></i>
                                    <p><?= htmlspecialchars((string)$resultado) ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="placeholder">
                            <i class="fas fa-arrow-left"></i>
                            <p>Introduce los coeficientes del sistema y haz clic en <strong>Resolver</strong> para ver el resultado aquí.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>