@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')
@section('content')

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
