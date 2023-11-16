<title>Equipo {{$equipo->name}}</title>

<h1>Mi equipo:{{$equipo->name}}</h1>
<p>El equipo juega: {{$equipo->tipoJuego}} <br> Y con representante: {{$representante->name}}</p>
<a href="{{route('equipos.edit',$equipo)}}">Editar equipo</a>
<a href="{{route('equipos.index')}}">Volver a equipos</a>
