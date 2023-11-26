@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Torneo')

@section('content')
<main class="home-section">
<title>Torneo {{$torneo->name}}</title>

<h1>Mi torneo:{{$torneo->name}}</h1>
        <p>El torneo juega: {{$torneo->tipoJuego}} <br> 
        
        Organizador: {{$organizador->name}} <br> 
        Detalles: {{$torneo->descripcion}}<br> 
        Ubicacion de torneo: {{$torneo->ubicacion}}<br> 
        Fecha de comienzo: {{$torneo->fechaInicio}}<br> 
        Fecha de finalizacion: {{$torneo->fechaFin}}<br> 
        Tipo de torneo: {{$torneo->tipoTorneo}}<br> 
        Cantidad de miembros admitida: {{$torneo->cantEquipo}}<br> <br> 
        <a href="{{route('torneos.edit',$torneo)}}">Editar torneo</a>
        <a href="{{route('dashboard.index')}}">Volver a mis torneos</a>

        @if ($torneo->tipoTorneo == "Equipos")
        @php
        $equiposTorneo = App\Models\EquipoTorneo::all(); 
        @endphp
        <h2>Equipos en el torneo:</h2>
        
            @foreach ($equiposTorneo as $equipoTorneo)
                    @if($equipoTorneo->torneo_id == $torneo->id)
                        @php
                        $equipo = App\Models\Equipo::find($equipoTorneo->equipo_id);
                        @endphp
                        Equipo: {{$equipo->name}}<br>
                    @endif
            @endforeach
        @else
        @php
        $participantesTorneo = App\Models\ParticipanteTorneo::all(); 
        @endphp
        <h2>Participantes en el torneo:</h2>
        
            @foreach ($participantesTorneo as $participanteTorneo)
                    @if($participanteTorneo->torneo_id == $torneo->id)
                        @php
                        $user = App\Models\user::find($participanteTorneo->user_id);
                        @endphp
                        Participante: {{$user->name}}<br>
                    @endif
            @endforeach
        @endif

        <form action="{{route('torneos.destroy',$torneo)}}" method="POST">
            @csrf
            @method("delete") {{---Change the default "post" route to "delete" ---}}
            <button type="submit"> Eliminar torneo </button>
        </form>
    </main>
@endsection
