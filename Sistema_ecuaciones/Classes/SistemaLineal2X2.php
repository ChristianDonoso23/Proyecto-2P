<?php
declare(strict_types=1);
require_once 'SistemaEcuaciones.php';

class SistemaLineal2x2 extends SistemaEcuaciones {
    private float $a1, $b1, $c1;
    private float $a2, $b2, $c2;

    public function __construct(array $e1, array $e2) {
        [$this->a1, $this->b1, $this->c1] = [$e1['x'], $e1['y'], $e1['c']];
        [$this->a2, $this->b2, $this->c2] = [$e2['x'], $e2['y'], $e2['c']];
    }

    public function validarConsistencia(): bool {
        return $this->a1 * $this->b2 - $this->a2 * $this->b1 != 0.0;
    }

    public function calcularResultado(): array|string {
        if (!$this->validarConsistencia()) return "Sistema sin solución única.";

        $D = $this->a1 * $this->b2 - $this->a2 * $this->b1;
        $Dx = $this->c1 * $this->b2 - $this->c2 * $this->b1;
        $Dy = $this->a1 * $this->c2 - $this->a2 * $this->c1;

        $x = $Dx / $D;
        $y = $Dy / $D;

        return ['x' => round($x, 6), 'y' => round($y, 6)];
    }
}
