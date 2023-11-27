@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Torneo')

<title>Torneo: {{$torneo->name}}</title>

@section('content')
<main class="home-section">
    <section class="principalbox">
        <section class="contorno">
            <h1>Torneo: {{$torneo->name}}</h1><br>
            <p>El torneo juega: {{$torneo->tipoJuego}} <br> 
                Organizador: {{$organizador->name}} <br> 
                Detalles: {{$torneo->descripcion}}<br> 
                Ubicacion de torneo: {{$torneo->ubicacion}}<br> 
                Fecha de comienzo: {{$torneo->fechaInicio}}<br> 
                Fecha de finalizacion: {{$torneo->fechaFin}}<br> 
                Tipo de torneo: {{$torneo->tipoTorneo}}<br> 
                Cantidad de miembros admitida: {{$torneo->cantEquipo}}<br> <br> 

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

            <div class="flex-contianer">
                @if(auth()->user()->id == $torneo->user_id) {{-- Verifica si el usuario es el representante --}}
                    <a class="button-right" href="{{route('torneos.edit',$torneo)}}">Editar torneo</a>
                    <form action="{{route('torneos.destroy',$torneo)}}" method="POST">
                        @csrf
                        @method("delete") {{---Change the default "post" route to "delete" ---}}
                        <button class="button-left" type="submit" style="height: 45px; margin-top: 13px;"> Eliminar torneo </button>
                    </form>
                @endif

                <a class="button-right" href="{{route('dashboard.index')}}">Volver</a>
            </div>
        </section>
    </section>
</main>
@endsection
