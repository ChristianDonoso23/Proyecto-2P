<?php
declare(strict_types=1);
require_once __DIR__ . '/../Classes/SistemaLineal2x2.php';
require_once __DIR__ . '/../Classes/SistemaLineal3x3.php';

$resultado = null;
$error = null;
$dimension = $_POST['dimension'] ?? '2';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($dimension === '2') {
        $campos = ['a1','b1','c1','a2','b2','c2'];
        foreach ($campos as $campo) {
            if (!isset($_POST[$campo]) || !is_numeric($_POST[$campo])) {
                $error = "Faltan campos válidos para sistema 2x2.";
                break;
            }
        }
        if (!$error) {
            $e1 = ['x' => (float)$_POST['a1'], 'y' => (float)$_POST['b1'], 'c' => (float)$_POST['c1']];
            $e2 = ['x' => (float)$_POST['a2'], 'y' => (float)$_POST['b2'], 'c' => (float)$_POST['c2']];
            $sistema = new SistemaLineal2x2($e1, $e2);
            $resultado = $sistema->calcularResultado();
        }

    } elseif ($dimension === '3') {
        $matriz = [];
        for ($i = 1; $i <= 3; $i++) {
            $fila = [];
            foreach (['a','b','c','d'] as $letra) {
                $key = $letra.$i;
                if (!isset($_POST[$key]) || !is_numeric($_POST[$key])) {
                    $error = "Faltan campos válidos para sistema 3x3.";
                    break 2;
                }
                $fila[] = (float)$_POST[$key];
            }
            $matriz[] = $fila;
        }

        $sistema = new SistemaLineal3x3($matriz);
        $resultado = $sistema->calcularResultado();
    }
}
