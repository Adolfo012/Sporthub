<title>SportHub</title>
 {{--- Auth User ---}}
 <h1>Dashboard</h1>
 <p>Bienvenido {{auth()->user()->name}} {{auth()->user()->fsurname}}</p>     {{--- Show the username ---}}
 <form action"logout" method="POST"> 
    @csrf 
                                         {{--- Alter logout GET <a href="logout">Cerrar sesion</a> ---}}
    <a href="#" onclick="this.closest('form').submit()">Cerrar sesión</a>