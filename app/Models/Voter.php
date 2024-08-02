<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    public function population() {
        $this->hasMany(Population::class);
    }

    protected $table = "voter";

    // protected $fillable = [
    //     'voterID',
    //     'name',
    //     'address',
    //     'age',
    // ];
}
