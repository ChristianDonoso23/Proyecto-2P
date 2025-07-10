<?php
declare(strict_types=1);
require_once 'SistemaEcuaciones.php';

class SistemaLineal3x3 extends SistemaEcuaciones {
    private array $matriz;

    public function __construct(array $matriz) {
        $this->matriz = $matriz;
    }

    public function validarConsistencia(): bool {
        // Simple validación para evitar divisor por cero (puedes mejorar esta lógica)
        return $this->matriz[0][0] != 0.0 || $this->matriz[1][1] != 0.0 || $this->matriz[2][2] != 0.0;
    }

    public function calcularResultado(): array|string {
        $a = $this->matriz;

        // Eliminación de Gauss
        for ($i = 0; $i < 3; $i++) {
            if ($a[$i][$i] == 0.0) {
                for ($j = $i + 1; $j < 3; $j++) {
                    if ($a[$j][$i] != 0.0) {
                        $temp = $a[$i];
                        $a[$i] = $a[$j];
                        $a[$j] = $temp;
                        break;
                    }
                }
            }

            for ($j = $i + 1; $j < 3; $j++) {
                $factor = $a[$j][$i] / $a[$i][$i];
                for ($k = $i; $k < 4; $k++) {
                    $a[$j][$k] -= $factor * $a[$i][$k];
                }
            }
        }

        // Sustitución regresiva
        if ($a[2][2] == 0.0) {
            return "Sistema sin solución única o indeterminado.";
        }
        $z = $a[2][3] / $a[2][2];
        $y = ($a[1][3] - $a[1][2] * $z) / $a[1][1];
        $x = ($a[0][3] - $a[0][2] * $z - $a[0][1] * $y) / $a[0][0];

        return ['x' => round($x, 6), 'y' => round($y, 6), 'z' => round($z, 6)];
    }
}
