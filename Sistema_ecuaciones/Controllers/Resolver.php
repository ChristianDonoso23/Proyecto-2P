<?php
declare(strict_types=1);

require_once __DIR__ . '/../Classes/SistemaLineal2x2.php';
require_once __DIR__ . '/../Classes/SistemaLineal3x3.php';

$resultado = null;
$error = null;

$dimension = $_POST['dimension'] ?? '2';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dimension'])) {
    if ($dimension === '2') {
        $e1 = [
            'x' => isset($_POST['a1']) ? (float)$_POST['a1'] : 0,
            'y' => isset($_POST['b1']) ? (float)$_POST['b1'] : 0,
            'c' => isset($_POST['c1']) ? (float)$_POST['c1'] : 0,
        ];
        $e2 = [
            'x' => isset($_POST['a2']) ? (float)$_POST['a2'] : 0,
            'y' => isset($_POST['b2']) ? (float)$_POST['b2'] : 0,
            'c' => isset($_POST['c2']) ? (float)$_POST['c2'] : 0,
        ];

        $sistema = new SistemaLineal2x2($e1, $e2);
        $resultado = $sistema->calcularResultado();
    } elseif ($dimension === '3') {
        $matriz = [];
        $camposCompletos = true;

        for ($i = 1; $i <= 3; $i++) {
            $fila = [];
            foreach (['a', 'b', 'c', 'd'] as $letra) {
                $campo = $letra . $i;
                if (!isset($_POST[$campo]) || trim($_POST[$campo]) === '') {
                    $camposCompletos = false;
                    break 2;
                }
                $fila[] = (float)$_POST[$campo];
            }
            $matriz[] = $fila;
        }

        if ($camposCompletos) {
            $sistema = new SistemaLineal3x3($matriz);
            $resultado = $sistema->calcularResultado();
        } else {
            $error = "Por favor completa todos los campos del sistema 3x3.";
        }
    } else {
        $error = "Tipo de sistema no válido.";
    }
}
