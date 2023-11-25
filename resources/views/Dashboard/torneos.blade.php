<title>Torneo {{$torneo->name}}</title>
<h1>Torneo: {{$torneo->name}}</h1>
@if ($torneo->tipoTorneo == "Equipos")
        @php
        $equiposTorneo = App\Models\EquipoTorneo::all(); 
        $count = 0;
        @endphp
            @foreach ($equiposTorneo as $equipoTorneo)
                    @if($equipoTorneo->torneo_id == $torneo->id)
                        @php
                        $count = $count+1;
                        @endphp
                    @endif
            @endforeach
            <h4>Cantidad de equipos registrados actualmente: <b>{{$count}}</b></h4>
            <form action="{{route('notification.torneo',['id' => $torneo->id])}}" method="POST">
                @csrf
                @php
                    $equipos = App\Models\Equipo::all();
                    $equiposTorneo = App\Models\EquipoTorneo::all();
                @endphp
                <label for="equipo_inscrito">Deseo inscribir a mi equipo: </label>
                <select id="equipo_inscrito" name="equipo_inscrito">
                @foreach($equipos as $equipo)
                @php
                    $equipoPerteneceAlUsuario = $equipo->user_id == auth()->user()->id;
                    $equipoYaRegistrado = false;

                    foreach ($equiposTorneo as $equipo_inscrito) {
                        if ($equipo->id == $equipo_inscrito->equipo_id) {
                            $equipoYaRegistrado = true;
                            break;
                        }
                    }
                @endphp
            
                @if ($equipoPerteneceAlUsuario && !$equipoYaRegistrado)
                     <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
                @endif
            @endforeach
          </select>
          <button type="submit">Enviar solicitud de inscripción </button><br>
          @if(isset($mensaje))
              <b><p>{{ $mensaje }}</p></b>
          @endif
            </form>
        {{--Participants--}}
        @else
        @php
        $participantesTorneo = App\Models\ParticipanteTorneo::all(); 
        $count = 0;
        @endphp
            @foreach ($participantesTorneo as $participanteTorneo)
                    @if($participanteTorneo->torneo_id == $torneo->id)
                        @php
                        $count = $count+1;
                        @endphp
                    @endif
            @endforeach
        <h4>Cantidad de participantes registrados actualmente:  <b>{{$count}}</b></h4>
        <form action="{{route('notification.participante',['id' => $torneo->id])}}" method="POST">
                    @csrf
                    
                    <label for="equipo_inscrito">Inscribirme como: </label>
                    <select id="equipo_inscrito" name="equipo_inscrito">
                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                    </select>
            <button type="submit">Enviar solicitud de inscripción </button><br>
            @if(isset($mensaje))
                 <b><p>{{ $mensaje }}</p></b>
             @endif
      </form>
        
        @endif
   @if($count < $torneo->cantEquipo)
        <p>El torneo juega: {{$torneo->tipoJuego}} <br> 
        Organizador: {{$organizador->name}} <br> 
        Detalles: {{$torneo->descripcion}}<br> 
        Ubicacion de torneo: {{$torneo->ubicacion}}<br> 
        Fecha de comienzo: {{$torneo->fechaInicio}}<br> 
        Fecha de finalizacion: {{$torneo->fechaFin}}<br> 
        Tipo de torneo: {{$torneo->tipoTorneo}}<br> 
        Cantidad de miembros admitida: {{$torneo->cantEquipo}}
        <a href="{{route('dash_home')}}">Volver</a>
    @else
    ¡Hola jugador! El torneo {{$torneo->name}} se encuentra actualmente lleno.
   <br> <a href="{{route('dash_home')}}">Volver</a>
 @endif
        
    