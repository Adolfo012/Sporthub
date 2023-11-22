@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Torneo')

@section('content')

<title>Torneo {{$torneo->name}}</title>

<h1>Mi torneo:{{$torneo->name}}</h1>
        <p>El torneo juega: {{$torneo->tipoJuego}} <br> 
        Organizador: {{$organizador->name}} <br> 
        Detalles: {{$torneo->descripcion}}<br> 
        Ubicacion de torneo: {{$torneo->ubicacion}}<br> 
        Fecha de comienzo: {{$torneo->fechaInicio}}<br> 
        Fecha de finalizacion: {{$torneo->fechaFin}}<br> 
        Tipo de torneo: {{$torneo->tipoTorneo}}<br> 
        Cantidad de miembros admitida: {{$torneo->cantEquipo}}
        
        
        
        </p>

        <a href="{{route('torneos.edit',$torneo)}}">Editar torneo</a>
        <a href="{{route('torneos.index')}}">Volver a torneos</a>

        <form action="{{route('torneos.destroy',$torneo)}}" method="POST">
            @csrf
            @method("delete") {{---Change the default "post" route to "delete" ---}}
            <button type="submit"> Eliminar torneo </button>
        </form>
@endsection