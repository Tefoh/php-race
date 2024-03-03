<?php

namespace PhpRace\App;

class Main
{
    private array $vehicles;

    public function __construct()
    {
        $this->vehicles = json_decode(
            file_get_contents('./src/vehicles.json'), true
        );
    }

    public function start()
    {
        echo 'test';
    }
}
