<?php

namespace App\Services;

use App\Models\Box;
use App\Models\Truck;

class TruckLoadCalculatorService
{
    private function convertVolume($volumeInCubicCentimeters) {
        return $volumeInCubicCentimeters / 1000000;
    }

    public function calculateLoad($numCargoUnits, $truckType)
    {
        $truck = new Truck($truckType, 8);
        $box = new Box(60, 40, 40);
        $cargo = $box; // Implementing Cargo interface
        $vehicle = $truck; // Implementing Vehicle interface

        if ($numCargoUnits <= 10) {
            $totalVolume = $cargo->getVolume() * $numCargoUnits;
            $palletsUsed = 1;
        } else {
            $palletsUsed = ceil($numCargoUnits / 10);
            $totalVolume = $cargo->getVolume() * $numCargoUnits + $palletsUsed * $vehicle->getPalletCapacity();
        }

        $remainingSpace = $vehicle->getVolume() - $totalVolume;

        return [
            "totalVolume" => $this->convertVolume($totalVolume),
            "palletsUsed" => $palletsUsed,
            "remainingSpace" => $this->convertVolume($remainingSpace)
        ];
    }
}
