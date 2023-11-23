@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Pagina de equipos')

@section('content')
    <h1>Partidos del Torneo</h1>   
    <!--- {{$partidos}}--->
    <a href="{{route('partidos.crear',$torneoID)}}">Crear partido</a>
    <ul>
    @php
    $teams = 0;
    @endphp
      @foreach($partidos as $partido)      
        <li>
        <a href="{{route('partidos.show',['partido' =>$partido, 'torneoID'=> $torneoID])}}">
        {{$partido->local->name}} VS {{$partido->visitante->name}}</a>  {{-- View: partidos.show with argument partido->id--}}
        <!---{{$partido->pivot->torneo_id}}---> 
        @php
        $teams++;
        @endphp  
      </li>
      @endforeach
      @if($teams < 1)
        <p>No hay partidos registrados.</p>
      @endif
  </ul>
   {{---{{$partidos->links()}}   <- Partido::paginate()---}}
   <a href="{{route('torneos.show',$torneoID)}}">Volver a torneos</a>
@endsection
