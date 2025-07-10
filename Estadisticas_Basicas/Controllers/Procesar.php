<?php
declare(strict_types=1);
require_once __DIR__ . '/../Classes/EstadisticaBasica.php';

$resultado = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dataset'])) {
    $datosEntrada = explode(',', $_POST['dataset']);
    $datosNumericos = array_map('floatval', array_filter($datosEntrada, 'is_numeric'));

    $estadistica = new EstadisticaBasica();
    $resultado = [
        'media' => $estadistica->calcularMedia($datosNumericos),
        'mediana' => $estadistica->calcularMediana($datosNumericos),
        'moda' => $estadistica->calcularModa($datosNumericos),
    ];
}
