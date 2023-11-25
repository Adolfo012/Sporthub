@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')

@section('content')
@php
      $equipos = App\Models\Equipo::all();
      $torneos = App\Models\Torneo::all();
      $equiposDivididos = $equipos->chunk($equipos->count() / 3);
      $torneosDivididos = $torneos->chunk($torneos->count() / 3);

      // Tercios de grupos
      $grupoequipo1 = $equiposDivididos[0];
      $grupoequipo2 = $equiposDivididos[1];
      $grupoequipo3 = $equiposDivididos[2];
      // Tercios de torneos
      $grupoetorneo1 = $torneosDivididos[0];
      $grupoetorneo2 = $torneosDivididos[1];
      $grupoetorneo3 = $torneosDivididos[2];
      $count = 0; //Contador torneo
      $countEquipo = 0; //Contador equipos
  @endphp
    <main class="home-section">
        <section class="principalbox">
            <p class="title">Mis Torneos</p>
            <div class="box">
                <div class="minibox">
                    <p class="tournament">Torneo 1</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol:</p>
                </div>
                <div class="minibox">
                    <p class="tournament">Torneo 2</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol:</p>
                </div>
                <div class="minibox">
                    <p class="tournament">Torneo 1</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Equipo:</p>
                    <p class="description">Rol:</p>
                </div>
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Mis equipos</p>
            <div class="box">
                <div class="minibox">
                    <p class="tournament">Equipo 2</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Capitan:</p>
                    <p class="description">Torneo:</p>
                </div>
                <div class="minibox">
                    <p class="tournament">Equipo 2</p>
                    <p class="description">Organizador:</p>
                    <p class="description">Capitan:</p>
                    <p class="description">Torneo:</p>
                </div>
            </div>
        </section>
        <section class="principalbox">
            <p class="title">Próximos partidos</p>
        </section>

    </main>
@endsection
