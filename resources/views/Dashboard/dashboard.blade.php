@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')

@section('content')
@php
      $equipos = App\Models\Equipo::all();
      $miembrosEquipos= App\Models\MiembroEquipo::all();

      $torneos = App\Models\Torneo::all();
      $participanteTorneos = App\Models\ParticipanteTorneo::all();
      $equipoTorneos = App\Models\EquipoTorneo::all();

@endphp
    <main class="home-section">
        <section class="principalbox">
            <p class="title">Mis Torneos</p>
            <div class="box">
                @foreach($torneos as $torneo)
                    @if (auth()->user()->id == $torneo->user_id)  {{-- organizador--}}
                        <div class="minibox">
                        <a class="tournament" href="{{route('torneos.show',$torneo)}}"> {{$torneo->name}}</a>
                        <p class="description">Tipo: Baloncesto</p>
                        <p class="description">Rol: Organizador</p>
                        </div>
                        
                    @else
                        @foreach($torneo->estadistica as $equipoTorneo)    {{-- representante de equipo--}}
                            @if (auth()->user()->id == $equipoTorneo->user_id)
                                <div class="minibox">
                                <a class="tournament">{{$torneo->name}}</a>
                                <p class="description">Organizador:{{$equipoTorneo->nickname}}</p>
                                <p class="description">Equipo:{{$equipoTorneo->name}}</p>
                                <p class="description">Tipo: Baloncesto</p>
                                <p class="description">Rol: Representante</p>
                                </div>
                            @else
                                @foreach($miembrosEquipos as $miembro)    {{-- miembro de equipo--}}
                                    @if (auth()->user()->name== $miembro->user_miembro)
                                        <div class="minibosx">
                                        <p class="tournament">{{$torneo->name}}</p>
                                        <p class="description">Organizador:</p>
                                        <p class="description">Equipo:{{$miembro->miembros->name}}</p>
                                        <p class="description">Tipo: Baloncesto</p>
                                        <p class="description">Rol: Miembro</p>
                                        </div>
                                        @continue
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        @foreach($torneo->estadisticaIndividual as $individualTorneo)    {{-- representante individual--}}
                            @if (auth()->user()->id == $individualTorneo->user_id)
                                <div class="minibox">
                                <p class="tournament">{{$torneo->name}}</p>
                                <p class="description">Organizador:</p>
                                <p class="description">Equipo:</p>
                                <p class="description">Tipo: Baloncesto</p>
                                <p class="description">Rol: Representante Individual</p>
                                @continue
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Mis equipos</p>
            <div class="box">
                @foreach($equipos as $equipo)    {{-- representante de equipo--}}
                    @if (auth()->user()->id == $equipo->user_id)
                        <div class="minibox">
                        <a class="tournament">{{$equipo->name}}</a>
                        <p class="description">Rol: Representante</p>
                        </div>
                        @continue
                    @else
                        @foreach($miembrosEquipos as $miembro)    {{-- miembro --}}
                            @if ((auth()->user()->name== $miembro->user_miembro) && (auth()->user()->id != $miembro->miembros->user_id))
                                <div class="minibox">
                                <p class="tournament">{{$miembro->miembros->name}}</p>
                                <p class="description">Rol: Miembro</p>
                                </div>
                                @continue
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Próximos partidos</p>
        </section>

    </main>
@endsection
