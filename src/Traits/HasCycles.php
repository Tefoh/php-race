<?php

namespace PhpRace\Traits;

trait HasCycles
{
    private int $cycle;
    private int $sleep;

    public function setCycles(int $cycle): void
    {
        $this->cycle = $cycle;
        $this->sleep = (100 / $cycle) * 100000;
    }
}
