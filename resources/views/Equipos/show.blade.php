@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Equipo')

@section('content')

<title>Equipo {{$equipo->name}}</title>
    
<h1>Mi equipo:{{$equipo->name}}</h1>
        <p>El equipo juega: {{$equipo->tipoJuego}} <br> Y con representante: {{$representante->name}}</p>
        <a href="{{route('equipos.edit',$equipo)}}">Editar equipo</a>
        <a href="{{route('equipos.index')}}">Volver a equipos</a>

        <form action="{{route('equipos.destroy',$equipo)}}" method="POST">
            @csrf
            @method("delete") {{---Change the default "post" route to "delete" ---}}
            <button type="submit"> Eliminar equipo </button>
        </form>
@endsection
