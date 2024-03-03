<?php

namespace PhpRace\Console;

use PhpRace\Contracts\VehicleInterface;

class PlayCommand
{
    private VehicleInterface $firstPlayer;
    private VehicleInterface $secondPlayer;

    private array $fasterVehicle;
    private array $slowerVehicle;


    public function startRace($players)
    {
        $this->setPlayers($players);
        $this->setFasterAndSlowerVehicles();
        $this->setPlayerCycles();

        $this->firstPlayer->run();
        $this->secondPlayer->run();
        $this->showWinner();
    }

    private function setPlayers(array $players)
    {
        $this->setFirstPlayer($players[0]);
        $this->setSecondPlayer($players[1]);
    }

    private function setFirstPlayer(VehicleInterface $firstPlayer): void
    {
        $this->firstPlayer = $firstPlayer;
    }

    private function setSecondPlayer(VehicleInterface $secondPlayer): void
    {
        $this->secondPlayer = $secondPlayer;
    }

    private function setFasterAndSlowerVehicles()
    {
        $this->setFasterVehicle();
        $this->setSlowerVehicle();
    }

    private function setFasterVehicle()
    {
        $this->fasterVehicle = $this->isFirstPlayerFaster()
            ? ['player' => 1, 'vehicle' => $this->firstPlayer]
            : ['player' => 2, 'vehicle' => $this->secondPlayer];
    }

    private function setSlowerVehicle()
    {
        $this->slowerVehicle = $this->isFirstPlayerSlower()
            ? ['player' => 1, 'vehicle' => $this->firstPlayer]
            : ['player' => 2, 'vehicle' => $this->secondPlayer];
    }

    public function isFirstPlayerFaster(): bool
    {
        $firstPlayerSpeed = $this->firstPlayer->getSpeed();
        $secondPlayerSpeed = $this->secondPlayer->getSpeed();

        return $firstPlayerSpeed > $secondPlayerSpeed;
    }

    public function isFirstPlayerSlower(): bool
    {
        return ! $this->isFirstPlayerFaster();
    }

    private function setPlayerCycles()
    {
        /** @var VehicleInterface $fasterVehicle */
        $fasterVehicle = $this->fasterVehicle['vehicle'];
        /** @var VehicleInterface $slowerVehicle */
        $slowerVehicle = $this->slowerVehicle['vehicle'];

        $fasterVehicle->setCycles(100);
        $slowerVehicle->setCycles(
            100 / (
                $fasterVehicle->getSpeed() / $slowerVehicle->getSpeed()
            )
        );
    }

    /**
     * @return void
     */
    public function showWinner(): void
    {
        $player = $this->fasterVehicle['player'];

        /** @var VehicleInterface $vehicle */
        $vehicle = $this->fasterVehicle['vehicle'];

        $finishTimeInHour = $vehicle->finishKilometerDistanceInMinutes(100);
        $finishTimeInMinutes = $finishTimeInHour * 60;

        \cli\Colors::enable();
        \cli\line('  %1%2Player number ' . $player . ' with vehicle: ' . $vehicle->getName() . ' won!%n');
        \cli\line('  %1%4The race has been over in ' . $finishTimeInMinutes .' minutes!%n');
    }
}