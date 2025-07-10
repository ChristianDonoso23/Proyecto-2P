<?php
declare(strict_types=1);
require_once 'SistemaEcuaciones.php';

class SistemaLineal3x3 extends SistemaEcuaciones {
    private array $coeficientes;

    public function __construct(array $matriz) {
        $this->coeficientes = $matriz; // array de 3 arrays con a, b, c, d
    }

    private function determinante(array $m): float {
        return $m[0][0]*($m[1][1]*$m[2][2] - $m[1][2]*$m[2][1])
             - $m[0][1]*($m[1][0]*$m[2][2] - $m[1][2]*$m[2][0])
             + $m[0][2]*($m[1][0]*$m[2][1] - $m[1][1]*$m[2][0]);
    }

    public function validarConsistencia(): bool {
        $matriz = array_map(fn($row) => array_slice($row, 0, 3), $this->coeficientes);
        return $this->determinante($matriz) != 0.0;
    }

    public function calcularResultado(): array|string {
        $mat = $this->coeficientes;
        $D = $this->determinante(array_map(fn($row) => array_slice($row, 0, 3), $mat));

        if ($D == 0.0) return "Sistema sin solución única.";

        $Dx = $this->determinante([
            [$mat[0][3], $mat[0][1], $mat[0][2]],
            [$mat[1][3], $mat[1][1], $mat[1][2]],
            [$mat[2][3], $mat[2][1], $mat[2][2]],
        ]);
        $Dy = $this->determinante([
            [$mat[0][0], $mat[0][3], $mat[0][2]],
            [$mat[1][0], $mat[1][3], $mat[1][2]],
            [$mat[2][0], $mat[2][3], $mat[2][2]],
        ]);
        $Dz = $this->determinante([
            [$mat[0][0], $mat[0][1], $mat[0][3]],
            [$mat[1][0], $mat[1][1], $mat[1][3]],
            [$mat[2][0], $mat[2][1], $mat[2][3]],
        ]);

        return [
            'x' => round($Dx / $D, 6),
            'y' => round($Dy / $D, 6),
            'z' => round($Dz / $D, 6),
        ];
    }
}
