<?php
declare(strict_types=1);
require_once 'SistemaEcuaciones.php';

class SistemaLineal extends SistemaEcuaciones {
    private float $a1;
    private float $b1;
    private float $c1;

    private float $a2;
    private float $b2;
    private float $c2;

    public function __construct(array $ecuacion1, array $ecuacion2) {
        $this->a1 = $ecuacion1['x'];
        $this->b1 = $ecuacion1['y'];
        $this->c1 = $ecuacion1['c'];
        $this->a2 = $ecuacion2['x'];
        $this->b2 = $ecuacion2['y'];
        $this->c2 = $ecuacion2['c'];
    }

    public function validarConsistencia(): bool {
        $determinante = $this->a1 * $this->b2 - $this->a2 * $this->b1;
        return $determinante != 0.0;
    }

    public function calcularResultado(): array|string {
        if (!$this->validarConsistencia()) {

            $proporcionA = ($this->a2 == 0) ? null : $this->a1 / $this->a2;
            $proporcionB = ($this->b2 == 0) ? null : $this->b1 / $this->b2;
            $proporcionC = ($this->c2 == 0) ? null : $this->c1 / $this->c2;

            if ($proporcionA === $proporcionB && $proporcionB === $proporcionC) {
                return "El sistema tiene infinitas soluciones (dependiente).";
            } else {
                return "El sistema no tiene solución (incompatible).";
            }
        }

        $det = $this->a1 * $this->b2 - $this->a2 * $this->b1;
        $detX = $this->c1 * $this->b2 - $this->c2 * $this->b1;
        $detY = $this->a1 * $this->c2 - $this->a2 * $this->c1;

        $x = $detX / $det;
        $y = $detY / $det;

        return ['x' => round($x, 6), 'y' => round($y, 6)];
    }
}
