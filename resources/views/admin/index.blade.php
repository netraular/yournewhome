@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Admin Panel</h1>
            <p>Welcome to the admin panel. Use the buttons below to execute scripts.</p>

            <!-- Botón para obtener ciudades -->
            <form action="{{ route('admin.fetch-cities') }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary">Fetch Cities</button>
            </form>

            <!-- Botón para actualizar población -->
            <form action="{{ route('admin.update-population') }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary">Update Population</button>
            </form>

            <!-- Botón para actualizar temperatura -->
            <form action="{{ route('admin.update-temperature') }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary">Update Temperature</button>
            </form>

            <!-- Botón para actualizar salario -->
            <form action="{{ route('admin.update-salary') }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary">Update Salary</button>
            </form>

            <!-- Botón para actualizar transporte público -->
            <form action="{{ route('admin.update-transport') }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary">Update Transportation</button>
            </form>

            <!-- Mensajes de éxito -->
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection