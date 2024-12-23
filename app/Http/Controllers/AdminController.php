<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class AdminController extends Controller
{
    // Mostrar el panel de administración
    public function index()
    {
        return view('admin.index');
    }

    // Script para obtener ciudades y guardarlas en la BD si no existen
    public function fetchCities(Request $request)
    {
        // Simulación de obtención de datos (reemplaza con tu lógica real)
        $citiesData = [
            ['name' => 'New York', 'latitude' => 40.7128, 'longitude' => -74.0060, 'population' => 8419000],
            ['name' => 'London', 'latitude' => 51.5074, 'longitude' => -0.1278, 'population' => 9000000],
            ['name' => 'Tokyo', 'latitude' => 35.6895, 'longitude' => 139.6917, 'population' => 13929286],
        ];

        foreach ($citiesData as $cityData) {
            City::firstOrCreate(['name' => $cityData['name']], $cityData);
        }

        return redirect()->route('admin.index')->with('success', 'Cities fetched and saved successfully!');
    }

    // Script para actualizar la población y la densidad de población
    public function updatePopulation(Request $request)
    {
        // Simulación de actualización de datos (reemplaza con tu lógica real)
        $cities = City::all();
        foreach ($cities as $city) {
            $city->population = rand(1000000, 10000000); // Ejemplo aleatorio
            $city->population_density = $city->population / 100; // Ejemplo aleatorio
            $city->save();
        }

        return redirect()->route('admin.index')->with('success', 'Population updated successfully!');
    }

    // Script para actualizar la temperatura promedio
    public function updateTemperature(Request $request)
    {
        // Simulación de actualización de datos (reemplaza con tu lógica real)
        $cities = City::all();
        foreach ($cities as $city) {
            $city->average_temperature = rand(10, 30); // Ejemplo aleatorio
            $city->save();
        }

        return redirect()->route('admin.index')->with('success', 'Temperature updated successfully!');
    }

    // Script para actualizar el salario promedio
    public function updateSalary(Request $request)
    {
        // Simulación de actualización de datos (reemplaza con tu lógica real)
        $cities = City::all();
        foreach ($cities as $city) {
            $city->average_salary = rand(20000, 50000); // Ejemplo aleatorio
            $city->save();
        }

        return redirect()->route('admin.index')->with('success', 'Salary updated successfully!');
    }

    // Script para actualizar el nivel de transporte público
    public function updateTransport(Request $request)
    {
        // Simulación de actualización de datos (reemplaza con tu lógica real)
        $cities = City::all();
        foreach ($cities as $city) {
            $city->public_transportation_level = rand(1, 10); // Ejemplo aleatorio
            $city->save();
        }

        return redirect()->route('admin.index')->with('success', 'Transportation level updated successfully!');
    }
}