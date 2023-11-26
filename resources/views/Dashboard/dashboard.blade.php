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
                                        <div class="minibox">
                                        <p class="tournament">{{$torneo->name}}</p>
                                        <p class="description">Organizador:{{$equipoTorneo->nickname}}</p>
                                        <p class="description">Equipo:{{$miembro->miembros->name}}</p>
                                        <p class="description">Tipo: Baloncesto</p>
                                        <p class="description">Rol: Miembro</p>
                                        </div>
                                        @continue
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @foreach($participanteTorneos as $individualTorneo)    {{-- representante individual--}}
                    @if (auth()->user()->id == $individualTorneo->user_id)
                        <div class="minibox">
                            @php
                                $torneo = App\Models\Torneo::find($individualTorneo->torneo_id);
                            @endphp
                        <p class="tournament">{{$torneo->name}}</p>
                        <p class="description">Organizador:{{$torneo->organizador->nickname}}</p>
                        <p class="description">Tipo: Baloncesto</p>
                        <p class="description">Rol: Individual</p>
                        @continue
                        </div>
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
                    @endif
                @endforeach
                @foreach($miembrosEquipos as $miembro)    {{-- miembro --}}
                    @if ((auth()->user()->name== $miembro->user_miembro) && (auth()->user()->id != $miembro->miembros->user_id))
                        <div class="minibox">
                        <p class="tournament">{{$miembro->miembros->name}}</p>
                        <p class="description">Rol: Miembro</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Próximos partidos</p>
            <table>
                <thead>
                <tr>
                    <th>Torneo</th>
                    <th>Equipo Local</th>
                    <th>Equipo Visitante</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
                </thead>
                <tbody>
                <!-- Ejemplos de datos en la tabla (puedes agregar más filas según tus necesidades) -->
                <tr>
                    <td>Torneo 1</td>
                    <td>Equipo A</td>
                    <td>Equipo B</td>
                    <td>2023-12-01</td>
                    <td>15:00</td>
                </tr>
                <tr>
                    <td>Torneo 1</td>
                    <td>Equipo C</td>
                    <td>Equipo D</td>
                    <td>2023-12-02</td>
                    <td>18:30</td>
                </tr>
                </tbody>
            </table>

        </section>

    </main>
@endsection
