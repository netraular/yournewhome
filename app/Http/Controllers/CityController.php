<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getCities()
    {
        // Obtener todas las ciudades con los campos necesarios
        $cities = City::all([
            'name',
            'latitude',
            'longitude',
            'population',
            'population_density',
            'average_temperature',
            'public_transportation_level',
            'average_salary',
            'living_conditions',
        ]);

        return response()->json($cities);
    }
}