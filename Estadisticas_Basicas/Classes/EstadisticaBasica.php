<?php
declare(strict_types=1);
require_once 'Estadistica.php';

class EstadisticaBasica extends Estadistica {

    public function calcularMedia(array $datos): float|null {
        if (count($datos) === 0) return null;
        return array_sum($datos) / count($datos);
    }

    public function calcularMediana(array $datos): float|null {
        if (count($datos) === 0) return null;
        sort($datos);
        $n = count($datos);
        $m = intdiv($n, 2);
        return $n % 2 === 0
            ? ($datos[$m - 1] + $datos[$m]) / 2
            : $datos[$m];
    }

    public function calcularModa(array $datos): array|null {
        if (count($datos) === 0) return null;
        $frecuencias = array_count_values($datos);
        $max = max($frecuencias);
        $moda = array_keys(array_filter($frecuencias, fn($v) => $v === $max));
        return count($moda) === count($frecuencias) ? null : $moda;
    }
}
