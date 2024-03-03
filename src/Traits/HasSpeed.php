<?php

namespace PhpRace\Traits;

trait HasSpeed
{
    abstract public function convertToKiloMeterPerHour(): int;

    public function getSpeed(): int
    {
        return $this->convertToKiloMeterPerHour();
    }

    public function finishKilometerDistanceInMinutes(int $distance): int
    {
        return $distance / $this->getSpeed();
    }
}
