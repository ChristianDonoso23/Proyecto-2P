<?php
declare(strict_types=1);

abstract class Estadistica {
    abstract public function calcularMedia(array $datos): float|null;
    abstract public function calcularMediana(array $datos): float|null;
    abstract public function calcularModa(array $datos): array|null;
}
