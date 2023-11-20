
<h1>Pagina de torneo</h1>
<a href="{{ route('torneos.create')}}">Volver</a> 
<ul>
    @foreach($torneos as $torneo) {{-- For each torneo in torneos--}}
          <li>
            <a href="{{route('torneos.show',$torneo->id)}}">{{$torneo->name}}</a>  {{-- View: torneo.show with argument torneo->id--}}
            <li>
          </li> 
    @endforeach
</ul>
{{$torneos->links()}}
