<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Torneo;
use App\Models\Partido;

class DashboardController extends Controller
{
    public function index(){ //View Login 
      $torneos = Torneo::find(auth()->user()->torneos);
      $equipos = Equipo::all();
      $partidos = Partido::all();
      #return $torneos;
      return view('Dashboard.dashboard',compact('torneos','equipos','partidos')); //Folder and file (Route)
      }
}
