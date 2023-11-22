@extends('Dashboard.dashboard') {{---Inherits dashboard---}}
@section('title','Pagina de equipos')

@section('content')
    <h1>Partidos del Torneo</h1>   
    <ul>
        @foreach($partidos as $partido)      
          <li>
          <a href="{{route('partidos.show',$partido)}}">
          {{$partido->local->name}} VS {{$partido->visitante->name}}</a>  {{-- View: partidos.show with argument partido->id--}}
            </li>
        @endforeach

    </ul>
   {{---{{$partidos->links()}}   <- Partido::paginate()---}}
@endsection
