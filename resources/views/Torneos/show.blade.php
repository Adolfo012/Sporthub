<title>Torneo {{$torneo->name}}</title>

<h1>Mi torneo:{{$torneo->name}}</h1>
<p>El torneo juega: {{$torneo->tipoJuego}} <br> Y con Organizador: {{$organizador->name}}</p>
<a href="{{route('torneos.edit',$torneo)}}">Editar torneo</a>
<a href="{{route('torneos.index')}}">Volver a torneos</a>
