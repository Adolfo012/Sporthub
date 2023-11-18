
<h1>Pagina de equipos</h1>
<a href="{{route('equipos.crear')}}">Volver</a> 
<ul>
    @foreach($equipos as $equipo) {{-- For each equipo in equipos--}}
          <li>
            <a href="{{route('equipos.show',$equipo->id)}}">{{$equipo->name}}</a>  {{-- View: equipos.show with argument equipo->id--}}
            <li>
          </li> 
    @endforeach
</ul>
{{$equipos->links()}}
