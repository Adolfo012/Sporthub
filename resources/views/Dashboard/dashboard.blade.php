@extends('Dashboard.slidebar')
@section('title', 'SPORTHUB')

@section('content')


    <main class="home-section">
        
        <section class="principalbox">
            <p class="title">Mis Torneos</p>
                
                <div class="box">

                    <div class="minibox">
                        <p class="name">Torneo 1</p>
                        <p class="description">Organizador:</p>
                        <p class="description">Equipo:</p>
                        <p class="description">Tipo: Baloncesto</p>
                        <p class="description">Rol:</p>
                    </div>
                    
                    <div class="minibox">
                        <p class="name">Torneo 2</p>
                        <p class="description">Organizador:</p>
                        <p class="description">Equipo:</p>
                        <p class="description">Tipo: Baloncesto</p>
                        <p class="description">Rol:</p>
                    </div>
                    
                    <div class="minibox">
                        <p class="name">Torneo 3</p>
                        <p class="description">Organizador:</p>
                        <p class="description">Equipo:</p>
                        <p class="description">Tipo: Baloncesto</p>
                        <p class="description">Rol:</p>
                    </div>

                </div>

        </section>

        <section class="principalbox">
            <p class="title">Mis Equipos</p>
                
                <div class="box">

                    <div class="minibox">
                        <p class="name">Equipo 1</p>
                        <p class="description">Organizador:</p>
                        <p class="description">Equipo:</p>
                        <p class="description">Rol:</p>
                    </div>
                    
                    <div class="minibox">
                        <p class="name">Equipo 2</p>
                        <p class="description">Organizador:</p>
                        <p class="description">Equipo:</p>
                        <p class="description">Rol:</p>
                    </div>
                    
                    <div class="minibox">
                        <p class="name">Equipo 3</p>
                        <p class="description">Organizador:</p>
                        <p class="description">Equipo:</p>
                        <p class="description">Rol:</p>
                    </div>

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
