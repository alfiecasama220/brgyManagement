<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Positions;

class Officials extends Model
{
    use HasFactory;

    public function position() {
        return $this->belongsTo(Positions::class);
    }

    // protected $table = "officials";

    // protected $fillable = [
    //     'name',
    //     'position',
    // ];
}
