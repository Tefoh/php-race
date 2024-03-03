<?php

namespace PhpRace\Traits;

trait HasRun
{
    public function run()
    {
        $notify = new \cli\progress\Bar('', 100);
        $notify->display();
        for ($i = 0; $i < $this->cycle; $i++) {
            if ($this->sleep) usleep($this->sleep);
            $msg = sprintf('  Finished step %d', $i + 1);
            $notify->tick(1, $msg);
        }
        if ((int) $notify->total() === $this->cycle) {
            $notify->finish();
        }
    }
}
