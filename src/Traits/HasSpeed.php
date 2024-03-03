<?php

namespace PhpRace\Traits;

trait HasSpeed
{
    abstract public function convertToKiloMeterPerHour(): int;

    public function getSpeed(): int
    {
        return $this->convertToKiloMeterPerHour();
    }
}
