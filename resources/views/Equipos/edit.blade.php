
<h1>Editar Equipo</h1>

<form action="{{route('equipos.update', $equipo)}}" method="POST">
    @csrf
    @method('put') {{-- Change POST to put route --}}
    <label>Nombre de equipo: <br>
        <input type = "text" name="name" value="{{ old('name',$equipo->name) }}"> <br>  {{-- old() recovers what was in the field before the error --}}
    </label>
    @error('name')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror
    <label>Tipo de juego del equipo: <br>
        <input type = "text" name="tipoJuego" value="{{ old('tipoJuego',$equipo->tipoJuego) }}"> <br>
    </label>
    @error('tipoJuego')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror
    <label>Nombre del representante: <br>
        <input type = "text" name="user_id" value="{{ old('user_id',$representante->name) }}"> <br>
    </label>
    @error('user_id')  {{-- Checks if there has been an error in the "name" field --}}
    <span>*{{$message}}</span> {{--print a message if there is an error--}}
    <br>
    @enderror
    <button type="submit">Actualizar</button>
    <a href="/equipos">Volver</a>
