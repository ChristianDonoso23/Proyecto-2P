<?php
declare(strict_types=1);

abstract class SistemaEcuaciones {
    abstract public function calcularResultado(): array|string;
    abstract public function validarConsistencia(): bool;
}
