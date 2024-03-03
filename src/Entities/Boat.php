<?php

namespace PhpRace\Entities;

use PhpRace\Contracts\VehicleInterface;
use PhpRace\Traits\HasCycles;
use PhpRace\Traits\HasRun;
use PhpRace\Traits\HasSpeed;
use PhpRace\Traits\HasVehicleProperties;

class Boat implements VehicleInterface
{
    use HasVehicleProperties, HasSpeed, HasCycles, HasRun;

    public function convertToKiloMeterPerHour(): int
    {
        return $this->maxSpeed * 1.852;
    }
}
