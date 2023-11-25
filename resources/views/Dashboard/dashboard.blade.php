@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')

@section('content')
@php
      $equipos = App\Models\Equipo::all();
      $miembrosEquipos= App\Models\MiembroEquipo::all();

      $torneos = App\Models\Torneo::all();
      $participanteTorneos = App\Models\ParticipanteTorneo::all();
      $equipoTorneos = App\Models\EquipoTorneo::all();
    //   $equiposDivididos = $equipos->chunk($equipos->count() / 3);
    //   $torneosDivididos = $torneos->chunk($torneos->count() / 3);

    //   // Tercios de grupos
    //   $grupoequipo1 = $equiposDivididos[0];
    //   $grupoequipo2 = $equiposDivididos[1];
    //   $grupoequipo3 = $equiposDivididos[2];
    //   // Tercios de torneos
    //   $grupoetorneo1 = $torneosDivididos[0];
    //   $grupoetorneo2 = $torneosDivididos[1];
    //   $grupoetorneo3 = $torneosDivididos[2];
    //   $count = 0; //Contador torneo
    //   $countEquipo = 0; //Contador equipos
@endphp
    <main class="home-section">
        <section class="principalbox">
            <p class="title">Mis Torneos</p>
            <div class="box">
                @foreach($torneos as $torneo)
                    @if (auth()->user()->id == $torneo->user_id)  {{-- organizador--}}
                    <div class="minibox">
                    <a class="tournament" href="{{route('torneos.show',$torneo)}}"> {{$torneo->name}}</a>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol: Organizador</p>
                </div>
                @endif
                @endforeach

                @foreach($participanteTorneos as $torneo)   {{-- participante Ind--}}
                    @if (auth()->user()->id == $torneo->user_id)
                    <div class="minibox">
                    <a class="tournament">{{$torneo->torneo_id->name}}</a>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol: Participante</p>
                </div>
                @endif
                @endforeach

                @foreach($equipoTorneos as $equipo)    {{-- representante de equipo--}}
                    @if (auth()->user()->id == $equipo->user_id)
                    <div class="minibox">
                    <p class="tournament">{{$equipo->torneo_id}}</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol: Representante</p>
                </div>
                @endif
                @endforeach
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Mis equipos</p>
            <div class="box">
                @foreach($equipos as $equipo)    {{-- representante de equipo--}}
                    @if (auth()->user()->id == $equipo->id)
                    <div class="minibox">
                    <p class="tournament">{{$equipo->name}}</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol: Representante</p>
                </div>
                @endif
                @endforeach

                @foreach($miembrosEquipos as $miembro)    {{-- miembros de equipo--}}
                @if (auth()->user()->id == $miembro->user_id)    
                    @foreach(Equipos::fin($miembro->equipo_id) as $equipo)
                    
                    <div class="minibox">
                    <p class="tournament">{{$miembro}}</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol: Miembro de {{$equipo->name}}</p>
                </div>
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
