<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Cargo;

class Box implements Cargo {
    private $length;
    private $width;
    private $height;
    private $volume;

    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->volume = $length * $width * $height;
    }

    public function getVolume() {
        return $this->volume;
    }
}
