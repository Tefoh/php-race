<?php

namespace PhpRace\Entities;

use PhpRace\Contracts\VehicleInterface;
use PhpRace\Traits\HasVehicleProperties;

class Airplane implements VehicleInterface
{
    use HasVehicleProperties;
}
