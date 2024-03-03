<?php

namespace PhpRace\Entities;

use PhpRace\Contracts\VehicleInterface;
use PhpRace\Traits\HasVehicleProperties;

class Boat implements VehicleInterface
{
    use HasVehicleProperties;
}
