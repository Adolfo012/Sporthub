@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')

@section('content')

@php
    $equipos = App\Models\Equipo::all();
    $miembrosEquipos= App\Models\MiembroEquipo::all();

    $torneos = App\Models\Torneo::all();
    $participanteTorneos = App\Models\ParticipanteTorneo::all();
    $equipoTorneos = App\Models\EquipoTorneo::all();
    $torneo = App\Models\Torneo::find($equipoTorneos);
    $partidos = App\Models\Partido::all();

    $flag = true


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
                        @php
                            $flag =false;
                        @endphp
                    @elseif($flag == true)
                        @foreach($partidos as $partido) {{-- Representantes de equipo--}}
                            @if (auth()->user()->id == $partido->local->user_id && $flag == true)
                                <div class="minibox">
                                    <a class="tournament">{{$partido->estanTorneos[0]->name}}</a>
                                    <p class="description">Organizador: {{$partido->estanTorneos[0]->organizador->nickname}}</p>
                                    <p class="description">Equipo: {{$partido->local->name}}</p>
                                    <p class="description">Tipo: Baloncesto</p>
                                    <p class="description">Rol: Representante </p>
                                </div>
                                @php
                                    $flag =false;
                                @endphp
                            @elseif (auth()->user()->id == $partido->visitante->user_id && $flag == true)
                                <div class="minibox">
                                    <a class="tournament">{{$partido->estanTorneos[0]->name}}</a>
                                    <p class="description">Organizador:{{$partido->estanTorneos[0]->organizador->nickname}}</p>
                                    <p class="description">Equipo: {{$partido->visitante->name}}</p>
                                    <p class="description">Tipo: Baloncesto</p>
                                    <p class="description">Rol: Representante </p>
                                </div>
                                @php
                                    $flag =false;
                                @endphp
                            @else
                                @foreach($miembrosEquipos as $miembro)    {{-- miembro de equipo--}}
                                    @if (auth()->user()->name== $miembro->user_miembro && $flag == true)
                                        <div class="minibox">
                                        <p class="tournament">{{$partido->estanTorneos[0]->name}}</p> 
                                        <p class="description">Organizador:{{$partido->estanTorneos[0]->nickname}}</p>
                                        <p class="description">Equipo:{{$miembro->miembros->name}}</p>
                                        <p class="description">Tipo: Baloncesto</p>
                                        <p class="description">Rol: Miembro</p>
                                        </div>
                                        @php
                                            $flag =false;
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif

                    @foreach($participanteTorneos as $individualTorneo)    {{-- representante individual--}}
                    @if (auth()->user()->id == $individualTorneo->user_id && $flag == true)
                        <div class="minibox">
                            @php
                                $torneo = App\Models\Torneo::find($individualTorneo->torneo_id);
                            @endphp
                        <p class="tournament">{{$torneo->name}}</p>
                        <p class="description">Organizador:{{$torneo->organizador->nickname}}</p>
                        <p class="description">Tipo: Baloncesto</p>
                        <p class="description">Rol: Individual</p>
                        </div>
                        @php
                            $flag =false;
                        @endphp
                    @endif
                @endforeach
                @endforeach
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Mis equipos</p>
            <div class="box">
                @foreach($equipos as $equipo)    {{-- representante de equipo--}}
                    @if (auth()->user()->id == $equipo->user_id )
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
                @foreach($partidos as $partido) {{-- Representantes de equipo--}}
                    @if (auth()->user()->id == $partido->local->user_id)
                        <tr>
                            <td>Torneo {{$partido->estanTorneos[0]->name}}</td> {{--checar posibles errores--}}
                            <td>Equipo {{$partido->local->name}}</td>
                            <td>Equipo {{$partido->visitante->name}}</td>
                            <td>{{$partido->fechaPartido}}</td>
                            <td>{{$partido->horaPartido}}</td>
                        </tr>
                    @elseif (auth()->user()->id == $partido->visitante->user_id)
                        <tr>
                            <td>Torneo {{$partido->estanTorneos[0]->name}}</td>{{--checar posibles errores--}}
                            <td>Equipo {{$partido->visitante->name}}</td>
                            <td>Equipo {{$partido->local->name}}</td>
                            <td>{{$partido->fechaPartido}}</td>
                            <td>{{$partido->horaPartido}}</td>
                        </tr>
                    @else
                        @foreach($miembrosEquipos as $miembro) {{-- Participante de partidos--}}   
                            @if (auth()->user()->name == $miembro->user_miembro)
                                <tr>
                                    <td>Torneo {{$partido->estanTorneos[0]->name}}</td> {{--checar posibles errores--}}
                                    <td>Equipo miembro {{$partido->local->name}}</td>
                                    <td>Equipo {{$partido->visitante->name}}</td>
                                    <td>{{$partido->fechaPartido}}</td>
                                    <td>{{$partido->horaPartido}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
