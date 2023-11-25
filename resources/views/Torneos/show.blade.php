
<title>Torneo {{$torneo->name}}</title>

<h1>Mi torneo:{{$torneo->name}}</h1>
        <p>El torneo juega: {{$torneo->tipoJuego}} <br> 
        
        Organizador: {{$organizador->name}} <br> 
        Detalles: {{$torneo->descripcion}}<br> 
        Ubicacion de torneo: {{$torneo->ubicacion}}<br> 
        Fecha de comienzo: {{$torneo->fechaInicio}}<br> 
        Fecha de finalizacion: {{$torneo->fechaFin}}<br> 
        Tipo de torneo: {{$torneo->tipoTorneo}}<br> 
        Cantidad de miembros admitida: {{$torneo->cantEquipo}}<br> <br> 
        
        Equipos registrados:
        @php
        $teams = 0; 
        @endphp
        @foreach($torneo->estadistica as $registro){{-- For each equipo in equipos--}}   
                @if (auth()->user()->id == $torneo->user_id)
                    <li>
                    <a href="{{route('equipos.show',$registro)}}">  
                    {{$registro->name}}</a>
                     PT: {{$registro->pivot->PT}}
                     </li> 
                     @php
                     $teams++;
                     @endphp
                @endif
                @if($teams < 1)
                        <p>No hay equipos aun.</p>
                @endif
        @endforeach

        </p>

        <a href="{{route('torneos.edit',$torneo)}}">Editar torneo</a>
        <a href="{{route('partidos.index',$torneo->id)}}">Ver todos los partidos</a>
        <a href="{{route('torneos.index')}}">Volver a torneos</a>

        <form action="{{route('torneos.destroy',$torneo)}}" method="POST">
            @csrf
            @method("delete") {{---Change the default "post" route to "delete" ---}}
            <button type="submit"> Eliminar torneo </button>
        </form>
