<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'population',
        'population_density',
        'average_temperature',
        'public_transportation_level',
        'average_salary',
        'living_conditions',
    ];
}