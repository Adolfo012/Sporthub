
<h1>Editar Torneo</h1>

<form action="{{route('torneos.update', $torneo)}}" method="POST">
    @csrf
    @method('put') {{-- Change POST to put route --}}
    <label>Nombre de torneo: <br>
        <input type = "text" name="name" value="{{ $torneo->name }}"> <br>  {{-- old() recovers what was in the field before the error --}}
    </label>
    @error('name')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <label>Ubicación: <br>
        <input type = "text" name="ubicacion" value="{{ $torneo->ubicacion }}"> <br>  {{-- old() recovers what was in the field before the error --}}
    </label>
    @error('ubicacion')  {{-- Checks if there has been an error in the "ubicacion" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <label>Tipo de juego del torneo: <br>
        <input type = "text" name="tipoJuego" value="{{ $torneo->tipoJuego }}"> <br>
    </label>
    @error('tipoJuego')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    
    @enderror

    <label>Descripción: <br>
        <input type = "text" name="descripcion" value="{{ $torneo->descripcion }}"> <br>
    </label>
    @error('descripcion')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror
    
    <label>Fecha de Inicio: <br>
        <input type = "date" name="fechaInicio" value="{{ $torneo->fechaInicio }}"> <br>
    </label>
    @error('fechaInicio')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror

    <label>Fecha de Fin: <br>
        <input type = "date" name="fechaFin" value="{{ $torneo->fechaFin }}"> <br>
    </label>
    @error('fechaFin')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror
    <label for="individual">Tipo de torneo actual: {{$torneo->tipoTorneo}}</label><br>
    <label for="individual">Individual</label>
    <input type="radio" id="Individual" name="tipoTorneo" value="Individual" required value="{{old('tipoTorneo')}}"> <br>
    <label for="equipos">Equipos</label>
    <input type="radio" id="Equipos" name="tipoTorneo" value="Equipos" required value="{{old('tipoTorneo')}}"> <br>
    @error('tipoTorneo')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror
    <label for="cantidad">Cantidad de miembros:</label>
    <input type="number" id="cantEquipo" name="cantEquipo" value="{{$torneo->cantEquipo}}"> 
    <br>
    @error('cantEquipo')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    @enderror
    
    


    <button type="submit">Actualizar</button>
    
    <a href="/torneos">Volver</a>
