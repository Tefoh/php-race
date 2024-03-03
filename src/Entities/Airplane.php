<?php

namespace PhpRace\Entities;

use PhpRace\Contracts\VehicleInterface;
use PhpRace\Traits\HasCycles;
use PhpRace\Traits\HasSpeed;
use PhpRace\Traits\HasVehicleProperties;

class Airplane implements VehicleInterface
{
    use HasVehicleProperties, HasSpeed, HasCycles;

    public function convertToKiloMeterPerHour(): int
    {
        return $this->maxSpeed * 1.852;
    }
}
