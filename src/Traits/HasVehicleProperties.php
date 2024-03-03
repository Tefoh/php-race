<?php

namespace PhpRace\Traits;

trait HasVehicleProperties
{
    public function __construct(
        protected string $name,
        protected int $maxSpeed,
        protected string $unit
    )
    { }
}
