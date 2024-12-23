@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="map" style="height: 600px;"></div>
        </div>
    </div>
</div>

<script>
    // Inicializar el mapa con Leaflet.js
    var map = L.map('map').setView([0, 0], 2); // Vista inicial centrada en el mundo

    // Añadir un mapa base (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Función para cargar las ciudades desde la API
    async function loadCities() {
        try {
            const response = await fetch('/api/cities');
            const cities = await response.json();

            cities.forEach(city => {
                // Crear un marcador para cada ciudad
                L.marker([city.latitude, city.longitude])
                    .bindPopup(`<b>${city.name}</b><br>Score: ${city.score}`)
                    .addTo(map);
            });
        } catch (error) {
            console.error('Error loading cities:', error);
        }
    }

    // Cargar las ciudades al cargar la página
    loadCities();
</script>
@endsection