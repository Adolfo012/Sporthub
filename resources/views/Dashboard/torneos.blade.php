<title>Torneo {{$torneo->name}}</title>

<h1>Mi torneo:{{$torneo->name}}</h1>
        <p>El torneo juega: {{$torneo->tipoJuego}} <br> 
        Organizador: {{$organizador->name}} <br> 
        Detalles: {{$torneo->descripcion}}<br> 
        Ubicacion de torneo: {{$torneo->ubicacion}}<br> 
        Fecha de comienzo: {{$torneo->fechaInicio}}<br> 
        Fecha de finalizacion: {{$torneo->fechaFin}}<br> 
        Tipo de torneo: {{$torneo->tipoTorneo}}<br> 
        Cantidad de miembros admitida: {{$torneo->cantEquipo}}
        
        
       
        <a href="{{route('dash_home')}}">Volver</a>

       
        </form>