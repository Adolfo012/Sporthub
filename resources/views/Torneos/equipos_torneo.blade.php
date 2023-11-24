<form action="{{route('torneos.store',$torneo)}}" method="POST">
@csrf
@php
$equipos = App\Models\Equipo::all();
@endphp
<label for="equipo_inscrito">Selecciona un equipo disponible a inscribir: </label>
<select id="equipo_inscrito" name="equipo_inscrito">
    @foreach($equipos as $equipo)
    @php
    $participante = App\Models\EquipoTorneo::where('equipo_id', $equipo->id)->first();
    @endphp
        @if (!$participante)  {{--Valida que la cantidad de miembros de un equipo, sea menor que la que se indicó en el torneo--}}
        <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
        @endif
    @endforeach
</select>
<button type="submit">Añadir equipo</button>
@if(isset($mensaje))
    <p>{{ $mensaje }}</p>
@endif
<a href="{{route('torneos.edit',$torneo)}}">Volver</a>
</form>