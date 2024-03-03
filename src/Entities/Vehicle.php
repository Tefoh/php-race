<?php

namespace PhpRace\Entities;

use PhpRace\Contracts\VehicleInterface;
use PhpRace\Traits\HasCycles;
use PhpRace\Traits\HasRun;
use PhpRace\Traits\HasSpeed;
use PhpRace\Traits\HasVehicleProperties;

class Vehicle implements VehicleInterface
{
    use HasVehicleProperties, HasSpeed, HasCycles, HasRun;

    public function convertToKiloMeterPerHour(): int
    {
        return $this->maxSpeed;
    }
}
