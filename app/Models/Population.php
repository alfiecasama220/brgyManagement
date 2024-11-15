<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    public function voter()  {
        $this->belongsTo(Voter::class);
    }

    protected $table = 'population';

    // protected $fillable = [
    //     'name',
    //     'address',
    //     'age',
    // ];
}
