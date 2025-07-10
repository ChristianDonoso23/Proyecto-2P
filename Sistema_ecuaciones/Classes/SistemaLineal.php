<?php
declare(strict_types=1);
require_once 'SistemaEcuaciones.php';

class SistemaLineal extends SistemaEcuaciones {
    private array $ecuacion1;
    private array $ecuacion2;

    public function __construct(array $ecuacion1, array $ecuacion2) {
        $this->ecuacion1 = $ecuacion1;
        $this->ecuacion2 = $ecuacion2;
    }

    public function validarConsistencia(): bool {
        return $this->ecuacion2['x'] != 0;
    }

    public function calcularResultado(): array|string {
        if (!$this->validarConsistencia()) {
            return "No se puede despejar x de la segunda ecuación (a2 = 0).";
        }

        $a1 = $this->ecuacion1['x'];
        $b1 = $this->ecuacion1['y'];
        $c1 = $this->ecuacion1['c'];
        $a2 = $this->ecuacion2['x'];
        $b2 = $this->ecuacion2['y'];
        $c2 = $this->ecuacion2['c'];

        $coefY = -$a1 * $b2 + $b1 * $a2;
        $constante = $a1 * $c2;
        $derecha = $c1 * $a2;

        if ($coefY === 0.0) {
            return "El sistema no tiene solución única.";
        }

        $y = ($derecha - $constante) / $coefY;
        $x = ($c2 - $b2 * $y) / $a2;

        return ['x' => $x, 'y' => $y];
    }
}
