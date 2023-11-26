@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <main class="home-section">
        <section class="principalbox">
            <p class="title">Mis Torneos</p>
            <div id="torneosCarousel" class="carousel slide" data-ride="carousel">
                <div class=class="carousel-inner">
                    @forelse($torneos as $index => $torneo)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="minibox">
                            <p class="tournament">{{$torneo->name}}</p>
                            <p class="description">Organizador: </p>
                            <p class="description">Equipo: </p>
                            <p class="description">Rol: </p>
                        </div>
                    </div>
                    @empty
                    <p>No hay torneos</p>
                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#torneosCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#torneosCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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
