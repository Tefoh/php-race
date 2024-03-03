<?php

namespace PhpRace\Contracts;

interface VehicleInterface
{
    public function __construct(
        string $name,
        int $maxSpeed,
        string $unit
    );

    public function getSpeed(): int;
}
