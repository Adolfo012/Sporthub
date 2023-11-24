@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Equipo')

@section('content')

<title>Equipo {{$equipo->name}}</title>
    
<h1>Mi equipo:{{$equipo->name}}</h1>
        <p>El equipo juega: {{$equipo->tipoJuego}} <br> Y con representante: {{$representante->name}}<br
        Partido local: 
        @foreach($equipo->partidoLocal as $local){{-- For each equipo in equipos--}}   
                    <li>
                    {{$local->resLocal}}
                     </li> 
        @endforeach
    </p>
        <a href="{{route('equipos.edit',$equipo)}}">Editar equipo</a>
        <a href="{{route('equipos.index')}}">Volver a equipos</a>
        @php
        $miembros = App\Models\MiembroEquipo::all(); 
        @endphp
        <h2>Miembros del equipo:</h2>
        @foreach ($miembros as $miembro)
        @php
        $equipoMiembro = App\Models\Equipo::find($miembro->equipo_id);
        @endphp
        @if ($equipoMiembro->user_id == auth()->user()->id && $miembro->equipo_id == $equipo->id)
        Miembro: {{$miembro->user_miembro}}<br>
        @endif
        @endforeach

        <form action="{{route('equipos.destroy',$equipo)}}" method="POST">
            @csrf
            @method("delete") {{---Change the default "post" route to "delete" ---}}
            <button type="submit"> Eliminar equipo </button>
        </form>
@endsection
