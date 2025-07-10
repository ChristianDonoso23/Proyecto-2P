<?php
declare(strict_types=1);
require_once __DIR__ . '/../Classes/SistemaLineal.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $e1 = [
        'x' => (float)$_POST['a1'],
        'y' => (float)$_POST['b1'],
        'c' => (float)$_POST['c1'],
    ];
    $e2 = [
        'x' => (float)$_POST['a2'],
        'y' => (float)$_POST['b2'],
        'c' => (float)$_POST['c2'],
    ];

    $sistema = new SistemaLineal($e1, $e2);
    $resultado = $sistema->calcularResultado();
}
