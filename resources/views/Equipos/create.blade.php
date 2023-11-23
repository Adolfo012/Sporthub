@extends('Dashboard.dashboard') {{-- -Inherits dashboard- --}}
@section('title', 'Crear equipo')

@section('content')
<div class="equipos-create">
    <h1>Crear Equipo</h1>
        <form action="#" method="POST">
            @csrf
            <label>Nombre de equipo: <br>
                <input type = "text" name="name" value="{{ old('name') }}"> <br> {{-- old() recovers what was in the field before the error --}}
            </label>
            @error('name')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror
            <label>Tipo de juego del equipo: <br>
                <input type = "text" name="tipoJuego" value="{{ old('tipoJuego') }}"> <br>
            </label>
            @error('tipoJuego')
                {{-- Checks if there has been an error in the "name" field --}}
                <span>*{{ $message }}</span> {{-- print a message if there is an error --}}
                <br>
            @enderror

            <button type="submit">Crear</button>

            <a href="/equipos">Volver</a>
    </div>
@endsection
