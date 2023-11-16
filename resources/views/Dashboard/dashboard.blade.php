<title>SportHub</title>
@auth {{--- Auth User ---}}
 <h1>Dashboard</h1>
 <p>Bienvenido {{auth()->user()->name}} {{auth()->user()->fsurname}}</p>     {{--- Show the username ---}}
 <a href="logout">Cerrar sesion</a>
 @endauth
@guest  {{--- Guest User ---}}
<script>
    window.location.href = "/login";
</script>
 <p>Para ver el contenido<a href="/login">Inicia sesion</a></p>   
@endguest