<?php

namespace PhpRace\Entities;

use PhpRace\Contracts\VehicleInterface;
use PhpRace\Traits\HasSpeed;
use PhpRace\Traits\HasVehicleProperties;

class Boat implements VehicleInterface
{
    use HasVehicleProperties, HasSpeed;

    public function convertToKiloMeterPerHour(): int
    {
        return $this->maxSpeed * 1.852;
    }
}
