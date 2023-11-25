@extends('Dashboard.dashboard')
@section('title','Home')

@section('content')
    <h1>Home</h1> 
    @php
      $torneos = App\Models\Torneo::all();
      $equipos = App\Models\Equipo::all();
   @endphp
    <h2>Torneos SportHub</h2>
    @foreach ($torneos as $torneo)
    <a href="{{route('dashboard.torneo',$torneo)}}">{{$torneo->name}}</a>
       <br>
    @endforeach
    <h2>Equipos SportHub</h2>
    @foreach ($equipos as $equipo)
    <a href="{{route('dashboard.equipo',$equipo)}}">{{$equipo->name}}</a>
        <br>
    @endforeach
@endsection