<?php

namespace PhpRace\App;

use PhpRace\Entities\Airplane;
use PhpRace\Entities\Boat;
use PhpRace\Entities\Vehicle;
use PhpRace\Exceptions\UnknownVehicleTypeException;

class Main
{
    private array $vehicles;
    private array $vehicleNames;

    public function __construct()
    {
        $vehicleJsonFile = json_decode(
            file_get_contents('./src/vehicles.json'), true
        );
        $this->parseVehicles($vehicleJsonFile);
    }

    public function start()
    {
        $players = [];
        $i = 1;
        while ($i <= 2) {
            $vehicleIndex = \cli\menu(
                $this->vehicleNames,
                null,
                "Player number ". $i ." Choose a vehicle"
            );

            $vehicle = $this->vehicles[$vehicleIndex];

            $class = $vehicle['class'];
            unset($vehicle['class']);

            $players[] = (new $class());
            \cli\line();
            array_splice($this->vehicles, $vehicleIndex, 1);
            array_splice($this->vehicleNames, $vehicleIndex, 1);

            $i++;
        }
        var_dump($players);
    }

    /**
     * @throws UnknownVehicleTypeException
     */
    private function parseVehicles($vehicles): void
    {
        $this->vehicles = array_map(
            function ($vehicle) {
                $this->vehicleNames[] = $vehicle['name'];
                switch ($vehicle['unit']) {
                    case 'Km/h':
                        $vehicle['class'] = Vehicle::class;
                        return $vehicle;
                    case 'knots':
                        $vehicle['class'] = Boat::class;
                        return $vehicle;
                    case 'Kts':
                        $vehicle['class'] = Airplane::class;
                        return $vehicle;
                    default:
                        throw new UnknownVehicleTypeException('Unknown Vehicle type!');
                }
            }, $vehicles
        );
    }
}
