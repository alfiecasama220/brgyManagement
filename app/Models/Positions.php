<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Officials;

class Positions extends Model
{
    use HasFactory;

    public function officials() {
        return $this->hasMany(Officials::class);
    }

    // protected $table = "positions";
}
