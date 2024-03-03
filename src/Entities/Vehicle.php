<?php

namespace PhpRace\Entities;

use PhpRace\Contracts\VehicleInterface;
use PhpRace\Traits\HasVehicleProperties;

class Vehicle implements VehicleInterface
{
    use HasVehicleProperties;
}
