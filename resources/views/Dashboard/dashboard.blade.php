@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')

@section('content')
    <main class="home-section">
        <section class="principalbox">
            <p class="title">Mis Torneos</p>
            <div class="box">
                @forelse($torneos as $torneo)
                    <div class="minibox">
                        <p class="tournament">{{$torneo->name}}</p>
                        <p class="description">Organizador: </p>
                        <p class="description">Equipo: </p>
                        <p class="description">Rol: </p>
                    </div>
                    @empty
                    <p>No hay torneos</p>
                @endforelse
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Mis equipos</p>
            <div class="box">
                @forelse($equipos as $equipo)
                    <div class="minibox">
                        <p class="tournament">{{ $equipo->name }}</p>
                        <p class="description">Organizador:</p>
                        <p class="description">Capitan:</p>
                        <p class="description">Torneo:</p>
                    </div>
                    @empty
                    <p>No hay equipos</p>
                @endforelse
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Próximos partidos</p>
        </section>

    </main>
@endsection
