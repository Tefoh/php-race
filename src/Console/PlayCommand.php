<?php

namespace PhpRace\Console;

use PhpRace\Contracts\VehicleInterface;

class PlayCommand
{
    private VehicleInterface $firstPlayer;
    private VehicleInterface $secondPlayer;


    public function startRace($players)
    {
        $this->setPlayers($players);
        $firstPlayerSpeed = $this->firstPlayer->getSpeed();
        $secondPlayerSpeed = $this->secondPlayer->getSpeed();
        if ($firstPlayerSpeed > $secondPlayerSpeed) {
            $this->firstPlayer->setCycles(100);
            $this->secondPlayer->setCycles(100 / ($firstPlayerSpeed / $secondPlayerSpeed));
        } else {
            $this->secondPlayer->setCycles(100);
            $this->firstPlayer->setCycles(100 / ($secondPlayerSpeed / $firstPlayerSpeed));
        }
        $this->firstPlayer->run();
        $this->secondPlayer->run();
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
}