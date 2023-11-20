<!DOCTYPE html>
<html lang="en">
 {{--- Auth User ---}}
 <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title> {{---Add the title of the page that inherits dashboard---}}
    <style>
        .active{
            color: red;
            font-weight: bold;
        }
    </style>
 </head>
 <body>

 <p>Bienvenido {{auth()->user()->name}} {{auth()->user()->fsurname}}</p>     {{--- Show the username ---}}
 <header>
   <h1>Dashboard</h1>
   <nav>
      <ul>
         <li><a href="{{route('dashboard.index')}}" class="{{request()->routeIs('dashboard.index') ? 'active' : ''}}">Home</a></li> {{---Check if it is on the mentioned route style = active ---}}
         <li><a href="{{route('us')}}" class="{{request()->routeIs('us') ? 'active' : ''}}">Nosotros</a> </li>
         <li><a href="{{route('equipos.index')}}" class="{{request()->routeIs('equipos.*') ? 'active' : ''}}">Equipos</a></li> {{---Asterisk "*" indicates that the style is applied to all routes that belong to that group ---}}
      </ul>
   </nav>
 </header>
    <form action"logout" method="POST"> 
    @csrf 
                                         {{--- Alter logout GET <a href="logout">Cerrar sesion</a> ---}}
    <a href="#" onclick="this.closest('form').submit()">Cerrar sesión</a>
    @yield('content') {{---Add the content of the page that inherits dashboard---}}
 </body>