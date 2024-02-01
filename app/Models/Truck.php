<?php

namespace App\Models;

use App\Contracts\AbstractVehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends AbstractVehicle {
    public function __construct($volume, $palletCapacity) {
        $this->volume = $volume;
        $this->palletCapacity = $palletCapacity;
    }
}
