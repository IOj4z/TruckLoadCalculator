<?php

namespace App\Contracts;

abstract class AbstractVehicle implements Vehicle {
    protected $volume;
    protected $palletCapacity;

    public function getVolume() {
        return $this->volume * 1000000;
    }

    public function getPalletCapacity() {
        return $this->palletCapacity;
    }
}
