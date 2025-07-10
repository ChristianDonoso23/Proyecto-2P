<?php
declare(strict_types=1);
require_once __DIR__ . '/../Classes/SistemaLineal.php';

$resultado = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputs = ['a1','b1','c1','a2','b2','c2'];
    foreach ($inputs as $input) {
        if (!isset($_POST[$input]) || !is_numeric($_POST[$input])) {
            $error = "Por favor, ingrese valores numéricos válidos en todos los campos.";
            break;
        }
    }

    if ($error === null) {
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
}
